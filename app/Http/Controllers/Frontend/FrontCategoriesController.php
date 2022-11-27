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
    public function showProduct($categorySlug,$productSlug){
        $category=Category::whereSlug($categorySlug)->whereStatus(1)->first();
        if($category){
            $product=$category->products()->whereSlug($productSlug)->whereStatus(1)->first();
        
        if($product){
            return view('Frontend.Collection.Products.show',compact('product','category'));
        }else{
            return redirect()->back();
        }
    }
        else{
            return redirect()->back();
        }
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
