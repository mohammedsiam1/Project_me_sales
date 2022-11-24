<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    public function index(){
        $orderDate=Carbon::now();
        $orders=Order::whereDate('created_at',$orderDate)->paginate(10);
        return view('Backend.Order.index',compact('orders'));
    }
    public function show($id){
        $order=Order::whereId($id)->first();
        if($order)
        return view('Backend.Order.show',compact('order'));
        else
        return redirect()->back()->with('message','No Order Found');
    }
}
