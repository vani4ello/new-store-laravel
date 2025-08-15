@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar Navigation -->
            <aside class="md:col-span-1">
                <nav class="space-y-1">
                    <a href="{{ route('account.orders') }}"
                       class="{{ request()->routeIs('account.orders*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800/50 hover:text-white' }} group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors">
                        <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        <span class="truncate">Мої Замовлення</span>
                    </a>
                    <a href="{{ route('account.profile' ) }}"
                       class="{{ request()->routeIs('account.profile') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800/50 hover:text-white' }} group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors">
                        <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        <span class="truncate">Профіль</span>
                    </a>
                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout' ) }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-400 hover:bg-gray-800/50 hover:text-white group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors">
                            <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            <span class="truncate">Вийти</span>
                        </button>
                    </form>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="md:col-span-3">
                @yield('account_content')
            </main>
        </div>
    </div>
@endsection
