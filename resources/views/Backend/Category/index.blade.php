@extends('layouts.admin')
@section('title') 
Categories
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Categories</h2>
                </div>
              
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{url('admin/categories/create')}}" class="btn btn-primary col-sm">Add Category</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
<div class="card-body">
    
 my categories



</div>
</div>

@endsection