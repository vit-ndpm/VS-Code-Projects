<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $totalAmount=0;
    public $fullName,$email,$address,$phoneNumber,$pincode,$paymentMode;
    public function rules()
    {
        # code...
        return [
            'fullName'=>'string|required',
            'email'=>'email|required',
            'address'=>'string|required|max:250',
            'phoneNumber'=>'string|required|digits:10',
            'pincode'=>'string|required|digits:10',
            'paymentMode'=>'required',
        ];
    }
    
    public function render()
    {
        $this->totalAmount=$this->getTotalAmount();
        return view('livewire.frontend.checkout.checkout-show',['totalAmount'=>$this->totalAmount]);
    }
    public function getTotalAmount()
    {
        $this->totalAmount=0;
        $cart=Cart::where('user_id',auth()->user()->id)->get();
        foreach ($cart as  $cartItem) {
            $this->totalAmount+=$cartItem->product->selling_price*$cartItem->quantity;
        }
        return($this->totalAmount) ;
    }
    public function codOrder()
    {
        # code...
        $validatedData=$this->validate();
        dd($validatedData);
    }
}
