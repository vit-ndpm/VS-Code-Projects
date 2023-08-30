<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\WishList;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishListCount;
    // 
    protected $listeners = ['wishListAddedOrUpdated' => 'checkWishListCount'];
    public function checkWishListCount()
    {
        if (Auth::check()) {
            $this->wishListCount = WishList::where('user_id', auth()->user()->id)->count();
        } else {
            $this->wishListCount = 0;
        }
    }
    public function render()
    {
        $this->checkWishListCount();
        return view('livewire.frontend.wishlist.wishlist-count', ['wishListCount' => $this->wishListCount]);
    }
}
