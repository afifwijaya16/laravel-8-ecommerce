<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Navbar extends Component
{
    public function render()
    {
        $category = Category::all();
        return view('livewire.navbar',compact('category'));
    }
}
