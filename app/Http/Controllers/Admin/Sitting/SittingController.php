<?php

namespace App\Http\Controllers\Admin\sitting;

use App\Models\Sitting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SittingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websitting=Sitting::first();
       return view ('Backend.Sitting.index',compact('websitting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $websitting=Sitting::first();
        if($websitting){
            $websitting->update([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'title'=>$request->title,
                'website_keyword'=>$request->website_keyword,
                'website_description'=>$request->website_description,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ]);
            return redirect()->back()->with('message','Updating successfully');
        }else{
           Sitting::create([
                'website_name'=>$request->website_name,
                'website_url'=>$request->website_url,
                'title'=>$request->title,
                'website_keyword'=>$request->website_keyword,
                'website_description'=>$request->website_description,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ]);
            return redirect()->back()->with('message','creating successfully');
        }
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
