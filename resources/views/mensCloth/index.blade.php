<!-- resources/views/footwear/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Footwear Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Buttons -->
            <div class="mb-4"> 
                {{-- <a href="{{ route('mensCloth.index', ['category' => 'all']) }}" class="btn btn-primary">All</a>
                 @foreach($categories as $category)
                     <a href="{{ route('mensCloth.index', ['category' => $category->name]) }}" class="btn btn-primary">{{ $category->name }}</a>
                 @endforeach --}}
                 <a href="{{ route('mensCloth.index') }}" class="btn btn-dark">All </a>
                 <a href="{{ route('mensCloth.shirts') }}" class="btn btn-dark">Shirts</a>
                 <a href="{{ route('mensCloth.hoodies') }}" class="btn btn-dark">Hoodies</a>
                 <a href="{{ route('mensCloth.jackets') }}" class="btn btn-dark">Jackets</a>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($footwearProducts as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                            <p class="text-gray-700">{{ $product->description }}</p>
                            <p class="text-gray-900 font-bold">${{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $footwearProducts->links() }}
        </div>
    </div>
</x-app-layout>
