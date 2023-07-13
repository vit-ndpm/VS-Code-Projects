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
                    <form method="POST" action="{{ route('editSubject') }}">
                        @csrf
                        <input type="hidden" name="id" value={{ $subjects->id }}>
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Subject Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" value="{{ $subjects->name }}" required autofocus />
                        </div>


                        <div class="flex items-center justify-center  mt-4">


                            <x-button class="ml-4">
                                {{ __('Update Subject') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
