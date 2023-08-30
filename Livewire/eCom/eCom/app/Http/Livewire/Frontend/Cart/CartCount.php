<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    protected $listeners = ['cartAddedUpdated' => 'checkCartCount'];
    public $cartCount;
    public function render()
    {
        $cartCount=$this->checkCartCount();
        return view('livewire.frontend.cart.cart-count',['cartCount'=>$this->cartCount]);
    }
    public function checkCartCount()
    {
        if (Auth::check()) {
            # code...
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            $this->cartCount = 0;
        }
    }
}
