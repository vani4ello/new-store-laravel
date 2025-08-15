<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'New-Store') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'] )
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-200">
    <div class="min-h-screen">
        <!-- Navigation Menu -->
        <nav class="bg-gray-800/50 backdrop-blur-lg sticky top-0 z-50 border-b border-gray-700/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="text-white font-bold text-xl">
                                NEW-STORE
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('products.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Каталог</a>
                                <!-- Add other nav links here -->
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('cart.index') }}" class="text-gray-300 hover:text-white relative p-2 rounded-full hover:bg-gray-700">
                            <span class="sr-only">View cart</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <livewire:cart-counter />
                        </a>

                        @guest
                            <a href="{{ route('auth') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Вхід</a>
                        @endguest

                        @auth
                            <a href="{{ route('account.orders') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Акаунт</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Flash Messages -->
    @if (session('status'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition:enter="transform ease-out duration-300 transition"
             x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
             x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed bottom-0 right-0 p-4 m-4 bg-green-600/80 backdrop-blur-sm text-white rounded-lg shadow-lg"
             role="alert">
            <p>
                @switch(session('status'))
                    @case('profile-updated')
                        Профіль успішно оновлено!
                        @break
                    @case('password-updated')
                        Пароль успішно оновлено!
                        @break
                    @case('account-deleted')
                        Ваш акаунт було видалено.
                        @break
                    @default
                        {{ session('status') }}
                @endswitch
            </p>
        </div>
    @endif


    @livewireScripts
</body>
</html>
