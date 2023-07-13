<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Topic List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Add New Subject Link  --}}
                    <a class="btn btn-success my-2" href="{{ url('addTopic') }}"> Add New Topic</a>
                    <a class="btn btn-primary my-2" href="{{ url('showw') }}"> Import Data from Excel Sheet</a>
                    <a class="btn btn-warning my-2" href="{{ url('#') }}"> Export Data in Excel Sheet</a>


                    {{-- show Subject table  --}}
                    @isset($topics)
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Topic Name </th>
                                    <th>Subject Id </th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $topic->id }}</td>
                                        <td>{{ $topic->name }}</td>
                                        <td>{{ $topic->subject_id }}</td>

                                        <td>
                                            <a href="{{ url('editTopic') }}/{{ $topic->id }}"><i
                                                    class="fa-solid fa-pen-to-square text-primary"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('deleteTopic') }}/{{ $topic->id }}"><i
                                                    class="fa-solid fa-trash text-danger"></i></a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
