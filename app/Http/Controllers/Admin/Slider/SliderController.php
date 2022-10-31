<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Backenf\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('Backend.Slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest  $request)
    {
        if ($image = $request->file('image')) {
            $path = 'Upload/Slider/Image';
            $extensionImage = time() . '.' . $image->extension();
            $image->move($path, $extensionImage);

            $imageSlider = Slider::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $extensionImage,
                'status' =>$request->status?1:0,
            ]);
            return redirect()->back()->with(['message','created Slider Successful']);
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
    public function edit(Slider $slider)
    {
       return view ('Backend.Slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        if ($image = $request->file('image')) {
            $oldImage=$slider->image;
            if(File::exists($oldImage)){
                File::delete($oldImage);
            }

            $path = 'Upload/Slider/Image';
            $extensionImage = time() . '.' . $image->extension();
            $image->move($path, $extensionImage);
        }
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $extensionImage ??$slider->image,
                'status' =>$request->status?1:0,
            ]);
            return redirect()->route('sliders.index')->with(['message','created Slider Successful']);
       
    }

  
    public function destroy($id)
    {

       $slider=Slider::findOrFail($id);
       $image=$slider->image;
       if(File::exists($image)){
        dd($image);
        File::delete($image);
    }
       $slider->delete();
        return redirect()->back()->with(['message','deleted slider successful']);
    }
}
