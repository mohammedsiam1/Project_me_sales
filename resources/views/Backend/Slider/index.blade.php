@extends('layouts.admin')
@section('title')
Create Categories
@endsection
@section('content')
@include('Backend.Slider.addSliderModal')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="me-md-3 me-xl-5">
          <h2>Slider</h2>
        </div>

      </div>
      <div class="d-flex justify-content-between align-items-end flex-wrap">
        <a data-bs-toggle="modal" data-bs-target="#addSliderModal" class="btn btn-primary col-sm">Add Slider</a>
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
          <th class="text-primary">Title</th>
          <th class="text-primary">Description</th>
          <th class="text-primary">Image</th>
          <th class="text-primary">Status</th>
          <th class="text-primary">Action</th>
        </tr>
      </thead>
      @forelse($sliders as $slider)
      <tbody>
        <tr>
          <th scope="row">{{ $loop->index+1}}</th>
          <td>{{$slider->title}}</td>
          <td>{{$slider->description}}</td>
          <td>
            <img src="{{asset('Upload/Slider/Image/'.$slider->image)}}" style="width:70px; height:70px" />
          </td>
          <td>{{$slider->status?'visible':'disabled'}}</td>
          <td>
            <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>
            <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
              @csrf
              @method("DELETE")
              <br>     <button type="submit"  class="btn btn-danger btn-lg" onclick="return confirm('Are You sure to remove this slider ?') "><i class="fa fa-trash"></i></b>
            </form>
          </td>
        </tr>
      </tbody>
      @empty
      <h3>there is no sliders</h3>
      @endforelse
    </table>
    {!!$sliders->links()!!}

  </div>
</div>
@endsection