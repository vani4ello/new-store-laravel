@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-2xl text-center">
    
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        <svg class="mx-auto h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-3xl font-bold mt-4 mb-2">Дякуємо за ваше замовлення!</h1>
        <p class="text-gray-600 mb-6">Ваше замовлення <span class="font-semibold">№{{ $order->id }}</span> прийнято в обробку. Ви можете переглянути деталі в особистому кабінеті.</p>
        
        <div class="flex items-center justify-center space-x-4 mt-8">
            <a href="{{ route('home') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                На головну
            </a>
            <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                В особистий кабінет
            </a>
        </div>
    </div>
</div>
@endsection