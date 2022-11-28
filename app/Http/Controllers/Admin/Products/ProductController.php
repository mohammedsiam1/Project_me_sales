<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Color;
use App\Models\ProductColor;

class ProductController extends Controller
{
   
    public function index()
    {
        $products=Product::with('category')->get();
        return view('Backend.Product.index',compact('products'));
    }

 
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        $colors=Color::whereStatus(1)->get();
        return view('Backend.Product.create',compact('categories','brands','colors'));
    }


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
            'featuring'=>$request->featuring?1:0,
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
            $product->productImages()->create([
                'product_id'=>$product->id,
                'image'=>$extension,
            ]);
        }
        }
        if($colors=$request->colors){
            foreach($colors as $key=> $color){
                $product->ColorProduct()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=>$request->colorQuantity[$key]??0
                ]); 
            }
        }
        return redirect()->back()->with('message','created product successful');

    }


    public function show($id)
    {
        dd('ok show');
    }

 
    public function edit(Product $product)
    {
        $categories=Category::all();
        $brands=Brand::all();
       $product_color= $product->ColorProduct->pluck('color_id')->toArray();
        $colors=Color::whereNotIn('id',$product_color)->get();
       
        return view ('Backend.Product.edit',compact('product','categories','brands','colors'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
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
            'featuring'=>$request->featuring?1:0,
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
            $product->productImages()->create([
                'product_id'=>$product->id,
                'image'=>$extension,
            ]);
        }
        }
    
        if($colors=$request->colors){
            foreach($colors as $key=> $color){
                $product->ColorProduct()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=>$request->colorQuantity[$key]??0
                ]); 
            }
        }
     
        $product->save();
        return redirect()->route('products.index')->with('message','Update product successful');

    }

    public function destroy($id)
    {
       $Product=Product::findOrFail($id);
       if($Product->productImages){
        foreach($Product->productImages as $image){
           $image->delete();
           if(File::exists('Upload/Products/Images/'.$image->image)){
            File::delete('Upload/Products/Images/'.$image->image);
           }
        }
       }
       $Product->delete();
       return redirect()->back()->with('message','deleted product successful');


    }
    public function deleteImageProduct($id){
         $imageProduct =ImageProduct::findOrFail($id);
       if(File::exists('Upload/Products/Images/'.$imageProduct->image)){
            File::delete('Upload/Products/Images/'.$imageProduct->image);
       }
       $imageProduct->delete();
       return redirect()->back()->with('message','Deleted image successful');

    }

    public function updateColor(Request $request ,$color_id){

        $colorId=Product::findOrFail($request->product_id)->ColorProduct()->whereId($color_id)->first();
        $colorId->update([
            'quantity'=>$request->qut
        ]);
        return response()->json(['message'=>'Product color Updated']);
    }
    public function deleteColor( $color_id){
        $colorId=ProductColor::findOrFail($color_id)->delete();
        return response()->json(['message'=>'product color deleted']);
    }
}
