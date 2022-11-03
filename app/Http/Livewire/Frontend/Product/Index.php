<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category ,$brandInputs=[] ,$priceInput;
    protected $queryString =
     [
        'brandInputs' => ['except' => '', 'as' => 'brands'] ,  //  change name form URL
        'priceInput' => ['except' => '', 'as' => 'price'] 
     ];

    public function mount($category){
        $this->category=$category;
    }

    public function render()
    {
        $this->products=Product::
        when($this->brandInputs,function($query){
            $query->whereIn('Brand',$this->brandInputs);
        })->
        when($this->priceInput=='high-to-low',function($query1){
            $query1->orderBy('selling_price','DESC');
        })->
        when($this->brandInputs=='low-to-high',function($query2){
            $query2->orderBy('selling_price','ASC');
        })->
        whereCategory_id( $this->category->id)->whereStatus(1)->get();
        return view('livewire.frontend.product.index',[
            'product' => $this->products, 
            'category' => $this->category
        ]);
    }
}
