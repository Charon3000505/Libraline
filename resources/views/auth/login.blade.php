<x-guest-layout>
    {{-- Header --}}
    <div class="text-center mb-4">
        <h1 class="text-base font-bold text-gray-900">Selamat Datang!</h1>
        <p class="text-[10px] text-gray-500">Masuk ke akun Anda</p>
    </div>

    <x-auth-session-status class="mb-2" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-3">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-[10px] font-medium text-gray-700 mb-1">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="block w-full pl-8 pr-2.5 py-1.5 text-xs border border-gray-300 rounded-lg placeholder-gray-400 
                           focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="nama@email.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px]" />
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-[10px] font-medium text-gray-700 mb-1">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full pl-8 pr-2.5 py-1.5 text-xs border border-gray-300 rounded-lg placeholder-gray-400 
                           focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px]" />
        </div>

        {{-- Remember & Forgot --}}
        <div class="flex items-center justify-between text-[10px]">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-3 h-3 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                <span class="ml-1 text-gray-600">Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="font-medium text-purple-600 hover:text-purple-700">Lupa password?</a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full flex items-center justify-center gap-1.5 px-3 py-2 
                   bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700
                   text-white text-xs font-semibold rounded-lg shadow-md
                   transition-all focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-1">
            Masuk
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
        </button>
    </form>

    {{-- Divider --}}
    <div class="relative my-3">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-2 bg-white text-[10px] text-gray-500">atau</span>
        </div>
    </div>

    {{-- Register Link --}}
    <p class="text-center text-[10px] text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-purple-600 hover:text-purple-700">Daftar sekarang</a>
    </p>
</x-guest-layout>
