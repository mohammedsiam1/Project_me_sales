<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    

    public function index()
    {
       return view ('Backend.Category.index');
    }

    public function create()
    {
        return view ('Backend.Category.create');

    }
    public function store(CategoryRequest $request)
    {
        $vildatedData=$request->validated();
        if($vildatedData){
            $data['name']=$request->name;
            $data['slug']=Str::slug( $request->slug);
            $data['description']=$request->description;
            $data['status']=$request->status ?'1':'0';
            
        if($image=$request->file('image')){
            $ex_image=time().'.'.$image->extension();
            $image->move('Categories/Images', $ex_image);
        }
            $data['image']=$ex_image;
            $data['meta_title']=$request->meta_title;
            $data['meta_keyword']=$request->meta_keyword;
            $data['meta_description']=$request->meta_description;
            Category::create($data);
            return redirect()->back()->with('message','Don Add Category');
        }
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
