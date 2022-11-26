<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartShow extends Component
{   
    use LivewireAlert;
    public $totalPrice=0;
    
    public function decrement($productCartId){
        $productCart=Cart::whereUser_id(auth()->user()->id)->whereId($productCartId)->first();
        if($productCart){
            if($productCart->ColorProduct()->whereId( $productCart->color_product_id)->exists()){
                $productColor=$productCart->colorProduct()->whereId( $productCart->color_product_id)->first();
                if($productCart->qyt !=1 ){
                    $productCart->decrement('qyt');
                    return  $this->alert('success','quantity updated');
                }else{
                    return  $this->alert('error','this is last quantity, remove it');
                }
            }else{
                    $productCart->decrement('qyt');
                    return  $this->alert('success','quantity updated');
               
            }
          
        }else{
            return $this->alert('error','product dose not exists');
        }
    }
    public function increment($productCartId){
        $productCart=Cart::whereUser_id(auth()->user()->id)->whereId($productCartId)->first();
        if($productCart){
            if($productCart->ColorProduct()->whereId( $productCart->color_product_id)->exists()){
                $productColor=$productCart->colorProduct()->whereId( $productCart->color_product_id)->first();
                if($productColor->quantity > $productCart->qyt){
                    $productCart->increment('qyt');
                    return  $this->alert('success','quantity updated');
                }else{
                    return  $this->alert('error','quantity not avelable');
                }
            }else{
                if($productCart->product->quantity > $productCart->qyt){
                    $productCart->increment('qyt');
                    return  $this->alert('success','quantity updated');
                }else{
                    return  $this->alert('error','quantity not avelable');

                }
            }
          
        }else{
            return $this->alert('error','product dose not exists');
        }
    }
    public function removeProductCart($productCartId){
        $productCart=Cart::whereUser_id(auth()->user()->id)->whereId($productCartId)->first();
        if($productCart){
            $productCart->delete();
            $this->emit('cartCountUpdated');
            return  $this->alert('success','deleted product successfully');
        }else{
          return  $this->alert('error','something is wrong');
        }
    }

    public function render()
    {
        $productsCart=Cart::whereUser_id(auth()->user()->id)->get();
        return view('livewire.frontend.cart-show',[
            'productsCart'=>$productsCart
        ]);
    }
}
