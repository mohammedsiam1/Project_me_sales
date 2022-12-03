<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $data['countUser']=User::whereRole(1)->count();
        $data['countAdmin']=User::whereRole(0)->count();
        $data['TotalProducts']=Product::count();
        $data['TotalBrands']=Brand::count();
        $data['TotalOrders']=Order::count();
        $data['TotalCategories']=Category::count();
        $thisMonth=Carbon::now()->format('m');
        $thisDay=Carbon::now()->format('d');
        $data['TotalOrdersMonth']=Order::whereMonth('created_at',$thisMonth)->count();
        $data['TotalOrdersDay']=Order::whereDay('created_at',$thisDay)->count();
        return view('Backend.index',compact('data'));
    }
}
