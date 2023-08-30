<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $brands;
    public $category;
    public $brandInputs = [];
    public $priceInput;
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
    public function mount($category, $brands)
    {
        # code...
        $this->category = $category;
        $this->brands = $brands;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
                         ->when($this->brandInputs, function ($querry)
                                {
                                    $querry->whereIn('brand', $this->brandInputs);
                                })
                         ->when($this->priceInput, function ($querry)
                                {
                                    $querry->when($this->priceInput=='high_to_low',function($querry2){
                                        $querry2->orderBy('selling_price','DESC');
                                    });
                                    $querry->when($this->priceInput=='low_to_high',function($querry2){
                                        $querry2->orderBy('selling_price','ASC');
                                    });
                                })
                         
                            ->get();
        // dd($this->products);
        return view('livewire.frontend.products.index', ['products' => $this->products, 'category' => $this->category]);
    }
}
