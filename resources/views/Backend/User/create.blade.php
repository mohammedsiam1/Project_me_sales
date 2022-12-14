@extends('layouts.admin') 
@section('title') 
create - user
@endsection


@section('content') 

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2> Create User</h2>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('user.index')}}" class="btn btn-outline-danger col-sm">Back </a>
            </div>
        </div>
        <hr>
        @if(session('message'))
        <div class="text-success">
            {{session('message')}}
        </div>
        @endif
        
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control">
                    @error('first_name')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control"> 
                    @error('last_name')<small class="text-danger">{{$message}}</small>@enderror 

                </div>
                <div class="col-md-6 mb-3">
                    <label>email </label>
                    <input type="email" name="email"  class="form-control">  
                    @error('email')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>	role</label>
                    <select name="role" class="form-control">
                        <option value="1">User</option>
                        <option value="0">Admin</option>
                        
                    </select> 
                    @error('role')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>	status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Un Active</option>
                        
                    </select> 
                    @error('role')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>password</label>
                    <input type="text" name="password" class="form-control">  
                    @error('password')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>phone</label>
                    <input type="text" name="phone" class="form-control"> 
                    @error('phone')<small class="text-danger">{{$message}}</small>@enderror  
                </div>

              <div class="col-md-6 mb-3">
                <select class="form-control" name="role_name[]" multiple>
                    @foreach($roles as $role )
                    <option>{{$role}}</option>
                    @endforeach
                </select>
                </div> 
            
                <br>
               

            </div>
            <button type="submit" class="btn btn-outline-primary">Create user</button>

        </form>
    </div>
</div>

@endsection