@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                    <a href="{{ url('admin/category') }}" class="btn btn-success float-end text-light">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="{{ $category->name }}"
                                    class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="slug">Slug:</label>
                                <input type="text" name="slug" id="slug" value="{{ $category->slug }}"
                                    class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="image">image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <img src="{{ asset( $category->image) }}" width="60px" height="60px"
                                    alt="">

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="meta_title">Meta Title: </label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $category->meta_title }}"
                                    class="form-control">
                                @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="meta_description">Meta Description:</label>
                                <textarea name="meta_description" id="meta_description" rows="3" class="form-control">
                                    {{ $category->meta_description }}
                                </textarea>
                                @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="meta_keywords">Meta Keywords:</label>
                                <input type="text" name="meta_keywords" id="meta_keywords"
                                    value="{{ $category->meta_keywords }}" class="form-control">
                                @error('meta_keywords')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status">Mark as Hidden Category:</label>
                                <input type="checkbox" name="status" id="status">
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <button type="submit" class="btn btn-primary float-end text-light"> Update </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
