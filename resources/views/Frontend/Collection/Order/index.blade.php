@extends('layouts.app')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Your Order</h4>
            </div>
            <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>tracking</th>
          <th>fullname</th>
          <th>address</th>
          <th>status_message</th>
          <th>payment_mode </th>
          <th>created_at</th>
          <th>show </th>
    
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $order)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$order->tracking_no}}</td>
          <td>{{$order->fullname}}</td>
          <td>{{$order->address}}</td>
          <td>{{$order->status_message}}</td>
          <td>{{$order->payment_mode}}</td>
          <td>{{$order->created_at->format('Y-m-d')}}</td>
          <td><a href="{{route('show.order',$order->id ) }}" class="btn btn-primary btn-sm">View</a></td>
        </tr>
        @empty
        <td colspan=7 style="text-align: center;">No Order Yet!</td>
        @endforelse
      </tbody>
    </table>
    <div>
      {!!$orders->links()!!}
    </div>
  </div>
        </div>
    </div>
</div>
@endsection