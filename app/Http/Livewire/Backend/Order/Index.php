<?php

namespace App\Http\Livewire\Backend\Order;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Collection;

class Index extends Component
{

    public $date, $status ,$orderDate;
    public function index(){
        $this->orderDate=Carbon::now()->format('Y-m-d');
        $this->orders=Order::when($this->date != null,function($q){
                    return $q->whereDate('created_at',$this->date);
        })
        ->when($this->status != null,function($q){
            return $q->whereStatus_message($this->status);
        },function($q){
            $q->whereDate('created_at',$this->orderDate);
        })
        ->get();
    }
 
    public function render()
    {
      $this->index();
        return view('livewire.backend.order.index',[
            'orders' => $this->orders,
        ]);
    }
}
