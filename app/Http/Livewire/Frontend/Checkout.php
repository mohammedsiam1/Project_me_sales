<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Checkout extends Component
{
    use LivewireAlert;
    public $carts ,$totalProductAmount=0 ,$fullname,$phone,$email,$pincode,$address ,$paymentMode =null ,$payment_id=null;

    protected $listeners=[
        'validationForAll',
        'CompletePayment'=>'PayWithPaypal'
    ];
    public function PayWithPaypal($id){
        $this->payment_id=$id;
        $this->paymentMode="Paid by paypal";
        $codOrder=$this->placeOrder();
        if($codOrder){
            Cart::whereUser_id(auth()->user()->id)->delete();
            return redirect()->route('thank.you');
            $this->alert('success','order placed successfully');
        }else{
            $this->alert('error','something is wrong !');
        }
        }
    public function validationForAll(){
        $this->validate();
    }
    public function rules(){
        return[
            'fullname'=>'required|string|max:121',
            'email'=>'required|email|max:121',
            'phone'=>'required|string|max:121',
            'pincode'=>'required|string|max:6|min:6',
            'address'=>'required|string|max:500',
        ];
    }



    public function codOrder(){
        $this->paymentMode='Cash on delivery';
        $codOrder=$this->placeOrder();
        if($codOrder){
            Cart::whereUser_id(auth()->user()->id)->delete();
            $this->alert('success','order placed successfully');
            return redirect()->route('thank.you');
        }else{
            $this->alert('error','something is wrong !');
        }
    }


    public function placeOrder(){
        $this->validate();
        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>'FACTOR-'.Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>$this->paymentMode,
            'payment_id'=>$this->payment_id,
        ]);
       
        foreach($this->carts as $cartItem){
            $orderItem=OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=> $cartItem->product_id,
                'color_product_id'=> $cartItem->color_product_id,
                'qty'=>$cartItem->qyt,
                'price'=>$cartItem->product->selling_price,
            ]);
            if( $cartItem->color_product_id != NULL){
                $cartItem->ColorProduct()->whereId($cartItem->color_product_id)->decrement('quantity',$cartItem->qyt);
            }else{
                $cartItem->product()->whereId($cartItem->product_id)->decrement('quantity',$cartItem->qyt);
                
            }
        }
        
        return $order;
    }


    public function totalProductAmount(){
        $this->totalProductAmount=0;
        $this->carts=Cart::whereUser_id(auth()->user()->id)->get();
        foreach($this->carts as $cartItem){
            $this->totalProductAmount +=$cartItem->product->selling_price * $cartItem->qyt;
        }
        return $this->totalProductAmount;
    }

    
    public function render()
    {
        $this->fullname=auth()->user()->first_name. ' '. auth()->user()->last_name ;
        $this->email=auth()->user()->email;
      $totalProductAmount=  $this->totalProductAmount=$this->totalProductAmount();
        return view('livewire.frontend.checkout',[
            'totalProductAmount'=>$totalProductAmount,
            
        ]);
    }
}
