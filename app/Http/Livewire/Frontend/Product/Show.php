<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Show extends Component
{
    public $category ,$product ,$productColorQty;

    public function mount($category,$product)
    {
        $this->category=$category;
        $this->product=$product;
    }
    public function colorSelected($productColorId){
        $productColor=$this->product->ColorProduct()->whereId($productColorId)->first();
        $this->productColorQty=$productColor->quantity;
        if($this->productColorQty ==0){
            $this->productColorQty='outOfStock';
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.show',[
            'category'=>$this->category,
            'product'=>$this->product,
        ]);
    }
}
