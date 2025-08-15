@extends('layouts.app')

@section('title', 'Каталог товарів')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-neon mb-6">Каталог товарів</h1>

    @if($products->isNotEmpty())
        {{-- Сітка для карток товарів --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                {{-- Викликаємо наш новий, виправлений компонент для кожного товару --}}
                <x-product-card :product="$product" />
            @endforeach
        </div>

        {{-- Пагінація (стилізована під темну тему) --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @else
        <p class="text-gray-400">Наразі товарів немає.</p>
    @endif
</div>
@endsection