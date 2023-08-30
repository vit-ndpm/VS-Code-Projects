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
                <h3>Sliders</h3>
                <a href="{{ url('admin/slider/') }}" class="btn btn-success text-light float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{url('admin/slider/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label> <br>
                        <input type="checkbox" name="status" style="width: 25px;height:25px;"> checked=Hidden,
                        UnChecked=visible
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label> <br>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark text-light">Save Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection