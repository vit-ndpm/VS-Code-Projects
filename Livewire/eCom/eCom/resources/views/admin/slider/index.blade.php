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
                <h3>Slider</h3>
                <a href="{{ url('admin/slider/create') }}" class="btn btn-success text-light float-end">Add Slider</a>
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
                                    Image
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>

                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>

                                    <img src="{{asset($slider->image)}}" alt="slider Image" style="width: 100px;height:100px;">
                                </td>
                                <td>{{ $slider->status==true ?'hidden':'visible';}}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>

                                <td>
                                    <a href="{{ url('admin/slider/' . $slider->id.'/edit') }}"
                                        class="btn btn-primary btn-sm text-light">Edit</a>
                                    <a href="{{ url('admin/slider/' . $slider->id.'/delete') }}"
                                        onclick="return confirm('Are you Sure to Delete this slider ?')"
                                        class="btn btn-danger btn-sm text-light">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <td colspan="5">
                                No sliders available
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