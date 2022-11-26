@extends('layouts.app')

@section('content')

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($categories as $category)
                <div class="col-6 col-md-3">
                    
                    <div class="category-card">
                        <a href="{{route('category.show',$category->slug)}}">
                            <div class="category-card-img">
                                <img style=" height :220px" src="{{asset('Categories/Images/'.$category->image)}}" class="w-100" alt="{{$category->name}}">
                            </div>
                            <div class="category-card-body">
                                <h5>{{$category->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <h3>No Categories Yet</h3>
                @endforelse
            </div>
        </div>
    </div>
    @endsection