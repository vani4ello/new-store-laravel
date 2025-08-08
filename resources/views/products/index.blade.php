@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Product Catalog</h1>

    @if($products->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                {{-- Початок посилання, яке веде на сторінку товару --}}
                <a href="{{ route('products.show', $product) }}" class="block border rounded-lg p-4 bg-white shadow hover:shadow-lg transition-shadow duration-200">
                    <h2 class="text-lg font-bold mb-2 truncate">{{ $product->name }}</h2>
                    
                    <p class="text-sm text-gray-600 mb-2">Brand: {{ $product->brand?->name }}</p>
                    
                    {{-- Ми не знаємо точну ціну, оскільки це просто Product,
                         але можемо показати ціну першої пропозиції для орієнтиру --}}
                    @if($product->listings->isNotEmpty())
                        <p class="text-md font-semibold text-gray-800">
                            Ціна від: {{ $product->listings->first()->price }} грн
                        </p>
                    @else
                         <p class="text-sm text-gray-500">Немає пропозицій</p>
                    @endif
                </a>
                {{-- Кінець посилання --}}
            @endforeach
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @else
        <p>No products found.</p>
    @endif
</div>
@endsection