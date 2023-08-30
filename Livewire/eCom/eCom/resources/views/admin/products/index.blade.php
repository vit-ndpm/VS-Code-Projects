@extends('layouts.admin')
@section('content')
    <div class="row">
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
                    <a href="{{ url('admin/product/create') }}" class="btn btn-success text-light float-end">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="shadow p-1">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        Brand
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                No Category
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->original_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->status == true ? 'visible' : 'hidden' }}</td>
                                        <td>
                                            <a href="{{ url('admin/product/' . $product->id.'/edit') }}"
                                                class="btn btn-primary btn-sm text-light">Edit</a>
                                            <a href="{{ url('admin/product/' . $product->id.'/delete') }}"
                                               onclick="return confirm('Are you Sure to Delete this Product ?')" class="btn btn-danger btn-sm text-light">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7">
                                        No Product available
                                    </td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
