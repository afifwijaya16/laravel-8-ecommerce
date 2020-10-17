<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if($this->search) {
            $product = Product::where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $product = Product::paginate(8);
        }
        return view('livewire.product-index', compact('product'));
    }
}
