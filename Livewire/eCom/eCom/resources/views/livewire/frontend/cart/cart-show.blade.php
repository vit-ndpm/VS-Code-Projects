<div>
    <div class="py-3 py-md-5 bg-light ">
        <div class="container">
            <h3>My Cart</h3>
            <hr>
            <div class="row">
                @php
                    $total=0;
                @endphp
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{ url('/collections/product/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                        <label class="product-name">
                                            @if ($cartItem->product->productImages)
                                            <img src="{{ asset($cartItem->product->productImages[0]->image) }}"
                                                style="width: 50px; height: 50px" alt="{{ $cartItem->product->name }}">
                                            @else
                                            No Image
                                            @endif
                                            {{ $cartItem->product->name }}
                                            @if($cartItem->productColor)
                                                <span class="text-success">with Color:{{$cartItem->productColor->color->name}}</span>
                        
                                            @else
                                                
                                            @endif
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{ $cartItem->product->selling_price }}
                                    </label>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{ $cartItem->product->selling_price* $cartItem->quantity}}
                                    </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                            <input type="text" readonly value="{{ $cartItem->quantity }}"
                                                class="input-quantity" />
                                            <button type="button" wire:click="incrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click='removeCartItem({{$cartItem->id}})' class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $total+=$cartItem->product->selling_price* $cartItem->quantity
                        @endphp
                        
                        @empty
                        No Item added into Cart
                        @endforelse
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="text-primary shadow-sm p-3 my-2 bg-white">
                        <h4>
                            Get Best Deals and Offers <a class="text-light btn btn-sm btn-success" href="{{url('/collections')}}">Shop Now</a>
                        </h4>
                    </div>
                    
                </div>
                <div class="col-md-4 ">
                    <div class="shadow-sm p-3 my-2 bg-white ">
                        <h4 class="">Total: <span class="float-end">${{$total}}</span></h4>
                        <hr>
                        <a href="{{url('/checkOut')}}" class="btn btn-warning w-100">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>