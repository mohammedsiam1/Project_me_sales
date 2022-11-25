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
       
        return view('Backend.Order.index');
    }
    public function show($id){
        $order=Order::whereId($id)->first();
        if($order)
        return view('Backend.Order.show',compact('order'));
        else
        return redirect()->back()->with('message','No Order Found');
    }
    public function updateOrder(Request $request ,$id){
        if($request->order_progress != null){
        $order=Order::whereId($id)->first();
        if($order){
            $order->update([
                'status_message'=>$request->order_progress,
            ]);
            return redirect()->back()->with('message','Updated successfully');
        }
        else
        return redirect()->back()->with('message','No Order Found');
    
    }else{
        return redirect()->back()->with('message','please enter status');
    }
}
}
