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
                <h3>Colors</h3>
                <a href="{{ url('admin/color/create') }}" class="btn btn-success text-light float-end">Add Color</a>
            </div>
            <div class="card-body">
                <form action="{{url('admin/color/create')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Color Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="code">Color Code</label>
                        <input type="text" name="code" id="code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label> <br>
                        <input type="checkbox" name="status" style="width: 25px;height:25px;"> checked=Hidden, UnChecked=visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark text-light">Save Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection