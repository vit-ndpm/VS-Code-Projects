<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\ProductColor;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', ['cart' => $this->cart]);
    }
    public function removeCartItem(int $cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)->first();
        if ($cartItem) {
            $cartItem->delete();
            $this->emit('cartAddedUpdated');
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Item Removed from Cart',
                    'type' => 'success',
                    'status' => 200
                ]
            );
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Cart Item Not Found',
                    'type' => 'warning',
                    'status' => 404
                ]
            );
        }
    }

    public function incrementQuantity(int $cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->user()->id)->first();
        if ($cartItem) {
            if ($cartItem->productColor()->where('id', $cartItem->product_color_id)->exists()) {
                $productColor = $cartItem->productColor()->where('id', $cartItem->product_color_id)->first();
                if ($productColor->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                } else {
                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'only ' . $productColor->quantity . ' Quantity available',
                            'type' => 'error',
                            'status' => 404
                        ]
                    );
                }
            } else {
                //code here if not color found
                if ($cartItem->product->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                } else {
                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'only ' . $cartItem->product->quantity. ' Quantity available',
                            'type' => 'error',
                            'status' => 404
                        ]
                    );
                }
            }
        } else {

            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Cart Item Not Found',
                    'type' => 'warning',
                    'status' => 404
                ]
            );
        }
    }

    public function decrementQuantity(int $cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->user()->id)->first();
        if ($cartItem) {
            if ($cartItem->productColor()->where('id', $cartItem->product_color_id)->exists()) {
                $productColor = $cartItem->productColor()->where('id', $cartItem->product_color_id)->first();
                if ( $cartItem->quantity>1) {
                    $cartItem->decrement('quantity');
                } else {
                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'select Atleaset 1 Quantity',
                            'type' => 'error',
                            'status' => 404
                        ]
                    );
                }
            } else {
                //code here if not color found
                if ( $cartItem->quantity>1) {
                    $cartItem->decrement('quantity');
                } else {
                    $this->dispatchBrowserEvent(
                        'message',
                        [
                            'text' => 'Select Atleast 1 Quantity',
                            'type' => 'error',
                            'status' => 404
                        ]
                    );
                }
            }
        } else {

            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Cart Item Not Found',
                    'type' => 'warning',
                    'status' => 404
                ]
            );
        }

    }
}
