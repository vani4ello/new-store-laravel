@extends('layouts.account')
@section('account_content')
    <h1 class="text-2xl font-bold text-white mb-6">Мої Замовлення</h1>
    <div class="bg-gray-800/50 shadow sm:rounded-lg">
        <div class="space-y-4 p-4">
            @forelse($orders as $order)
                <div class="bg-gray-900/70 p-4 rounded-lg">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                        <div>
                            <span class="font-bold text-gray-400">Номер</span>
                            <a href="{{ route('account.orders.show', $order) }}" class="block text-indigo-400 hover:text-indigo-300 font-mono">{{ $order->id }}</a>
                        </div>
                        <div>
                            <span class="font-bold text-gray-400">Сума</span>
                            <p class="text-white font-mono">{{ $order->total_amount / 100 }} {{ $order->currency }}</p>
                        </div>
                        <div>
                            <span class="font-bold text-gray-400">Статус</span>
                            <p class="text-white"><span class="px-2 py-1 text-xs rounded-full bg-green-800 text-green-200">{{ $order->status->name }}</span></p>
                        </div>
                        <div>
                            <span class="font-bold text-gray-400">Дата</span>
                            <p class="text-white">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-800">
                        <h4 class="text-xs text-gray-400 mb-2">Товари:</h4>
                        <ul class="space-y-1">
                            @foreach($order->items as $item)
                                <li class="text-sm text-gray-300">- {{ $item->listing->product->title }} (x{{ $item->quantity }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 p-4">У вас ще немає замовлень.</p>
            @endforelse
        </div>
    </div>
@endsection
