<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Status message Section  --}}
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! Session::get('status') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @isset($question)
                      
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('updateQuestion') }}">
                            @csrf
                            <label for="question-id">Question ID:</label><input type="text" readonly name="question_id"
                                value="{{ $question->id }}">
                            <!-- Paper ID Read only -->
                            <label for="paper_id">Paper ID:</label> <input type="text" readonly name="paper_id"
                                value="{{ $question->paper_id }}">
                            <!-- Question Number -->
                            <div>
                                <x-label for="question_no" :value="__('Question Number')" />
                                <input type="number" id="question_no" class="block mt-1 w-full" name="question_no" required
                                    autofocus value="{{ $question->question_no }}">
                            </div>

                            <!-- Question  -->
                            <div>
                                <x-label for="question" :value="__('Question')" />
                                <input type="text" id="question" class="block mt-1 w-full" name="question" required
                                    autofocus value="{{ $question->question }}">
                            </div>
                            <!-- option 1  -->
                            <div>
                                <x-label for="option1" :value="__('Option-1')" />
                                <input type="text" id="option1" class="block mt-1 w-full" name="option1" required
                                    autofocus value="{{ $question->option1 }}">
                            </div> <!-- option 2  -->
                            <div>
                                <x-label for="option2" :value="__('Option2')" />
                                <input type="text" id="option2" class="block mt-1 w-full" name="option2" required
                                    autofocus value="{{ $question->option2 }}">
                            </div> <!-- option 3  -->
                            <div>
                                <x-label for="option3" :value="__('Option-3')" />
                                <input type="text" id="option3" class="block mt-1 w-full" name="option3" required
                                    autofocus value="{{ $question->option3 }}">
                            </div> <!-- option 4  -->
                            <div>
                                <x-label for="option4" :value="__('Option-4 ')" />
                                <input type="text" id="option4" class="block mt-1 w-full" name="option4" required
                                    autofocus value="{{ $question->option4 }}">
                            </div>

                            <!-- correct Option -->
                            <div>
                                <x-label for="correct_option" :value="__('Choose Correct Option')" />
                                <select class="custom-select" name="correct_option" id="correct_option">
                                    <option selected>Select Correct Option</option>
                                    <option value="1">Option-1</option>
                                    <option value="2">Option-2</option>
                                    <option value="3">Option-3</option>
                                    <option value="4">Option-4</option>
                                </select>
                            </div>
                            {{-- Answer Description  --}}
                            <div>
                                <x-label for="description" :value="__('Answer Description ')" />
                                <input type="text" id="description" class="block mt-1 w-full" name="description" required
                                    autofocus value="{{ $question->description }}">
                            </div>
                            {{-- select Subject  --}}
                            <div>
                                <x-label for="subject_id" :value="__('Choose Subject')" />
                                <select class="custom-select" name="subject_id" id="subject_id">
                                    <option selected>Select Subject</option>
                                    @isset($subjects)
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $subject->id == $question->subject_id ? 'selected' : '' }}>
                                                {{ $subject->id }}-{{ $subject->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            {{-- select Topic  --}}
                            <div>
                                <x-label for="topic_id" :value="__('Choose Topic')" />
                                <select class="custom-select" name="topic_id" id="topic_id">
                                    <option selected>Select Topic</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-center  mt-4">
                                <x-button class="ml-4">
                                    {{ __('Update Question') }}
                                </x-button>
                            </div>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <!-- Script to use ajax() method to
        add text content -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#subject_id").change(function() {
                var subject = this.value;
                // alert("selected:" + subject)
                $.ajax({
                    type: 'GET',
                    url: "{{ url('getTopics') }}/" + subject,
                    success: function(topics) {
                        $("#topic_id").empty();
                        $.each(topics, function(key, value) {
                            $("#topic_id").append('<option value="' + value.id + '">' +
                                value.id + "-" + value.name + '</option>');
                            console.log(value.name);
                        });
                    }
                });
            });
        });
    </script>
</x-app-layout>
