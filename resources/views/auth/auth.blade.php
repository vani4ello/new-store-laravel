@extends('layouts.app')

@section('content')
<div x-data="{ tab: 'login' }" class="max-w-md mx-auto my-16 p-8 rounded-lg bg-bg shadow-neon-md">

    <!-- Перемикач Вхід / Реєстрація -->
    <div class="mb-8 flex justify-center border-b border-gray-800">
        <button @click="tab = 'login'"
                :class="{ 'border-neon text-neon': tab === 'login', 'border-transparent text-gray-500': tab !== 'login' }"
                class="flex-1 py-3 text-center border-b-2 font-semibold transition-colors duration-300 focus:outline-none">
            Вхід
        </button>
        <button @click="tab = 'register'"
                :class="{ 'border-neon text-neon': tab === 'register', 'border-transparent text-gray-500': tab !== 'register' }"
                class="flex-1 py-3 text-center border-b-2 font-semibold transition-colors duration-300 focus:outline-none">
            Реєстрація
        </button>
    </div>

    <!-- Форма Входу -->
    <div x-show="tab === 'login'" x-transition.opacity>
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <!-- Email -->
            <div>
                <label for="login_email" class="text-gray-400">Email</label>
                <input type="email" name="email" id="login_email" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Пароль -->
            <div>
                <label for="login_password" class="text-gray-400">Пароль</label>
                <input type="password" name="password" id="login_password" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Кнопка -->
            <button type="submit"
                    class="w-full py-3 font-bold text-black bg-neon rounded-md hover:bg-white transition-all duration-300 shadow-lg shadow-neon/20 hover:shadow-cyan/30">
                Увійти
            </button>
        </form>
    </div>

    <!-- Форма Реєстрації -->
    <div x-show="tab === 'register'" x-transition.opacity style="display: none;">
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <!-- Ім'я -->
            <div>
                <label for="name" class="text-gray-400">Ім'я</label>
                <input type="text" name="name" id="name" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Email -->
            <div>
                <label for="register_email" class="text-gray-400">Email</label>
                <input type="email" name="email" id="register_email" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Пароль -->
            <div>
                <label for="register_password" class="text-gray-400">Пароль</label>
                <input type="password" name="password" id="register_password" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Підтвердження пароля -->
            <div>
                <label for="password_confirmation" class="text-gray-400">Підтвердження пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-2 block w-full bg-gray-900/80 border-gray-700 rounded-md text-white focus:ring-2 focus:ring-neon focus:border-neon transition">
            </div>
            <!-- Кнопка -->
            <button type="submit"
                    class="w-full py-3 font-bold text-black bg-neon rounded-md hover:bg-white transition-all duration-300 shadow-lg shadow-neon/20 hover:shadow-cyan/30">
                Створити акаунт
            </button>
        </form>
    </div>
</div>
@endsection
