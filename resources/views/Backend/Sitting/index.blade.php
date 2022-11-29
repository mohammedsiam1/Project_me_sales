@extends('layouts.admin')

@section('title')
Sitting Web
@endsection

@section('content')

<div class="row">
  <div class="col-md-12 grid-margin">
    <form action="{{route('sitting.store')}}" method="post">
      @csrf
      <div class="card mp-3">
        <div class="card-header bg-primary">
          <h3 class="text-white mb-0">Website</h3>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Website name</label>
              <input type="text" name="website_name" class="form-control" value="{{$websitting->website_name ?? ''}}" />
            </div>

            <div class="col-md-6 mb-3">
              <label>Website URL</label>
              <input type="text" name="website_url" class="form-control" value="{{$websitting->website_url ?? ''}}" />
            </div>

            <div class="col-md-6 mb-3">
              <label>Page Title</label>
              <input type="text" name="title" class="form-control" value="{{$websitting->title ?? ''}}" />
            </div>

            <div class="col-md-6 mb-3">
              <label>Meta Keywords</label>
              <input type="text" name="website_keyword" class="form-control" value="{{$websitting->website_keyword ?? ''}}" />
            </div>

            <div class="col-md-6 mb-3">
              <label>Meta Description</label>
              <input type="text" name="website_description" class="form-control" value="{{$websitting->website_description ?? ''}}" />
            </div>
          </div>
        </div>
        </div>
       <div class="card mp-3">
        <div class="card-header bg-primary">
          <h3 class="text-white mb-0">Website - Information</h3>
      </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Address</label>
              <textarea name="address" class="form-control" rows="3" >{{$websitting->address ?? ''}}</textarea>
            </div>

            <div class="col-md-6 mb-3">
              <label>Phone </label>
              <input type="text" name="phone" class="form-control" value="{{$websitting->phone ?? ''}}" />
            </div>


            <div class="col-md-6 mb-3">
              <label>Email Id</label>
              <input type="text" name="email" class="form-control"  value="{{$websitting->email ?? ''}}"/>
            </div>

         
          </div>
        </div>
      </div>

      <div class="card mp-3">
        <div class="card-header bg-primary">
          <h3 class="text-white mb-0">Website - Social Media</h3>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Facebook (optional)</label>
              <input type="text" name="facebook" class="form-control"    value="{{$websitting->facebook ?? ''}}"  />
            </div>

            <div class="col-md-6 mb-3">
              <label>Twitter (optional)</label>
              <input type="text" name="twitter" class="form-control"   value="{{$websitting->twitter ?? ''}}"  />
            </div>

            <div class="col-md-6 mb-3">
              <label>Instagram (optional)</label>
              <input type="text" name="instagram" class="form-control"   value="{{$websitting->instagram ?? ''}}" />
            </div>

            <div class="col-md-6 mb-3">
              <label>Youtube (optional)</label>
              <input type="text" name="youtube" class="form-control"  value="{{$websitting->youtube ?? ''}}"  />
            </div>

          </div>
        </div>
      </div>

      <div class="text-end">
       <br> <button class="btn btn-outline-primary text-black" type="submit">Save Setting</button>
      </div>


    </form>
  </div>
</div>

@endsection
