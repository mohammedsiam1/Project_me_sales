@extends('layouts.admin')
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
permissions
@endsection

@section('content')



<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="breadcrumb-header justify-content-between">
                            <div class="my-auto">
                                    <h4 class="content-title mb-0 my-auto">Users<span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                                       Permissions Users
                                    
                                    </span>
                                    @can('Add Permissions')
                                    <a class="btn btn-outline-primary btn-sm float-end" href="{{ route('roles.create') }}">Add New Permission</a>
                                    @endcan
                                      </h4><br>
                                    
                                </div>
                        </div>



                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>

                                @can('Add Permissions')
                                    <a class="btn btn-outline-success btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                                @endcan
                                    @can('Edit Permissions')
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    @endcan
                                @can('Delete Permissions')
                                    @if ($role->name !== 'owner')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                    $role->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                    {!! Form::close() !!}

                                    @endif
                                @endcan


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('scripts')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection