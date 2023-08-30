@extends('layouts.admin')
@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $message)
            <li>{{$message}}</li>

       


    @endforeach
</ul>
</div>
    @endif
    <div class="col-md-12">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Products</h3>
                <a href="{{ url('admin/product/') }}" class="btn btn-success text-light float-end">Back</a>
            </div>
            <form action="{{ url('admin/product/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tags" data-bs-toggle="tab" data-bs-target="#seo"
                                type="button" role="tab" aria-controls="seo" aria-selected="false">SEO
                                Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="price-tab" data-bs-toggle="tab" data-bs-target="#price"
                                type="button" role="tab" aria-controls="price" aria-selected="false">Price and
                                Other
                                Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">Images</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                type="button" role="tab" aria-controls="color" aria-selected="false">Colors</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane border  card shadow p-3 fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="mb-3 mt-3">
                                <label for="">Select Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @isset($categories)
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                                @error('category_id')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Select Brand</label>
                                <select name="brand" id="" class="form-control">
                                    @isset($brands)
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                                @error('brand')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="" class="form-control" placeholder="Enter Slug">
                                @error('slug')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Enter product name">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="small_description">Short Product Description</label>
                                <textarea name="small_description" id="" rows="3"
                                    placeholder="Please Enter Product Short Description" class="form-control">
                                </textarea>
                                @error('small_description')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="long_description">Long Product Description</label>
                                <textarea name="long_description" id="" rows="3"
                                    placeholder="Please Enter Product Long Description" class="form-control">

                                </textarea>
                                @error('long_description')
                                {{ $message }}
                                @enderror
                            </div>

                        </div>
                        <div class="tab-pane border  card shadow p-3 fade" id="seo" role="tabpanel"
                            aria-labelledby="seo-tags">
                            <div class="mb-3">
                                <label for="meta_title">meta_title</label>
                                <input type="text" name="meta_title" id="" class="form-control"
                                    placeholder="Enter meta_title">
                                @error('meta_title')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meta_keywords">meta_keywords</label>
                                <textarea name="meta_keywords" id="" rows="3" placeholder="Please Enter meta_keywords"
                                    class="form-control">
                            </textarea>
                                @error('meta_keywords')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meta_description">meta_description</label>
                                <textarea name="meta_description" id="" rows="3"
                                    placeholder="Please Enter meta_description" class="form-control">
                            </textarea>
                                @error('meta_description')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane border  card shadow p-3 fade" id="price" role="tabpanel"
                            aria-labelledby="price-tab">
                            <div class="mb-3">
                                <label for="original_price">Original Price</label>
                                <input type="text" name="original_price" id="" class="form-control"
                                    placeholder="Enter Original Price">
                                @error('original_price')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="selling_price">Selling Price</label>
                                <input type="text" name="selling_price" id="" class="form-control"
                                    placeholder="Enter Selling Price">
                                @error('selling_price')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="" class="form-control"
                                    placeholder="Enter quantity">
                                @error('quantity')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                                Checked=Hidden , Unchecked=Visible
                                @error('status')
                                {{ $message }}
                                @enderror
                                <div class="mb-3">
                                    <label for="trending">Status</label>
                                    <input type="checkbox" name="trending">
                                    Checked=Trending , Unchecked=not Trending
                                    @error('trending')
                                    {{ $message }}
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane border  card shadow p-3 fade" id="image" role="tabpanel"
                            aria-labelledby="image-tab">
                            <div class="my-3">
                                <label for="image">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                                @error('image')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane border  card shadow p-3 fade" id="color" role="tabpanel"
                            aria-labelledby="color-tab">
                            <label for="color">Select Colora and Quantity</label>
                            <div class="row">
                                @isset($colors)
                                @forelse ($colors as $color )
                                <div class="col-md-2">
                                    <div class="border p-2 m-2 shadow">
                                        Color:<input class="mb-3 form-check-input " type="checkbox" name="colors[]" value="{{$color->id}}"
                                            style="width: 20px; height:20px;"
                                            >{{$color->name}} <br>
                                        <label for="colorquantity">Quantity:</label>
                                         <input type="number" name="colorquantity[]"
                                            style="width:80px; height:20px;border:1px solid" class="form-control">
                                    </div>
                                </div>
                                @empty
                                No Color Found
                                @endforelse
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="my-3 py-2">
                        <button type="submit" class="text-light btn btn-primary float-end">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection