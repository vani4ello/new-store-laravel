@extends('layouts.account')
@section('account_content')
    <div class="mb-6">
        <a href="{{ route('account.orders') }}" class="text-indigo-400 hover:text-indigo-300">&larr; Назад до замовлень</a>
    </div>

    <div class="bg-gray-800/50 shadow sm:rounded-lg p-6">
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold text-white">Замовлення #{{ $order->id }}</h1>
                <p class="text-sm text-gray-400">Дата: {{ $order->created_at->format('d.m.Y H:i') }}</p>
            </div>
            <span class="px-3 py-1 text-sm rounded-full bg-green-800 text-green-200">{{ $order->status->name }}</span>
        </div>

        <div class="mt-8">
            <h2 class="text-lg font-semibold text-white mb-4">Склад замовлення</h2>
            <div class="divide-y divide-gray-700">
                @foreach($order->items as $item)
                    <div class="py-4 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-white">{{ $item->listing->product->title }}</p>
                            <p class="text-sm text-gray-400">Кількість: {{ $item->quantity }}</p>
                        </div>
                        <p class="text-white font-mono">{{ ($item->price_per_item / 100) * $item->quantity }} {{ $order->currency }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-700">
            <h2 class="text-lg font-semibold text-white mb-4">Придбані цифрові товари</h2>
            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="bg-gray-900/70 p-4 rounded-lg">
                        <h3 class="font-semibold text-indigo-400">{{ $item->listing->product->title }}</h3>
                        <div class="mt-2 text-sm text-gray-300 space-y-1 font-mono">
                            <p>Login account: some_login_data</p>
                            <p>Password account: some_password</p>
                            <p>Identifier: some_identifier_key</p>
                            <p class="mt-2 text-xs text-gray-500">To get a Steam code, go to the page...</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8 pt-8 border-t border-gray-700 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Деталі оплати</h2>
                <dl class="text-sm space-y-2">
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Метод</dt>
                        <dd class="text-white">Redsys (Приклад)</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Статус оплати</dt>
                        <dd class="text-green-400">Paid</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Сума</dt>
                        <dd class="text-white font-mono">{{ $order->total_amount / 100 }} {{ $order->currency }}</dd>
                    </div>
                </dl>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Інформація про клієнта</h2>
                <dl class="text-sm space-y-2">
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Ім'я</dt>
                        <dd class="text-white">{{ $order->customer_name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Email</dt>
                        <dd class="text-white">{{ $order->customer_email }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
