<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ProductCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category = '';

    public $search = '';

    protected $updateQueryString = ['search' => ['except' => '']];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($categoryId) {
        
        $categoryDetail = Category::find($categoryId);

        if($categoryDetail) {
            $this->category = $categoryDetail;
        }
        $this->fill(request()->only('search'));
    }
    public function render()
    {
        
        if($this->search !== null ) {
            $products = Product::where('category_id', $this->category->id)->where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $products = Product::where('category_id', $this->category->id)->paginate(8);
        }
        return view('livewire.product-index', ['product' => $products]);
    }
}
