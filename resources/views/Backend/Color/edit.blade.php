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
                    <h2>Edit Color</h2>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('colors.index')}}" class="btn btn-outline-primary col-sm">View Color</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
<div class="card-body ">

<form method="post" action="{{route('colors.update',$color->id)}}">
  @csrf
  @method('PUT')
  <div class="row">

<div class="modal-body mb-3 col-md-6">
        <label>Name</label>
        <input class="form-control" type="text" name="name" Value="{{$color->name}}">
        @error('name')<small class="text-danger">{{$message}}</small>@enderror
      </div>
      <div class="modal-body mb-3 col-md-6">
      <label>Code</label>
        <input class="form-control" type="text" name="code" Value="{{$color->code}}">
        @error('code')<small class="text-danger">{{$message}}</small>@enderror

      </div><br>
      <div class="modal-body ">
      <label>Status</label>
        <input  type="checkbox" name="status" @if($color->status) {{'checked'}}  @endif> <small class="text-danger">Checked: Visible | Unchecked: disable</small>
      </div><br><br>

      </div>
      <button type="submit" class="btn btn-outline-primary">Update Color</button>

      </form>

   </div>
   </div>


@endsection