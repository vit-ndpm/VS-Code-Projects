<?php

namespace App\Http\Livewire;

use App\Models\ProductColor;
use Livewire\Component;

class ProdColorQty extends Component
{
    public $productColors;
    public $quantity=[];
    public function render()
    {
        return view('livewire.prod-color-qty');
    }
    public function mount($productColors){
        $this->productColors=$productColors;
    }
}
