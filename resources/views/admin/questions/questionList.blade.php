<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question List') }}
        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8 overflow-auto" >
            <div class="bg-white  shadow-sm sm:rounded-lg ">
                {{-- Status message Section  --}}
                @if (Session::has('status'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! Session::get('status') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="p-6 bg-white border-b  border-gray-200">
                    {{-- Add New Paper Link  --}}
                    <a class="btn btn-success my-2" href="{{ url('addQuestion') }}/{{ $paper_id }}"> Add New
                        Question</a>
                    <a class="btn btn-primary my-2" href="{{ url('showw') }}"> Import Data from Excel Sheet</a>
                    <a class="btn btn-warning my-2" href="{{ url('#') }}"> Export Data in Excel Sheet</a>
                    {{-- show Paper table  --}}
                    @isset($questions)
                    <div class="overflow:hidden">
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Paper Name </th>
                                    <th>Question No</th>
                                    <th>Question?</th>
                                    <th>Option-1</th>
                                    <th>Option-2</th>
                                    <th>Option-3</th>
                                    <th>Option-4</th>
                                    <th>Answer</th>
                                    <th>Description</th>
                                    <th>Subject</th>
                                    <th>Topic</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->paper_id }}</td>
                                        <td>{{ $question->question_no }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->option1 }}</td>
                                        <td>{{ $question->option2 }}</td>
                                        <td>{{ $question->option3 }}</td>
                                        <td>{{ $question->option4 }}</td>
                                        <td>{{ $question->correct_option }}</td>
                                        <td>{{ $question->description }}</td>
                                        <td>{{ $question->subject }}</td>
                                        <td>{{ $question->topic }}</td>
                                        <td>
                                            <a href="{{ url('editQuestion') }}/{{ $question->id }}">
                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('deleteQuestion') }}/{{ $question->id }}">
                                                <i class="fa-solid fa-trash text-danger"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
