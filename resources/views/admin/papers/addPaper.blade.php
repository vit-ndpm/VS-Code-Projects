<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Paper') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('addPaper') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="paper_name" :value="__('Paper Name')" />

                            <x-input id="paper_name" class="block mt-1 w-full" type="text" name="paper_name"
                                :value="old('paper_name')" required autofocus />
                        </div>

                        <!-- Type -->
                        <div>
                            <x-label for="paper_type" :value="__('Paper Type')" />                           
                            <input type="radio" id="paper_type" name="paper_type" value="1">
                            <label for="free">Free</label>
                            <input type="radio" id="paper_type" name="paper_type" value="0">
                            <label for="paper_type">Paid</label>
                        </div>
                        <!-- Type -->
                        <div>
                            <x-label for="available" :value="__('is Available for Publication')" />                           
                            <input type="radio" id="available" name="available" value="1">
                            <label for="yes">Yes</label>
                            <input type="radio" id="available" name="available" value="0">
                            <label for="available">No</label><br>
                        </div>

                        <div class="flex items-center justify-center  mt-4">


                            <x-button class="ml-4">
                                {{ __('Add Paper') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
