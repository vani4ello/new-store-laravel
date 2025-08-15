@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        {{-- Ліва колонка: Картинка --}}
        <div class="md:col-span-1">
            <div class="bg-[#0f0f13] rounded-lg p-4 border border-gray-800 flex items-center justify-center h-80">
                {{-- Тимчасова іконка-заглушка --}}
                <svg class="w-24 h-24 text-cyan" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1.586-1.586a2 2 0 010-2.828L14 8M3 16a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H3z"></path></svg>
            </div>
        </div>

        {{-- Права колонка: Інформація та пропозиції --}}
        <div class="md:col-span-2">
            <h1 class="text-3xl lg:text-4xl font-bold text-neon">{{ $product->name }}</h1>
            
            <div class="text-gray-400 mt-2 mb-4">
                <span>Бренд: {{ $product->brand?->name }}</span>
                @if($product->categories->isNotEmpty())
                    <span class="mx-2">|</span>
                    <span>
                        Категорії:
                        @foreach($product->categories as $category)
                            {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </span>
                @endif
            </div>

            <div class="prose prose-invert max-w-full mb-8 text-gray-300">
                {!! $product->description !!}
            </div>

            <hr class="border-gray-800">

            <h2 class="text-2xl font-bold mt-6 mb-4 text-white">Пропозиції:</h2>

            @if($product->listings->isNotEmpty())
                <div class="space-y-4">
                    @foreach($product->listings as $listing)
                        <div class="bg-[#0f0f13] border border-gray-800 p-4 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-white">Пропозиція #{{ $listing->id }}</p>
                                <p class="text-sm text-gray-500">
                                    Тип: {{ $listing->type->value }} | 
                                    Статус: <span class="{{ $listing->is_active ? 'text-green-500' : 'text-red-500' }}">{{ $listing->is_active ? 'Активна' : 'Неактивна' }}</span>
                                    @if($listing->type === \Src\Catalog\Enums\ListingType::LIMITED)
                                        | Кількість: {{ $listing->quantity }}
                                    @endif
                                </p>
                            </div>
                            
                            <div class="w-1/3 text-right">
                                <p class="text-2xl font-bold mb-2 text-neon">{{ number_format($listing->price / 100, 2, ',', ' ') }} грн</p>
                                
                                @if($listing->type === \Src\Catalog\Enums\ListingType::UNLIMITED || $listing->quantity > 0)
                                    <form action="{{ route('cart.add') }}" method="POST" class="flex items-center justify-end">
                                        @csrf
                                        <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                        <input type="number" name="quantity" value="1" min="1" class="w-20 rounded bg-gray-900 border-gray-700 text-center focus-neon">
                                        <button type="submit" class="ml-2 bg-neon text-bg font-bold px-4 py-2 rounded hover:opacity-80 transition-opacity">
                                            Додати
                                        </button>
                                    </form>
                                @else
                                    <div class="flex items-center justify-end">
                                        <input type="number" value="1" min="1" class="w-20 rounded bg-gray-800 border-gray-700 text-center" disabled>
                                        <button class="ml-2 bg-gray-600 text-gray-400 font-bold px-4 py-2 rounded cursor-not-allowed" disabled>
                                            Немає
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Наразі немає пропозицій для цього товару.</p>
            @endif
        </div>
    </div>
</div>
@endsection