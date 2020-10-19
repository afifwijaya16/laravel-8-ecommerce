<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class Cart extends Component
{
    protected $order;
    protected $order_details = [];

    public function render()
    {
        if(Auth::user()){
            $this->order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($this->order) {
                $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
            }
        }

        $orderGet = $this->order;
        $orderDetailGet = $this->order_details;
        return view('livewire.cart', compact('orderGet', 'orderDetailGet'));
    }
}
