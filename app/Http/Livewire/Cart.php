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

    public function destroyCart($id){
        $order_detail = OrderDetail::find($id);
        
        if(!empty($order_detail)) {
            $order = Order::where('id', $order_detail->order_id)->first();
            $amount_qty_order = Orderdetail::where('order_id',$order->id)->count();
            if($amount_qty_order == 1) {
                $order->delete();
            } else {
                $order->total_price = $order->total_price - $order_detail->total_price;
                $order->update();
            }
            $order_detail->delete();
            $this->emit('AddToCart');

            return redirect()->back()->with('message', 'Success Delete item');
        }
        
    }
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
