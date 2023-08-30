@extends('layouts.app')
@section('title','Product')
@section('content')

<livewire:frontend.products.view :product="$product" :category="$category">
@endsection