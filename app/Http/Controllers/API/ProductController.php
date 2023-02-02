<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;
   
class ProductController extends BaseController
{
    
    public function products()
    {
        $products = Product::join('product_images', 'products.id', '=', 'product_images.product_id')              		
        ->get(['products.*', 'product_images.image']);
    
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
   
  
}