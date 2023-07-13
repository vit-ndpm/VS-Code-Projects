<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('editTopic') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$topics->subject_id}}">
                        <!-- subject ID -->
                        <div>
                            <x-label for="subject_id" :value="__('Subject Name')" />
                            <select name="subject_id" id="subject_id" class="block mt-1 w-full">
                                <option value="" disabled selected >Select Subject</option>
                                @isset($subjects)
                                    @foreach ($subjects as $subject)
                                   
                                        <option value="{{ $subject->id }}" {{($subject->id==$topics->subject_id)? "selected":""}} >
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach

                                @endisset
                            </select>
                        </div>
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Topic Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" value="{{$topics->name}}" required autofocus />
                        </div>


                        <div class="flex items-center justify-center  mt-4">


                            <x-button class="ml-4">
                                {{ __('Add Topic') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
