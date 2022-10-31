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
                    <h2>Edit Categories</h2>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{url('admin/categories')}}" class="btn btn-primary col-sm">Back</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
    <div class="card-body">

        <form  action="{{ route('categories.update',$category->id) }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label> Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    @error('name')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" required>
                    @error('slug')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div> 
                 <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" value="" >{{ $category->description }}</textarea>
                    @error('description')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"  ><br>
                    @if($category->image!=null)
                    <image src="{{asset('Categories/Images/'. $category->image)}}" width="60px" hight="60px"><br> 
                    @endif  
                    @error('image')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">

                    <label>Status</label>
                    <input type="checkbox" name="status" {{ $category->status?'checked':'' }}>
                </div>
                <div class="col-md-12 mb-3">
                    <h4>SEO Tags</h4>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <textarea type="text" name="meta_title" class="form-control" value="" >{{ $category->meta_title }}</textarea>
                    @error('meta_title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div> 
                <div class="col-md-12 mb-3">
                    <label>Meta Keyword</label>
                    <textarea type="text" name="meta_keyword" class="form-control" value="" >{{ $category->meta_keyword }}</textarea>
                    @error('meta_keyword')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div> 
                <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea type="text" name="meta_description" class="form-control" value="{{ $category->meta_description }}" >{{ $category->meta_description }}</textarea>
                    @error('meta_description')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div> 
                <div class="col-md-6 mb-3">

                <button type="submit" class="btn btn-primary float-end">Save</button>
                
            </div>
            </div>
        </form>
    </div>
</div>

@endsection