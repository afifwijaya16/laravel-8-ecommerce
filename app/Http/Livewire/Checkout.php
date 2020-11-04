<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class Checkout extends Component
{
    public $total_price, $name, $no_phone, $address, $formCheckout, $snapToken;

    protected $listeners = [
        'emptyCart' => 'emptyCartHandler',
        'successCart' => 'successCartHandler',
    ];

    public function mount() {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->formCheckout = true;
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

        $amount_total_price = $order->total_price + $order->code_unique;

        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $amount_total_price
        ];

        $customerDetails = [
            'first_name' => $order->user->name,
            'last_name' => $order->user_id,
            'email' =>  $order->user->email,
            'phone' => $order->user->no_phone,
            'address' => $order->user->address
        ];

        $payload = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails
        ];

        $this->formCheckout = false;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $snapToken = \Midtrans\Snap::getSnapToken($payload);

        $this->snapToken = $snapToken;

    }
    
    public function render()
    {
        return view('livewire.checkout');
    }

    public function emptyCartHandler()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();
        $this->emit('AddToCart');
        session()->flash('message', 'Success Checkout ');
        return redirect()->route('history');
    }

    public function successCartHandler()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->status = 2;
        $order->update();
        $this->emit('AddToCart');
        session()->flash('message', 'Success Checkout ');
        return redirect()->route('history');
    }

}
