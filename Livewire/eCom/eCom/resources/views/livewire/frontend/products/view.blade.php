<div>
    {{-- In work, do what you enjoy. --}}


    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="py-3 py-md-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 mt-3">
                                <div class="bg-white border">
                                    @if ($product->productImages)
                                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100"
                                            alt="Img">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7 mt-3">
                                <div class="product-view">
                                    <h4 class="product-name">
                                        {{ $product->name }}

                                    </h4>
                                    <hr>
                                    <p class="product-path">
                                        Home / {{ $category->name }} / {{ $product->name }}
                                    </p>

                                    <div>
                                        <span class="selling-price">${{ $product->selling_price }}</span>
                                        <span class="original-price">${{ $product->original_price }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="input-group">
                                            <span class="btn btn1" wire:click="decrementQuantity"><i
                                                    class="fa fa-minus"></i></span>
                                            <input type="text" wire:model="countQuantity"
                                                value="{{ $countQuantity }}" class="input-quantity" readonly />
                                            <span class="btn btn1"wire:click="incrementQuantity"><i
                                                    class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                    <div class="pt-4 d-block">
                                        @if ($product->productColors->count() > 0)

                                            @if ($product->productColors)
                                                @foreach ($product->ProductColors as $productColor)
                                                    <label class="colorSelectionLabel mx-3 p-2 text-light"
                                                        style="background-color: {{ $productColor->color->code }}"
                                                        wire:click="colorSelected({{ $productColor->id }})">{{ $productColor->color->name }}</label>
                                                @endforeach

                                            @endif
                                            @if ($prodColorSelectedQuantity <= 0)
                                                <button class="btn  mx-1 label-stock bg-danger text-white">out of
                                                    Stock</button>
                                            @elseif ($prodColorSelectedQuantity > 0)
                                                <button class="btn  mx-1 label-stock bg-success text-white">In
                                                    Stock</button>
                                            @endif
                                        @else
                                            @if ($product->quantity > 0)
                                                <div>
                                                    <button class="btn  mx-1 label-stock bg-success text-white">In
                                                        Stock</button>
                                                </div>
                                            @else
                                                <div>
                                                    <button class="btn  mx-1 label-stock bg-danger text-white">out of
                                                        Stock</button>
                                                </div>
                                            @endif

                                        @endif

                                    </div>
                                    <div class="mt-2">
                                        <button type="button" wire:click='addToCart({{$product->id}})' class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To
                                            Cart</button>
                                        <button type="button" wire:click='addToWishList({{ $product->id }})'
                                            class="btn btn1">
                                            <span wire:loading.remove>
                                                <i class="fa fa-heart"></i> Add To
                                                Wishlist</span>
                                            <span wire:loading wire:target="addToWishList">
                                                Adding...
                                            </span>
                                        </button>
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="mb-0">Description</h5>
                                        <p>
                                            {{ $product->small_description }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            {{ $product->long_description }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
