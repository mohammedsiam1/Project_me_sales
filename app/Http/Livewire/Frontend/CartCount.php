<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount ;
    protected $listeners=['cartCountUpdated'=>'checkCountCart'];

    public function checkCountCart(){
        if(Auth::check()){
          return $this->cartCount=Cart::whereUser_id(auth()->user()->id)->count();
           
        }else{
            return $this->cartCount=0;
        } 
    }

    public function render()
    {
        $productsCart= $this->cartCount=$this->checkCountCart();
        return view('livewire.frontend.cart-count',[
            'cartCount'=>$productsCart
        ]);
    }
}
