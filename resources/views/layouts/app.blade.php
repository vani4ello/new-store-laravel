<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <header class="bg-white shadow">
        <div class="container mx-auto p-4">
            <a href="{{ route('products.index') }}" class="text-xl font-bold">
                New-Store
            </a>
        </div>
    </header>

    <main>
    {{-- Блок для відображення flash-повідомлень --}}
    @if(session('success'))
        <div class="container mx-auto mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
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