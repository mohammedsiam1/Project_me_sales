<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Auth;

class WhishlistCount extends Component
{   
    public $wishlistCount;
    protected $listeners=['updateWishlistCount'=>'wishlistCount'];
    public function wishlistCount(){
        if(Auth::check()){
      return $this->wishlistCount= Wishlist::whereUser_id(auth()->user()->id)->count();
    }else{
        return $this->wishlistCount=0;
    } 
}

    public function render()
    {
        $this->wishlistCount= $this->wishlistCount();
        return view('livewire.frontend.whishlist-count',[
            'wishlistCount'=>$this->wishlistCount,
        ]);
    }
}
