<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Affiliates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($fileExists)
                        @include('affiliates.partials.affiliates-by-distance')
                    @else
                    <p class="text-red-800">Please add source affiliates.txt file to storage/app/public directory.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
