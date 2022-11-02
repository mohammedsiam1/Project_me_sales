<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontCategoriesController extends Controller
{
 
    public function index()
    {
        
        $categories=Category::whereStatus(1)->get();
        return view('Frontend.Collection.category.index',compact('categories'));
    
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $category=Category::whereSlug($slug)->first();
        if($category){
            $products=$category->products()->get();
            return view('Frontend.Collection.Products.index',compact('category','products'));
        }
    
    }
    public function showProduct($slug){
        dd($slug);
    }

    public function edit($id)
    {
       
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
