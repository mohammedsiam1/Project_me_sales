<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    public $category ,$product ,$productColorQty;

    public function mount($category,$product)
    {
        $this->category=$category;
        $this->product=$product;
    }
    public function addToWishList($productId){
        if(Auth::check()){
            if(Wishlist::whereUser_id(auth()->user()->id)->whereProduct_id($productId)->exists()){
                return $this->alert('error','product already existing in wishList');
            }else{
              $productWhishList=Wishlist::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$productId,
                ]);
                if($productWhishList)
                return $this->alert('success','product added in wishList ');
            }

        }else{
            return $this->alert('error','Please login to continue');
        }
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
