@extends('layouts.app')
@section('title','Product')
@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Our Products</h4>
                    </div>
                    <livewire:frontend.products.index :category=$category :brands=$brands>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection