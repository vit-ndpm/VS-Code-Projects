<?php

namespace App\Http\Livewire\Frondend;

use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    public function render()
    {
        if (Auth::check()) {
            $wishlist = WishList::where('user_id', auth()->user()->id)->get();
        }
        return view('livewire.frondend.wishlist-show', compact('wishlist'));
    }
    public function removeWishList(int $wishListId)
    {
        $this->emit('wishListAddedOrUpdated');
        //Code for Updating Wishlist in Navbar automatically


        $wishlistItem = Wishlist::where('id', $wishListId)->where('user_id', auth()->user()->id)->first();
        if ($wishlistItem) {
            $wishlistItem->delete();
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Item Removed from Wishlist',
                    'type' => 'success',
                    'status' => 200
                ]
            );
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Item  not found in  Wishlist',
                    'type' => 'error',
                    'status' => 404
                ]
            );
        }
    }
}
