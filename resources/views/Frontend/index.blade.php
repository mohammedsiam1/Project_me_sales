@extends('layouts.app')

@section('title')
Home Page
@endsection
@section('content')
<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">
        @foreach($sliders as $key=> $slider)
        <div class="carousel-item {{$key ==0?'active':''}}">
            <img src="{{asset('Upload/Slider/Image/'.$slider->image)}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

                <h1>
                    <span>{!!$slider->title!!} </span>
                    to Boost your Brand Name &amp; Sales
                </h1>
                <p>
                    {{$slider->description}}
                </p>
            </div>
        </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to Factor E-commerce</h4>
                    <hr>    
                <p> Welcome to our world, in our store you find all items and special goods at special prices and all available colors, in the Factor store you find it difficult to believe what you see, it is good to feel inside Factor.
                    Happy shopping.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h4>Trending Products</h4>
                     <hr>
            </div>
            <div class="owl-carousel owl-theme For-Carousel" >
            @foreach($products as $product)
            <div class="item">
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
                    @endforeach
                </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h4>new Arrivals Products</h4>
                     <hr>
            </div>
            <div class="owl-carousel owl-theme For-Carousel" >
            @foreach($newarrivals as $product)
            <div class="item">
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
                    @endforeach
                </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h4> features Products</h4>
                     <hr>
            </div>
            <div class="owl-carousel owl-theme For-Carousel" >
            @foreach($features as $product)
            <div class="item">
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
                 
                    
                    @endforeach
                </div>
        </div>
    </div>
</div>
</div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    $('.For-Carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection