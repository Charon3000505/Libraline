<x-guest-layout>
    <div class="w-full max-w-md mx-auto">
        {{-- Logo & Header --}}
        <div class="text-center mb-8">
            {{-- Library Icon --}}
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-2xl shadow-2xl shadow-[#D4AF37]/30 mb-5 transform hover:scale-105 transition-transform">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>

            <h1 class="text-2xl font-cinzel font-bold text-[#2D1B4E] tracking-wide mb-1">
                Bibliotheca Alexandrina
            </h1>
            <p class="text-sm text-[#5C4B3A] font-serif italic">
                ~ Enter the Sacred Library ~
            </p>

            {{-- Decorative line --}}
            <div class="flex items-center justify-center mt-4">
                <div class="w-12 h-px bg-gradient-to-r from-transparent to-[#D4AF37]/50"></div>
                <span class="mx-2 text-[#D4AF37] text-xs">⚜️</span>
                <div class="w-12 h-px bg-gradient-to-l from-transparent to-[#D4AF37]/50"></div>
            </div>
        </div>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Login Form Card --}}
        <div class="bg-white rounded-xl border-2 border-[#D4AF37]/20 shadow-xl p-6 sm:p-8 relative overflow-hidden">

            {{-- Corner Ornaments --}}
            <div class="absolute top-0 left-0 w-10 h-10 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-xl"></div>
            <div class="absolute top-0 right-0 w-10 h-10 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-xl"></div>
            <div class="absolute bottom-0 left-0 w-10 h-10 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-xl"></div>
            <div class="absolute bottom-0 right-0 w-10 h-10 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-xl"></div>

            <form method="POST" action="{{ route('login') }}" class="relative space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1.5">
                        Email Address
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors">
                            <svg class="w-4 h-4 text-[#C4A882] group-focus-within:text-[#D4AF37]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="block w-full pl-10 pr-4 py-2.5 text-sm font-serif bg-white border-2 border-[#D4AF37]/20 rounded-lg
                                   text-[#2D1B4E] placeholder-[#C4A882]
                                   focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20
                                   transition-all duration-300"
                            placeholder="scholar@alexandria.edu">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs" />
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1.5">
                        Password
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors">
                            <svg class="w-4 h-4 text-[#C4A882] group-focus-within:text-[#D4AF37]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full pl-10 pr-4 py-2.5 text-sm font-serif bg-white border-2 border-[#D4AF37]/20 rounded-lg
                                   text-[#2D1B4E] placeholder-[#C4A882]
                                   focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20
                                   transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs" />
                </div>

                {{-- Remember & Forgot --}}
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-[#D4AF37]/30 text-[#D4AF37] bg-[#D4AF37]/10
                                   focus:ring-[#D4AF37] focus:ring-offset-0 cursor-pointer
                                   transition-all">
                        <span class="ml-2 text-[#5C4B3A] font-serif group-hover:text-[#2D1B4E] transition-colors">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-serif text-[#D4AF37] hover:text-[#B4941E] transition-colors underline decoration-[#D4AF37]/30 hover:decoration-[#D4AF37]">
                            Forgot password?
                        </a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-6 py-3
                           bg-gradient-to-r from-[#D4AF37] to-[#B4941E]
                           hover:from-[#E5C158] hover:to-[#C4A448]
                           text-white text-sm font-serif font-bold rounded-lg
                           shadow-lg hover:shadow-2xl hover:shadow-[#D4AF37]/30
                           transform hover:-translate-y-0.5
                           transition-all duration-500 focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2">
                    <span>Enter Library</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </button>
            </form>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-[#D4AF37]/20"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-3 bg-white text-xs font-serif text-[#C4A882] italic">
                        or continue as
                    </span>
                </div>
            </div>

            {{-- Register Link --}}
            <p class="text-center text-sm font-serif text-[#5C4B3A]">
                A new seeker of knowledge?
                <a href="{{ route('register') }}"
                   class="font-bold text-[#D4AF37] hover:text-[#B4941E] transition-colors underline decoration-[#D4AF37]/30 hover:decoration-[#D4AF37]">
                    Register here
                </a>
            </p>
        </div>

        {{-- Footer Quote --}}
        <div class="text-center mt-6">
            <p class="text-xs text-[#C4A882] font-serif italic leading-relaxed">
                "The library is a temple of wisdom,<br>and every scholar is a keeper of its sacred flame."
            </p>
            <div class="flex items-center justify-center mt-3 space-x-1 text-[#D4AF37]/30 text-xs">
                <span>🌿</span>
                <span>🏛️</span>
                <span>📜</span>
                <span>🌿</span>
            </div>
        </div>
    </div>

 
</x-guest-layout>
