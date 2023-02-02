@extends('layouts.admin')
@section('content')



 <div class="row">
    <div class="col-md-12">
    @if(session('message'))                
    <h4 class="alert alert-success mb-2">{{(session('message'))}}</h4>
    @endif
        <div class="card">
            <div class="card-header">
               <h3>Edit Products
                <a href="{{url('products')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
               </h3>
            </div>
            <div class="card-body">
           
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{url('/update-products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
              @csrf   
              @method('PUT')        
            <div class="mb-3">
            <label>Product Code</label>
            <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control"/>
             </div> 
  
  <div class="mb-3">
    <label>Product Name</label>
    <input type="text" name="name" value="{{$product->name}}" class="form-control"/>
   </div>
   <div class="mb-3">
    <label>Product Slug</label>
    <input type="text" name="slug" value="{{$product->slug}}" class="form-control"/>
   </div>
  
   <div class="mb-3">
    <label>Product Brand</label>
    <input type="text" name="brand" value="{{$product->brand}}" class="form-control"/>
   </div>
   <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4" >{{$product->description}}</textarea>
   </div>
  
        <div class="mb-3">
        <label>Original Price</label>
        <input type="text" name="original_price"value="{{$product->original_price}}" class="form-control"/>
         </div>
        
    
        <div class="mb-3">
        <label>Selling Price</label>
        <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control"/>
         </div>
        
        
        <div class="mb-3">
        <label>Quantity</label>
        <input type="text" name="quantity"   value="{{$product->quantity}}" class="form-control"/>
         </div>
       
       
        <div class="mb-3">
        <label>Status</label>
        <input type="checkbox" name="status"  value="{{$product->status == '1' ? 'checked': ''}}" style="width:50px; height: 50px;"/>
         </div>
       
    
 
        <div class="mb-3">
       <label>Product Image</label>
       <input type="file"  multiple name="image[]" class="form-control"/>
       </div>
       <div>
    @if($product->productImages)
    <div class="row">
    @foreach($product->productImages as $image)
        <div class="col-md-2">
        <img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;" class="me-4"  alt="img"/>
    <a href="{{url('product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
        </div>
    @endforeach
    </div> 
     
    @else
    <h5>No Image Added</h5>
    @endif
 </div>
</div>
<div>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

            </div>
        </div>
    </div>
</div>
@endsection

































