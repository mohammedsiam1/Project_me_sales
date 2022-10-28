@extends('layouts.admin') 
@section('title') 
Products
@endsection


@section('content') 

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2> Products</h2>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('products.create')}}" class="btn btn-primary col-sm">Add Product</a>
            </div>
        </div>
        <hr>
        @if(session('message'))
        <div class="text-success">
            {{session('message')}}
        </div>
        @endif
        
    </div>
</div>

<div class="card">
    <div class="card-body">

    <table class="table caption-top">
  <caption>All Products</caption>
  <thead>
    <tr>
      <th >#</th>
      <th class="text-primary">Category Name</th>
      <th class="text-primary">Product Name</th>
      <th class="text-primary">small description</th>
      <th class="text-primary">brand</th>
      <th class="text-primary">status</th>
      <th class="text-primary">trending</th>
      <th class="text-danger">Price</th>
      <th class="text-primary">Actions</th>
    </tr>
  </thead>
  <tbody>
  @forelse($products as $product)
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      @if($product->category)
      <td>{{$product->category->name}}</td>
      @else
      <td class="text-danger"> - </td>
      @endif
      <td>{{$product->name}}</td>
      <td>{{$product->short_description}}</td>
      <td>{{$product->brand}}</td>
      <td>{{$product->status?'visible':'disable'}}</td>
      <td>{{$product->trending?'trending':'not trending'}}</td>
      <td class="text-danger">$ {{$product->selling_price}}</td>
      <td ><a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>
           <a href="{{route('products.delete',$product->id)}}"  data-method="delete" onClick="return confirm('are you sure to remove this product ?') "class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
     </td>
    </tr>
    @empty
    <h3 class="col-8">No Products Yet</h3>
    @endforelse
  </tbody>
</table>
    </div>
    </div>

@endsection