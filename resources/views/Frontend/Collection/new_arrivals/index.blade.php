@extends('layouts.app')

@section('content')

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h4>New Arrivals Products</h4>
                     <hr>
            </div>
            @forelse($newarrivals as $product)
            <div class=" col-md-3">
            <div class="product-card" >
                        <div class="product-card-img" >
                        @if($product->selling_price >= 100)
                            <label class="stock bg-success">
                                New
                            </label>
                            @else 
                            <label class="stock bg-primary">
                                New
                            </label>
                            @endif
                            @if($product->productImages->count() >0)
                            <a href="{{url('user/showProduct/'.$product->category->slug.'/'.$product->slug)}}">
                                <img style=" height :200px" src="{{asset('Upload/Products/Images/'.$product->productImages[0]->image)}}" alt="{{$product->name}}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{url('user/showProduct/'.$product->category->slug.'/'.$product->slug)}}">
                                    {{$product->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{$product->selling_price}}</span>
                                <span class="original-price">${{$product->original_price}}</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                    @empty
                    <h3>No Products Available for {{$category->name}}</h3>
                    @endforelse
                    <div class="text-center">
                        <a href="{{url('user/category')}}" class="btn btn-outline-warning">Show More</a>
                    </div>
        </div>
    </div>
</div>
@endsection

