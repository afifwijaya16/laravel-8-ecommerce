<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Order;
use App\Models\OrderDetail;
class History extends Component
{
    public $order;
    public $order_detail;

    public function render()
    {
        if(Auth::user()) {
            $this->order = Order::where('user_id', Auth::user()->id)->where('status', '!=' , 0)->orderBy('created_at','desc')->get();
            $this->order_details = OrderDetail::all();
        }
        return view('livewire.history');
    }
}
