<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'New-Store') }}</title>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <header class="bg-white shadow">
        <div class="container mx-auto px-4">
            {{-- ================= ПОЧАТОК ЗМІН ================= --}}

            <div class="flex justify-between items-center py-4">
                {{-- Логотип / Назва магазину --}}
                <a href="{{ route('products.index') }}" class="text-xl font-bold text-gray-800">
                    New-Store
                </a>

                {{-- Навігація та Кошик --}}
                <div class="flex items-center space-x-6">
                    {{-- Тут можуть бути інші посилання, наприклад:
                    <a href="#" class="text-gray-600 hover:text-gray-800">Про нас</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Контакти</a>
                    --}}
                    
                    {{-- Іконка кошика з лічильником --}}
                    <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-gray-800">
                        {{-- SVG іконка кошика --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        
                        {{-- Червоний кружечок-лічильник --}}
                        @if (isset($cartTotalQuantity) && $cartTotalQuantity > 0)
                            <span class="absolute -top-2 -right-2 flex items-center justify-center h-5 w-5 bg-red-500 text-white text-xs rounded-full">
                                {{ $cartTotalQuantity }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
            
            {{-- ================= КІНЕЦЬ ЗМІН ================= --}}
        </div>
    </header>

    <main>
        {{-- Блок для відображення flash-повідомлень --}}
        @if(session('success'))
            <div class="container mx-auto mt-4 px-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        
        @if(session('info'))
            <div class="container mx-auto mt-4 px-4">
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('info') }}</span>
                </div>
            </div>
        @endif
        {{-- Кінець блоку --}}

        @yield('content')
    </main>

    <footer class="bg-white mt-8 py-4">
        <div class="container mx-auto text-center text-gray-500">
            &copy; {{ date('Y') }} New-Store. Всі права захищено.
        </div>
    </footer>

</body>
</html>