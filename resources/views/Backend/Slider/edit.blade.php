@extends('layouts.admin')
@section('title')
Create Categories
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Edit slider</h2>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('sliders.index')}}" class="btn btn-primary col-sm">Back</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
    <div class="card-body">

        <form  action="{{ route('sliders.update',$slider->id) }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label> Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                    @error('title')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                 <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"  >{{ $slider->description }}</textarea>
                    @error('description')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"  ><br>
                    @if($slider->image!=null)
                    <image src="{{asset('Upload/Slider/Image/'. $slider->image)}}" width="60px" hight="60px"><br> 
                    @endif  
                    @error('image')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">

                    <label>Status</label>
                    <input type="checkbox" name="status" {{ $slider->status?'checked':'' }}>
                </div>
               
                <div class="col-md-6 mb-3">

                <button type="submit" class="btn btn-primary float-end">Update</button>
                
            </div>
            </div>
        </form>
    </div>
</div>

@endsection