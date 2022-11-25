@extends('layouts.admin')

@section('content')

<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class=" text-primary">
                        My Order Details
                        <a href="{{route('order.admin')}}" class="btn btn-danger btn-sm float-end ">Back</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id:{{$order->id}}</h6>
                            <h6>Tracking No:{{$order->tracking_no}}</h6>
                            <h6>Order Created Date:{{$order->created_at->format('Y-m-d h:i A')}}</h6>
                            <h6>Payment Mode:{{$order->payment_mode}}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message:
                                <span class="text-uppercase">{{$order->status_message}}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name :{{$order->fuliname}}</h6>
                            <h6>Email :{{$order->email}}</h6>
                            <h6>Phone:{{$order->phone}}</h6>
                            <h6>Address:{{$order->address}}</h6>
                            <h6>
                                Pin Code:{{$order->pincode}}
                            </h6>
                        </div>
                    </div>
                    <br />
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Item ID </th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total </th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice = 0;
                                @endphp
                                @foreach($order->orderItems as $order_item)
                                <tr>
                                    <td width="10%">{{$order_item->id}}</td>
                                    <td width="10%">
                                        @if($order_item->product->productImages)
                                        <img src="{{asset('Upload/Products/Images/'.$order_item->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                        @else
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif
                                    </td>

                                    <td>
                                        {{$order_item->product->name}}
                                        @if($order_item->ColorProduct)
                                        <span class="text-danger"> Colors: {{$order_item->ColorProduct->Color->name}}</span>
                                        @endif
                                    </td>
                                    <td width="10%">{{$order_item->qty}}</td>
                                    <td width="10%">{{$order_item->price}}</td>
                                    <td width="10%" class="fw-bold"> ${{$order_item->qty * $order_item->price}}</td>
                                    @php
                                    $totalPrice += $order_item->qty * $order_item->price;
                                    @endphp
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan=5 class="fw-bold">Total Amount</td>
                                    <td colspan=1 class="fw-bold">${{$totalPrice}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <br>
        
            <div class="card">
                <div class="card-body">
                    <h4>Order progress (Order Status Update)</h4>
                    <hr>
                    <form action="{{route('update.order',$order->id)}}" method="post">

                    <div class="row">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <label>Update Progress </label>
                             <select name="order_progress" class="form-control">
                        <option value="in progress" @if (old('in progress')) {{ 'selected' }} @endif>in progress</option>
                        <option value="completed" @if (old('completed')) {{ 'selected' }} @endif>completed</option>
                        <option value="pending" @if (old('pending')) {{ 'selected' }} @endif>pending</option>
                        <option value="canceled" @if (old('canceled')) {{ 'selected' }} @endif>canceled</option>
                        <option value="out of delivery" @if (old('out of delivery')) {{ 'selected' }} @endif>out of delivery</option>
                             </select>
                        </div>
                        <div class="col-md-4"><br>
                        <button type="submit" class="btn btn-primary">update status</button>
                        </div>
                        <div class="col-md-4">
                        <span class="text-bold">Progress Status Message is : <br><span class="text-danger text-uppercase">{{$order->status_message}}</span></span>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
    </div>
</div>
@endsection