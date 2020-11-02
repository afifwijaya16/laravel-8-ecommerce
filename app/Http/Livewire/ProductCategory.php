<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Crypt;

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
        
        $categoryDetail = Category::find(Crypt::decrypt($categoryId));

        if($categoryDetail) {
            $this->category = $categoryDetail;
        }
    }
    public function render()
    {
        
        if($this->search !== null ) {
            $product = Product::where('category_id', $this->category->id)->where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $product = Product::where('category_id', $this->category->id)->paginate(8);
        }
        if(!empty($this->category->id)) {
            $title = $this->category->name;
        }
        return view('livewire.product-index', compact('product','title'));
    }
}
