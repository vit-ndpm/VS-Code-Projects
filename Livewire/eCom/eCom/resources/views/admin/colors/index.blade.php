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
                <div class="shadow p-1">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Color Name
                                </th>
                                <th>
                                    Color Code
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
                            @forelse ($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->code }}</td>
                                <td>{{ $color->status==true ?'hidden':'visible';}}</td>
                                <td>
                                    <a href="{{ url('admin/color/' . $color->id.'/edit') }}" class="btn btn-primary btn-sm text-light">Edit</a>
                                    <a href="{{ url('admin/color/' . $color->id.'/delete') }}"
                                        onclick="return confirm('Are you Sure to Delete this Color ?')"
                                        class="btn btn-danger btn-sm text-light">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <td colspan="5">
                                No Colors available
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