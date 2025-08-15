@extends('layouts.account')
@section('account_content')
    <div class="space-y-8">
        <!-- Update Profile Information -->
        <div class="bg-gray-800/50 shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-medium text-white">Інформація профілю</h2>
            <p class="mt-1 text-sm text-gray-400">Оновіть ім'я та email вашого акаунту.</p>
            @if (session('status' ) === 'profile-updated')
                <p class="mt-2 text-sm text-green-400">Профіль успішно оновлено.</p>
            @endif
            <form method="post" action="{{ route('account.profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Ім'я</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white" value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Зберегти</button>
                </div>
            </form>
        </div>

        <!-- Update Password -->
        <div class="bg-gray-800/50 shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-medium text-white">Оновлення пароля</h2>
            <p class="mt-1 text-sm text-gray-400">Переконайтеся, що ваш акаунт використовує довгий, випадковий пароль, щоб залишатися в безпеці.</p>
            @if (session('status') === 'password-updated')
                <p class="mt-2 text-sm text-green-400">Пароль успішно оновлено.</p>
            @endif
            <form method="post" action="{{ route('account.password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-300">Поточний пароль</label>
                    <input id="current_password" name="current_password" type="password" class="mt-1 block w-full bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white">
                    @error('current_password', 'updatePassword') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Новий пароль</label>
                    <input id="password" name="password" type="password" class="mt-1 block w-full bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white">
                    @error('password', 'updatePassword') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Підтвердіть пароль</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white">
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Зберегти</button>
                </div>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="bg-gray-800/50 shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-medium text-white">Видалення акаунту</h2>
            <p class="mt-1 text-sm text-gray-400">Після видалення вашого акаунту всі його ресурси та дані будуть видалені назавжди. Перед видаленням, будь ласка, завантажте будь-які дані або інформацію, яку ви хочете зберегти.</p>
            <form method="post" action="{{ route('account.profile.destroy') }}" class="mt-6" onsubmit="return confirm('Ви впевнені, що хочете видалити свій акаунт? Цю дію неможливо буде скасувати.');">
                @csrf
                @method('delete')
                <div>
                    <label for="password_delete" class="block text-sm font-medium text-gray-300">Пароль</label>
                    <input id="password_delete" name="password" type="password" class="mt-1 block w-1/2 bg-gray-900/50 border-gray-700 rounded-md shadow-sm text-white" placeholder="Пароль для підтвердження">
                    @error('password', 'userDeletion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Видалити акаунт</button>
                </div>
            </form>
        </div>
    </div>
@endsection
