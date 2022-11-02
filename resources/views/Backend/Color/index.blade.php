@extends('layouts.admin')
@section('title')
Create Categories
@endsection
@section('content')
@include('Backend.Color.AddColorModal')
@include('Backend.Color.EditColorModal')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Colors</h2>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a data-bs-toggle="modal" data-bs-target="#AddColorModal" class="btn btn-primary col-sm">Add Color</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
<div class="card-body">
 <table class="table">
  <thead>
    <tr>
      <th class="text-primary">#</th>
      <th class="text-primary">Name</th>
      <th class="text-primary">Code</th>
      <th class="text-primary">Status</th>
      <th class="text-primary">Action</th>
    </tr>
  </thead>
  @forelse($colors as $color)
  <tbody>
    <tr>
      <th scope="row">{{ $loop->index+1}}</th>
      <td>{{$color->name}}</td>
      <td>{{$color->code}}</td>
      <td>{{$color->status?'visible':'disabled'}}</td>
      <td>
      <a   href="{{route('colors.edit',$color->id)}}"   class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

        <a   href="{{route('delete.color',$color->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You sure to remove this color ?') "><i class="fa fa-trash"></i></a>
      </td>
    </tr>
  </tbody>
  @empty
  <h3>ther's no Colors</h3>
  @endforelse
</table>
{!!$colors->links()!!}

</div>
</div>
@endsection 