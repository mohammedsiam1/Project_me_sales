<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::whereUser_id(Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('Frontend.Collection.Order.index',compact('orders'));
    }
    public function show($id){
        $order=Order::whereUser_id(Auth::user()->id)->whereId($id)->first();
        if($order)
        return view('Frontend.Collection.Order.show',compact('order'));
        else
        return redirect()->back()->with('message','No Order Found');
    }
}
