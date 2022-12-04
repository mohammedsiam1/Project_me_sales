<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Categories', ['only' => ['index']]);
         $this->middleware('permission:Add Category', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Category', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Category', ['only' => ['destroy']]);
    }

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
            $data['image']=$ex_image;
        }
            
            $data['meta_title']=$request->meta_title;
            $data['meta_keyword']=$request->meta_keyword;
            $data['meta_description']=$request->meta_description;
            $data['user_id']=Auth::user()->id;
            Category::create($data);
            return redirect()->back()->with('message','Don Add Category');
        }
    }

  
    public function show($id)
    {
        dd('go');

    }

    public function edit(Category $category)
    {
        return view ('Backend.Category.edit',compact('category'));
    }


    public function update(CategoryRequest $request , Category $category)
    {
        $vildateData=$request->validated();
        if($vildateData){
        
            $data['name']=$request->name;
            $data['slug']=Str::slug( $request->slug);
            $data['description']=$request->description;
            $data['status']=$request->status ?'1':'0';

        if($image=$request->file('image')){
            $ex_image=time().'.'.$image->extension();
            $image->move('Categories/Images', $ex_image);
            $data['image']=$ex_image;
        }
            
            $data['meta_title']=$request->meta_title;
            $data['meta_keyword']=$request->meta_keyword;
            $data['meta_description']=$request->meta_description;
            $data['user_id']=Auth::user()->id;
            $category->update($data);
            return redirect()->back()->with('message','Don Add Category');


        }
        
    }


    public function destroy($id)
    {
      
       $category_id=Category::findOrFail($id);
       if($category_id){
        return redirect()->back()->with(['message',' deleted done']);
       }
    }
}
