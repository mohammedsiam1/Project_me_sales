<?php

namespace App\Http\Controllers\Admin\Order;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
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

    public function show_invoices($id){
     $order=Order::findOrFail($id);
     if($order){
     return view('Backend.Order.show_invoices',compact('order'));
    }else
    return redirect()->back()->with('message','No Order Found');
    }
    
    public function download_invoices(  $id){
        $order=Order::findOrFail($id);
        if($order){
            $data=['order'=>$order];
        $pdf = Pdf::loadView('Backend.Order.show_invoices', $data);
        $todayDate=Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice -'.$order->fullname.'-'.$todayDate.'.pdf');
    }
}
}
