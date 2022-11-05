<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Frontend\Whishlist;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Whishlist extends Component
{
    use LivewireAlert;
    public function removeProductWishlist($productId){
        
      Wishlist::where('User_id' ,auth()->user()->id)->where('id',$productId)->delete();
                $this->emit('updateWishlistCount');
            return $this->alert('success','product deleted successfully');
      
    }
    public function render()
    {
        if(Auth::check())
        $this->products=Wishlist::whereUser_id(auth()->user()->id)->get();
        
        return view('livewire.frontend.whishlist',[
            'whishlist'=>$this->products,
        ]);
    }
}
