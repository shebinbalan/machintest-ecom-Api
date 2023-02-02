@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    @if(session('message'))
                
<div class="alert alert-success">{{(session('message'))}}</div>
                
                @endif
        <div class="card">
            <div class="card-header">
               <h3> Products
                <a class="btn btn-primary btn-sm text-white float-end" href="{{url('products/create')}}" >Add Products</a>
               </h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>           
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->selling_price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->status =='1' ?'Hidden':'Visible' }}</td>
            
            <td>
                <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{url('products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure! you want to delete the data?')" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection