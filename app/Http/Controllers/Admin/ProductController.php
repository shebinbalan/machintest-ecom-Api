<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products =Product::paginate(5);
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductFormRequest $request)
    {
        $validateData =$request->validated();
      
        $products=Product::create([
            'product_code'=>$validateData['product_code'],
            'name'=>$validateData['name'],
            'slug'=>Str::slug($validateData['slug']),
            'brand'=>$validateData['brand'],
            'description'=>$validateData['description'],
            'original_price'=>$validateData['original_price'],
            'status'=>$request->status == true ? '1':'0',
            'selling_price'=>$validateData['selling_price'],
            'quantity'=>$validateData['quantity'],

        ]);
        if($request->hasFile('image'))
        {
            $uploadPath ='uploads/products/';
            $i=1;
            foreach($request->file('image') as $imageFile)
            {
            $extension=$imageFile->getClientOriginalExtension();
            $filename = time().$i++.'.'.$extension;
            $imageFile->move( $uploadPath,$filename);
            $finalImagePathName =$uploadPath.$filename;
            $products->productImages()->create([
                'product_id'=> $products->id,
                'image'=> $finalImagePathName,
             ]);
             
            }
        }
        return redirect('/products')->with('message','Product Added Successfully');
        
    }
    public function edit(int $product_id)
    {
       $product =Product::findOrFail($product_id);
       return view('admin.products.edit',compact('product'));
    }

    public function update(ProductFormRequest $request ,int $product_id)
    {
        $validateData =$request->validated();
        $product =Product::where('id',$product_id)->first();
        if($product){
            $product->update([
            'product_code'=>$validateData['product_code'],
            'name'=>$validateData['name'],
            'slug'=>Str::slug($validateData['slug']),
            'brand'=>$validateData['brand'],
            'description'=>$validateData['description'],
            'original_price'=>$validateData['original_price'],
            'status'=>$request->status == true ? '1':'0',
            'selling_price'=>$validateData['selling_price'],
            'quantity'=>$validateData['quantity'],

            ]);
            if($request->hasFile('image'))
            {
                $uploadPath ='uploads/products/';
                $i=1;
                foreach($request->file('image') as $imageFile)
                {
                $extension=$imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move( $uploadPath,$filename);
                $finalImagePathName =$uploadPath.$filename;
                $product->productImages()->create([
                    'product_id'=> $product->id,
                    'image'=> $finalImagePathName,
                 ]);
                 
                }
            }
            return redirect('/products')->with('message','Product Added Successfully');
            

        }
        else{
            return redirect('/products')->with('message','No Such a Type of product found'); 
        }
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);

        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted'); 
    }
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id); 
        if($product->productImages())
        {
            foreach($product->productImages as $image)
            {
                if(File::exists($image->image)){
                    File::delete($image->image);
        
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product  Deleted with all its Images');
    }
}
