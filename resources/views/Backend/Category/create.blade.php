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
                    <h2>Create Categories</h2>
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

        <form  action="{{ url('admin/categories') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label> Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
                    @error('slug')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div> 
                 <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" value="{{ old('description') }}" ></textarea>
                    @error('description')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}" >
                    @error('image')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status"  >
                </div>
                <div class="col-md-12 mb-3">
                    <h4>SEO Tags</h4>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Title</label>
                    <textarea type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" ></textarea>
                    @error('meta_title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div> 
                <div class="col-md-12 mb-3">
                    <label>Meta Keyword</label>
                    <textarea type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}" ></textarea>
                    @error('meta_keyword')
                    <span class="text-danger">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div> 
                <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea type="text" name="meta_description" class="form-control" value="{{ old('meta_description') }}" ></textarea>
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