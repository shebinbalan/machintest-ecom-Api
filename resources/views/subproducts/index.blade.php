@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('subproducts.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
  
@endsection