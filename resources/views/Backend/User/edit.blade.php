@extends('layouts.admin') 
@section('title') 
update - user
@endsection


@section('content') 

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2> Update User</h2>
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
        <form action="{{route('user.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control">
                    @error('first_name')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name"value="{{$user->last_name}}" class="form-control"> 
                    @error('last_name')<small class="text-danger">{{$message}}</small>@enderror 

                </div>
                <div class="col-md-6 mb-3">
                    <label>email </label>
                    <input type="email"  readonly  value="{{$user->email}}" class="form-control">  
                    @error('email')<small class="text-danger">{{$message}}</small>@enderror 
                </div>
                <div class="col-md-6 mb-3">
                    <label>	role</label>
                    <select name="role" class="form-control" >
                        <option class="active" value="1"{{$user->role ==1 ? 'selected':''}}>User</option>
                        <option class="active" value="0"{{$user->role ==0 ? 'selected':''}}>Admin</option>
                        
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
                    <input type="text" name="phone"value="{{$user->phone}}" class="form-control"> 
                    @error('phone')<small class="text-danger">{{$message}}</small>@enderror  
                </div>
                <br>
               

            </div>
            <button type="submit" class="btn btn-outline-primary">Update user</button>

        </form>
    </div>
</div>

@endsection