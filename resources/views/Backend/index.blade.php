@extends('layouts.admin')

@section('title')
Dashboard
@endsection


@section('content')

<div class="row">

  <div class="me-md-3 me-xl-5">
    <h2>Welcome back,</h2>
    <p class="mb-md-0">Your analytics dashboard.</p>
  </div>
  <hr>
  <div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
      <label>Total Order</label>
      <h1>{{$data['TotalOrders']}}</h1>
      <a href="{{route('order.admin')}}" class="text-white">View </a>
    </div>
  </div>
 <div class="col-md-3">
    <div class="card card-body bg-primary text-white mb-3">
      <label>Tody Order</label>
      <h1>{{$data['TotalOrdersDay']}}</h1>
      <a href="{{route('order.admin')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-dark text-dark text-white mb-3">
      <label>Total Order Month</label>
      <h1> {{$data['TotalOrdersMonth']}}</h1>
      <a href="{{route('order.admin')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-warning text-white mb-3">
      <label>Total Admin</label>
      <h1>  {{$data['countAdmin']}}</h1>
      <a href="{{route('user.index')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-danger text-white mb-3">
      <label>Total User</label>
      <h1>  {{$data['countUser']}}</h1>
      <a href="{{route('user.index')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-secondary text-white mb-3">
      <label>Total Products</label>
      <h1>   {{$data['TotalProducts']}}</h1>
      <a href="{{route('products.index')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-info text-white mb-3">
      <label>Brands</label>
      <h1> {{$data['TotalBrands']}}</h1>
      <a href="{{url('admin/brands')}}" class="text-white">View </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-secondary text-white mb-3">
      <label>Total Category</label>
      <h1> {{$data['TotalCategories']}}</h1>
      <a href="{{route('categories.index')}}" class="text-white">View </a>
    </div>
  </div>
 

</div>



@endsection