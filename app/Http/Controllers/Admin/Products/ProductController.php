<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Models\ImageProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('Backend.Product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=Product::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>$request->slug,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'brand'=>$request->brand,
            'original_price'=>$request->original_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity,
            'status'=>$request->description?1:0,
            'trending'=>$request->trending?1:0,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
        ]);
        if($images=$request->file('image')){
            $i=1;
            foreach($images as $image){
            $path='Upload/Products/Images';
            $extension=time().$i++.'.'.$image->extension();
            $image->move($path,$extension);
            $image_product=ImageProduct::create([
                'product_id'=>$product->id,
                'image'=>$extension,
            ]);
        }
        }
        return redirect()->back()->with('message','created product successful');

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
