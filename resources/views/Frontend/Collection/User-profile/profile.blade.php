@extends('layouts.app')

@section('content')

<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                 <h4>User Profile</h4>
                     <hr>
            </div>  
            <div class="col-md-10">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white"> User Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update.user')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}">
                                            @error('first_name')<small class="text-danger">{{$message}}</small>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">
                                            @error('last_name')<small class="text-danger">{{$message}}</small>@enderror
                                    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email Address</label>
                                            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                                            @error('phone')<small class="text-danger">{{$message}}</small>@enderror
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Zip / Pin code</label>
                                            <input type="text" name="zip_code" class="form-control" value="{{Auth::user()->userDetails->zip_code ??''}}">
                                            @error('zip_code')<small class="text-danger">{{$message}}</small>@enderror
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" row="3" value="{{Auth::user()->userDetails->address ??''}}">
                                            @error('address')<small class="text-danger">{{$message}}</small>@enderror
                                        
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-primary" >Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
      </div> 
</div>
@endsection