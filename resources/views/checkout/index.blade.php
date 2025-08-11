@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Створення акаунту</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_name">
                Ім'я
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('customer_name') border-red-500 @enderror" 
                   id="customer_name" name="customer_name" type="text" placeholder="Іван" value="{{ old('customer_name') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('customer_email') border-red-500 @enderror" 
                   id="customer_email" name="customer_email" type="email" placeholder="example@mail.com" value="{{ old('customer_email') }}" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Пароль
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" 
                       id="password" name="password" type="password" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Повторіть пароль
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="password_confirmation" name="password_confirmation" type="password" required>
            </div>
        </div>

        <hr class="my-6">

        {{-- Нові чекбокси з правильною логікою --}}
        <div class="mb-4">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="terms" value="1" class="form-checkbox @error('terms') border-red-500 @enderror"
                       {{-- Зберігаємо вибір, якщо користувач поставив галочку --}}
                       @if(old('terms')) checked @endif>
                <span class="ml-2 text-sm text-gray-700">Я погоджуюсь з <a href="/terms" target="_blank" class="text-indigo-600 hover:underline">правилами сайту</a></span>
            </label>
            @error('terms')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="subscribe" value="1" class="form-checkbox"
                       {{-- За замовчуванням відмічено, але зберігаємо вибір користувача при помилці --}}
                       @if(old('subscribe', true)) checked @endif>
                <span class="ml-2 text-sm text-gray-700">Я хочу отримувати новини, промокоди та спеціальні пропозиції на свою пошту</span>
            </label>
        </div>
        
        <div class="flex items-center justify-between mt-8">
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Створити акаунт і продовжити
            </button>
        </div>
        <div class="text-center mt-4">
             <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('cart.index') }}">
                Повернутися до кошика
            </a>
        </div>
    </form>
</div>
@endsection