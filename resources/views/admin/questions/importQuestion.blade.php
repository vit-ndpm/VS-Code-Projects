<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
 {{-- Status message Section  --}}
 @if (Session::has('status'))
 <div class="alert alert-success">
     <ul>
         <li>{!! Session::get('status') !!}</li>
     </ul>
 </div>
@endif

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" enctype="multipart/form-data" action="{{ route('importQuestion') }}">
                        @csrf
                        <!-- Name -->
                        <div>

                            <x-label for="importExcel" :value="__('Upload Excel File')"  />

                            <x-input id="importExcel" class="block mt-1 w-full" type="file" name="importExcel"
                                :value="old('importExcel')" required autofocus  />

                            
                        </div>


                        <div class="flex items-center justify-center  mt-4">
                            <x-button class="ml-4">
                                {{ __('Import Questions') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
