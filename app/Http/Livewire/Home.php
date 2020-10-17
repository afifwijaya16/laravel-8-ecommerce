<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Home extends Component
{
    public function render()
    {
        $category = Category::all();
        $product = Product::take(4)->get();
        return view('livewire.home' , compact('category', 'product'));
    }
}
