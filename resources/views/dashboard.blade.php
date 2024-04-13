<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Heyya User! , You're logged in! ") }} <br> {{ __("Wanna get started with our shopping products. ") }} <br> <br> {{ __("Then , Click on the Footwear or Clothing to see our Newly Launched Products.") }} 
                </div>
                
            </div>
        </div>
    </div>
    {{-- @include('products.index') --}}
</x-app-layout>
