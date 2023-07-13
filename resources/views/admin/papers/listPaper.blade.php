<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paper List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Add New Paper Link  --}}
                    <a class="btn btn-success my-2" href="{{ url('addPaper') }}"> Add New Paper</a>
                    <a class="btn btn-primary my-2" href="{{ url('showw') }}"> Import Data from Excel Sheet</a>
                    <a class="btn btn-warning my-2" href="{{ url('#') }}"> Export Data in Excel Sheet</a>
                    {{-- show Paper table  --}}
                    @isset($papers)
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Paper Name </th>
                                    <th>Type</th>
                                    <th>Available?</th>
                                    <th>Add Questions</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($papers as $paper)
                                    <tr>
                                        <td>{{ $paper->id }}</td>
                                        <td>{{ $paper->paper_name }}</td>
                                        <td>
                                            {{ $paper->paper_type ? 'Free' : 'Paid' }}
                                        </td>
                                        <td>
                                            {{ $paper->available ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            <a  class="btn btn-success" href="{{ url('listQuestion') }}/{{ $paper->id }}">Add Questions</a>


                                        </td>
                                        <td>
                                            <a href="{{ url('editPaper') }}/{{ $paper->id }}"><i
                                                    class="fa-solid fa-pen-to-square text-primary"></i></a>


                                        </td>
                                        <td>
                                            <a href="{{ url('deletePaper') }}/{{ $paper->id }}"><i
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
