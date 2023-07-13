<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __(' Admin Dashboard (District e-Governance Society Narmadapuram MP)') }}
        </h2>
    </x-slot>
    <div class="container-fluide vh-100" style="background-image: url('img/background.png')">
        <div class="row py-3 mx-3">

            {{-- main content  --}}
            <div class="col-10 ">
                <div class="row py-3 mx-1 bg-white text-dark card">
                    <div class="col">
                        main content
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
