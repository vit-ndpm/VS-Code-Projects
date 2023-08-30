<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">

    </div>


    <div class="row">
        <div class="col-md-3">
            @if ($brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($brands as $brand)
                    <div class="form-check">
                        <label class="form-check-label">
                            {{$brand->name}}
                        </label>
                        <input wire:model='brandInputs' class="form-check-input" type="checkbox"
                            value="{{$brand->name}}">

                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card my-2">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <div class="d-block">
                        <input type="radio" wire:model='priceInput' name="priceSort" value="high_to_low">
                        <label for="price">High To Low</label>
                    </div>
                    <div class="d-block">
                        <input type="radio" wire:model='priceInput' name="priceSort" value="low_to_high">
                        <label for="price">Low To High</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                @forelse ($products as $product )
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($product->quantity>0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">out of Stock</label>
                            @endif

                            @if ($product->productImages->count()>0)
                            <img src="{{asset($product->productImages[0]->image)}}" alt="Laptop">
                            @endif

                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->brand}}</p>
                            <h5 class="product-name">
                                <a href="">
                                    {{$product->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price"> {{$product->selling_price}}</span>
                                <span class="original-price">{{$product->original_price}}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="{{url('/collections/product/'.$category->slug.'/'.$product->slug)}}" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                No Product available in this category
                @endforelse


            </div>
        </div>
    </div>
</div>