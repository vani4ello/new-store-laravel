@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Ваш кошик</h1>

    @if($cartContent->isNotEmpty())
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Товар</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ціна</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Кількість</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Всього</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartContent as $item)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $item['listing']->product->name }}</p>
                                <p class="text-gray-600 whitespace-no-wrap text-xs">Пропозиція #{{ $item['listing']->id }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['listing']->price }} грн</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{-- Форма для оновлення кількості --}}
                                <form action="{{ route('cart.update') }}" method="POST" class="flex justify-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="listing_id" value="{{ $item['listing']->id }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 text-center border-gray-300 rounded">
                                    <button type="submit" class="ml-2 p-1 text-gray-500 hover:text-blue-600" title="Оновити">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V4a1 1 0 011-1zm10.707 9.293a1 1 0 01.082 1.323A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h4a1 1 0 011 1v4a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 111.885-.666A5.002 5.002 0 008.001 13H5a1 1 0 110-2h2.293a1 1 0 01.707.293z" clip-rule="evenodd" /></svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['subtotal'] }} грн</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                {{-- Форма для видалення товару --}}
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="listing_id" value="{{ $item['listing']->id }}">
                                    <button type="submit" class="text-gray-500 hover:text-red-600" title="Видалити">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" /></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-5 py-5 bg-white border-t flex justify-end items-center">
                <span class="text-gray-600 text-sm font-semibold">Загальна сума:</span>
                <span class="text-gray-900 text-xl font-bold ml-4">{{ $totalPrice }} грн</span>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700">
                Оформити замовлення
            </a>
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-xl text-gray-700">Ваш кошик порожній.</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Перейти до каталогу
            </a>
        </div>
    @endif
</div>
@endsection