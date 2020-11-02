<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Crypt;

class ProductDetail extends Component
{
    public $product, $qty_order, $total_price, $description;

    public function mount($id) {
        $detailId = Product::find(Crypt::decrypt($id));

        if($detailId){
            $this->product = $detailId;
        }
    }

    public function AddToCart(){
        $this->validate([
            'qty_order' => 'required|numeric'
        ]);

        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $ordered = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $total_price = $this->product->price * $this->qty_order;
        if(empty($ordered)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'status' => 0,
                'code_unique' => mt_rand(100,999),
                'description' => '-'
            ]);

            $ordered = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $ordered->code_order = 'CO-'.$ordered->id;
            $ordered->update();
        } else {
            $ordered->total_price = $ordered->total_price + $total_price;
            $ordered->update();
        }

        $orderedDetail = OrderDetail::where('order_id', $ordered->id)->where('product_id', $this->product->id)->first();
        if(empty($orderedDetail)){
            OrderDetail::create([
                'product_id' => $this->product->id,
                'order_id' => $ordered->id,
                'qty_order' => $this->qty_order,
                'description' => $this->description,
                'total_price' => $total_price,
            ]);
        } else {
            $orderedDetail->qty_order = $orderedDetail->qty_order + $this->qty_order;
            $orderedDetail->total_price = $orderedDetail->total_price + $total_price;
            $orderedDetail->description = $this->description;
            $orderedDetail->update();
        }
        $this->emit('AddToCart');
        $this->qty_order = 0;
        $this->description = '';
        return redirect()->back()->with('message', 'Success add to cart');
    }

    // public function increase() {
    //     $this->qty_order++;
    // }

    // public function decrease() {
    //     if($this->qty_order > 1) {
    //         $this->qty_order--;
    //     }
    // }

    public function render()
    {
        if($this->qty_order !== null && $this->qty_order !== ''){
            $total_price_input = $this->product->price * $this->qty_order;
        } else {
            $total_price_input = 0;
        }
        return view('livewire.product-detail', compact('total_price_input'));
    }
}
