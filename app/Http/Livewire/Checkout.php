<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class Checkout extends Component
{
    public $total_price, $name, $no_phone, $address;

    public function mount() {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->name = Auth::user()->name;
        $this->no_phone = Auth::user()->no_phone;
        $this->address = Auth::user()->address;

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($order)) {
            $this->total_price = $order->total_price + $order->code_unique;
        } else {
            return redirect()->route('home');
        }
    }

    public function checkout() {
        $this->validate([
            'no_phone' => 'required',
            'address' => 'required'
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->no_phone = $this->no_phone;
        $user->address = $this->address;
        $user->update();

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();

        $this->emit('AddToCart');
        session()->flash('message', 'Success Checkout ');
        return redirect()->route('history');
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
