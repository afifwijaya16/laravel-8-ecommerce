<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Auth;
class ProductDetail extends Component
{
    public $product, $qty_order = 1, $description;

    public function mount($id) {
        $detailId = Product::find($id);

        if($detailId){
            $this->product = $detailId;
        }
    }

    public function AddToCart(){
        $this->validate([
            'qty_order' => 'required|numeric'
        ]);

        if(!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }
    }

    public function increase() {
        $this->qty_order++;
    }

    public function decrease() {
        if($this->qty_order > 1) {
            $this->qty_order--;
        }
    }

    public function render()
    {
        if($this->qty_order !== null){
            $total_price = $this->product->price * $this->qty_order;
        } else {
            $total_price = 0;
        }
        return view('livewire.product-detail', compact('total_price'));
    }
}
