@extends('layouts.admin')
@section('title')
users
@endsection


@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2> Users</h2>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('user.create')}}" class="btn btn-outline-primary col-sm">Add User</a>
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

        <table class="table caption-top">
            <caption>All Users</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-primary"> Name</th>
                    <th class="text-primary">Email</th>
                    <th class="text-primary">Role</th>
                    <th class="text-primary">Permission</th>
                    <th class="text-primary">Status</th>
                    <th class="text-primary">phone</th>
                    <th class="text-primary">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>

                    <td>{{$user->first_name }} {{ $user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->role == 1)
                        <span class="text-danger">User</span>
                        @else
                        <span class="text-primary">Admin</span>
                        @endif
                    </td>
                    @if (!empty($user->role_name))
                    @foreach ($user->role_name as $v)
                    <td >{{ $v }}</td>
                    @endforeach
                    @else 
                    <td>-</td>
                    @endif 
                    <td>{{$user->status?'Active' :'UnActive'}}</td>
                    <td>{{$user->phone}}</td>
                    <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('delete.user',$user->id)}}" data-method="delete" onClick="return confirm('are you sure to remove this user ?') " class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{$users->links()}}
    </div>
</div>

@endsection