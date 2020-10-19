<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
class Navbar extends Component
{
    public $amount = 0;
    
    protected $listeners = [
        'AddToCart' => 'updateCart'
    ];
    
    public function updateCart() {
        if(Auth::user()) {
            $ordered = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($ordered) {
                $this->amount = OrderDetail::where('order_id', $ordered->id)->count();
            }
        }
    }
    public function mount() {
        if(Auth::user()) {
            $ordered = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($ordered) {
                $this->amount = OrderDetail::where('order_id', $ordered->id)->count();
            }
        }
    }
    public function render()
    {
        $amount = $this->amount;
        $category = Category::all();
        return view('livewire.navbar',compact('category', 'amount'));
    }
}
