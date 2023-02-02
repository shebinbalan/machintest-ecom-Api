@extends('layouts.admin')
@section('content')



 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h3>Add Products
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
                <form action="{{url('/insert-products')}}" method="POST" enctype="multipart/form-data">
              @csrf           
        <div class="mb-3">
       <label>Product Code</label>
    <input type="text" name="product_code" class="form-control"/>
   </div> 
  
  <div class="mb-3">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control"/>
   </div>
   <div class="mb-3">
    <label>Product Slug</label>
    <input type="text" name="slug" class="form-control"/>
   </div>
  
   <div class="mb-3">
    <label>Product Brand</label>
    <input type="text" name="brand" class="form-control"/>
   </div>
   <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4" ></textarea>
   </div>
  
        <div class="mb-3">
        <label>Original Price</label>
        <input type="text" name="original_price" class="form-control"/>
         </div>
        
    
        <div class="mb-3">
        <label>Selling Price</label>
        <input type="text" name="selling_price" class="form-control"/>
         </div>
        
        
        <div class="mb-3">
        <label>Quantity</label>
        <input type="text" name="quantity" class="form-control"/>
         </div>
       
       
        <div class="mb-3">
        <label>Status</label>
        <input type="checkbox" name="status" style="width:50px; height: 50px;"/>
         </div>   
    
 
         <div class="mb-3">
       <label>Product Image</label>
       <input type="file"  multiple name="image[]" class="form-control"/>
       </div>
 
     </div>
      <div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

            </div>
        </div>
    </div>
</div>
@endsection

































