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
                    <h3>Category</h3>
                    <a href="{{ url('admin/category/create') }}" class="btn btn-success float-end">Add Category</a>
                </div>
                <div class="card-body">
                    @livewire('admin.category.category-componet')
                </div>
            </div>
        </div>
    </div>
@endsection
