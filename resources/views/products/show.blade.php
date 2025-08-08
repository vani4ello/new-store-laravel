<!-- resources/views/products/show.blade.php -->

{{-- Припустимо, у вас є базовий layout --}}
@extends('layouts.app') 

@section('content')
<div class="container mx-auto p-4">

    {{-- Інформація про "Вікі-картку" товару --}}
    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
    <p class="text-gray-600 mb-4">Бренд: {{ $product->brand?->name }} | Категорія: {{ $product->category?->name }}</p>
    
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
                        {{-- В майбутньому тут буде назва продавця --}}
                        <p class="font-semibold">Пропозиція #{{ $listing->id }}</p> 
                        <p>Тип: {{ $listing->type }}</p>  {{-- Припускаючи, що у вас є Enum для типу --}}
                    </div>
                    <div>
                        <p class="text-xl font-bold">{{ $listing->price }} грн</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Додати в кошик
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Наразі немає пропозицій для цього товару.</p>
    @endif

</div>
@endsection