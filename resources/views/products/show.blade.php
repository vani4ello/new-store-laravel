@extends('layouts.app') 

@section('content')
<div class="container mx-auto p-4">

    {{-- Інформація про "Вікі-картку" товару --}}
    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
    
    {{-- Виводимо Бренд та Категорії --}}
    <div class="text-gray-600 mb-4">
        <span>Бренд: {{ $product->brand?->name }}</span>
        
        @if($product->categories->isNotEmpty())
            <span class="mx-2">|</span>
            <span>
                Категорії:
                @foreach($product->categories as $category)
                    {{-- Виводимо назву категорії і додаємо кому, якщо це не остання категорія в списку --}}
                    {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                @endforeach
            </span>
        @endif
    </div>
    
    <div class="prose max-w-full mb-8">
        {!! $product->description !!}
    </div>

    <hr>

    {{-- Список пропозицій (Listings) для цього товару --}}
    <h2 class="text-2xl font-bold mt-6 mb-4">Пропозиції:</h2>

    @if($product->listings->isNotEmpty())
        <div class="space-y-4">
            @foreach($product->listings as $listing)
                <div class="border p-4 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="font-semibold">Пропозиція #{{ $listing->id }}</p> 
                        <p class="text-sm text-gray-600">
                            Тип: {{ $listing->type->value }} | 
                            Статус: <span class="{{ $listing->is_active ? 'text-green-600 font-medium' : 'text-red-600 font-medium' }}">{{ $listing->is_active ? 'Активна' : 'Неактивна' }}</span>
                            
                            @if($listing->type === \Src\Catalog\Enums\ListingType::LIMITED)
                                | Кількість на складі: {{ $listing->quantity }}
                            @endif
                        </p>
                    </div>
                    <div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                            
                            <p class="text-xl font-bold mb-2">{{ $listing->price }} грн</p>
                            
                            <div class="flex items-center">
                                <input type="number" name="quantity" value="1" min="1" class="w-20 rounded border-gray-300 mr-2 text-center">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Додати
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Наразі немає пропозицій для цього товару.</p>
    @endif

</div>
@endsection