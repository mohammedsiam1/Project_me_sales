<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    public $category, $product, $productColorQty, $quantity = 1, $productColorId;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    public function increment()
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        } else {
            return $this->alert('error', 'can not add more 10');
        }
    }

    public function addToCart($productId)
    {

        if (Auth::check()) {

            if ($this->product->whereId($productId)->whereStatus(1)->exists()) {
                if ($this->product->ColorProduct()->count() > 1) {
                    if ($this->productColorQty != null) {
                        if (Cart::whereProduct_id($productId)->whereColor_product_id($this->productColorId)->whereUser_id(auth()->user()->id)->exists()) {
                            $this->alert('error', 'this product already exists');
                        } else {


                            $productColor = $this->product->ColorProduct()->whereId($this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantity) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $this->product->id,
                                        'color_product_id' => $this->productColorId,
                                        'qyt' => $this->quantity,
                                    ]);
                                    $this->emit('cartCountUpdated');
                                    $this->alert('success', 'product added successfully');
                                } else {
                                    $this->alert('error', 'quantity not available');
                                }
                            } else {
                                $this->alert('error', 'Out of stack');
                            }
                        }
                    } else {
                        $this->alert('error', 'please select your product color');
                    }
                    } else {
                    if (Cart::whereProduct_id($productId)->whereUser_id(auth()->user()->id)->first()) {
                        $this->alert('error', 'this product already exists');
                    } else {

                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantity) {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $this->product->id,
                                    'qyt' => $this->quantity,
                                ]);
                                $this->emit('cartCountUpdated');
                                $this->alert('success', 'product added successfully');
                            } else {
                                $this->alert('error', 'quantity not available');
                            }
                        } else {
                            $this->alert('error', 'product Out of stock');
                        }
                    }
                }
            } else {
                $this->alert('error', 'product dose not exists');
            }
        } else {
            return $this->alert('error', 'please login first');
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::whereUser_id(auth()->user()->id)->whereProduct_id($productId)->exists()) {
                return $this->alert('error', 'product already existing in wishList');
            } else {
                $productWhishList = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('updateWishlistCount');
                if ($productWhishList)
                    return $this->alert('success', 'product added in wishList ');
            }
        } else {
            return $this->alert('error', 'Please login to continue');
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->ColorProduct()->whereId($productColorId)->first();
        $this->productColorQty = $productColor->quantity;
        if ($this->productColorQty == 0) {
            $this->productColorQty = 'outOfStock';
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.show', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
