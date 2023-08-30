<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $product, $category, $prodColorSelectedQuantity, $countQuantity = 1, $selectdProductColorId;

    public function mount($product, $category)
    {
        $this->product = $product;
        $this->category = $category;
        # code...
    }
    public function render()
    {
        return view('livewire.frontend.products.view');
    }
    public function colorSelected(int $productColorId)
    {
        $this->selectdProductColorId = $productColorId;
        $prodColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $prodColor->quantity;
        if ($this->prodColorSelectedQuantity == '0') {
            $this->prodColorSelectedQuantity == 'outOfStock';
        } else {
        }
    }
    public function addToWishList(int $productId)
    {
        if (Auth::check()) {
            if (WishList::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                # code...

                session()->flash('message', 'Product Already addded to Your Wishlist');
                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Product Already addded to Your Wishlist',
                        'type' => 'error',
                        'status' => 500
                    ]
                );
                return false;
            } else {
                # code...
                $wishList = WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                session()->flash('message', 'Product Added to Wishlsit Successfully');
                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Product Added to Wishlsit Successfully',
                        'type' => 'success',
                        'status' => 200
                    ]
                );

                $this->emit('wishListAddedOrUpdated');
                //Code for Updating Wishlist in Navbar automatically
            }
        } else {
            session()->flash('message', 'Please login to Continue');

            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Please login to Continue',
                    'type' => 'info',
                    'status' => 401
                ]
            );
            return false;
        }
    }
    public function decrementQuantity()
    {
        if ($this->countQuantity > 1) {
            $this->countQuantity--;
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => '1 is Minimum value',
                    'type' => 'warning',
                    'status' => 200
                ]
            );
        }
    }
    public function incrementQuantity()
    {
        if ($this->countQuantity < 10) {
            $this->countQuantity++;
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => '10 is Maximum value',
                    'type' => 'warning',
                    'status' => 200
                ]
            );
        }
    }
    public function addToCart(int $productId2)
    { //1. check is user authenticated or Not
        if (Auth::check()) {
            //2. whether selected Product exists or Not
            if ($this->product = Product::where('id', $productId2)->where('status', '1')->first()) {
                //3.Check if selected product has colors or not
                if ($this->product->productColors->count() > 0) {
                    if ($this->prodColorSelectedQuantity != NULL) {
                        $productColor = $this->product->productColors()->where('id', $this->selectdProductColorId)->first();
                        if ($productColor->quantity > $this->countQuantity) {
                            //dd('i am in add to cart with color');
                            if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId2)->where('product_color_id', $this->selectdProductColorId)->exists()) {
                                # code...
                                $this->dispatchBrowserEvent(
                                    'message',
                                    [
                                        'text' => 'Product already added to Cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]
                                );
                            } else {
                                # code...
                                Cart::create(
                                    [
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId2,
                                        'product_color_id' => $productColor->id,
                                        'quantity' => $this->countQuantity,
                                    ]
                                );
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent(
                                    'message',
                                    [
                                        'text' => 'Product added to Cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]
                                );
                            }
                        } else {
                            $this->dispatchBrowserEvent(
                                'message',
                                [
                                    'text' => 'Only ' . $this->productColor->quantity . ' Quantity available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]
                            );
                        }
                    } else {
                        $this->dispatchBrowserEvent(
                            'message',
                            [
                                'text' => 'Select Product Color',
                                'type' => 'info',
                                'status' => 401
                            ]
                        );
                    }
                } else {
                    //4. check if available product quantity is greater than Selected Quantity
                    if ($this->product->quantity > $this->countQuantity) {
                        //dd('i am add to cart without color');
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId2)->exists()) {
                            # code...
                            $this->dispatchBrowserEvent(
                                'message',
                                [
                                    'text' => 'Product already added to Cart',
                                    'type' => 'warning',
                                    'status' => 200
                                ]
                            );
                        } else {
                            Cart::create(
                                [
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId2,
                                    'quantity' => $this->countQuantity,
                                ]
                            );
                            $this->emit('cartAddedUpdated');
                            $this->dispatchBrowserEvent(
                                'message',
                                [
                                    'text' => 'Product added to Cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]
                            );
                        }
                    } else {

                        $this->dispatchBrowserEvent(
                            'message',
                            [
                                'text' => 'Only ' . $this->product->quantity . ' Quantity available',
                                'type' => 'warning',
                                'status' => 404
                            ]
                        );
                    }
                }
            } else {
                $this->dispatchBrowserEvent(
                    'message',
                    [
                        'text' => 'Product Does not exist',
                        'type' => 'warning',
                        'status' => 404
                    ]
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'message',
                [
                    'text' => 'Please Login to Add to Cart',
                    'type' => 'info',
                    'status' => 401
                ]
            );
        }
    }
}
