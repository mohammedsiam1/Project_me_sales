<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::whereStatus(1)->get();
        $products=Product::whereStatus(1)->whereTrending(1)->latest()->take(15)->get();
        $features=Product::whereFeaturing(1)->latest()->get();
        $newarrivals=Product::latest()->take(16)->get();
        return view('Frontend.index',compact('sliders','products','features','newarrivals'));
    }


    public function newArrivals(){
        $newarrivals=Product::latest()->take(16)->get();
        return view('Frontend.Collection.new_arrivals.index',compact('newarrivals'));
    }

    public function feature(){
        $features=Product::whereFeaturing(1)->latest()->get();
        return view('Frontend.Collection.features.index',compact('features'));
    }
    

    public function thank_you(){
        return view ('Frontend.Collection.Thank_you.thank_you');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
