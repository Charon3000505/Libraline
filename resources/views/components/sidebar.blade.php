{{-- Sidebar Component --}}
@php
    $userRole = auth()->user()->role ?? 'user';

    $menus = [
        ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'roles' => ['admin', 'user']],
        ['name' => 'Data Buku', 'route' => 'books', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'roles' => ['admin', 'user']],
        ['name' => 'Peminjaman', 'route' => 'loans', 'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4', 'roles' => ['admin', 'user']],
        ['name' => 'Pengembalian', 'route' => 'returns', 'icon' => 'M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6', 'roles' => ['admin', 'user']],
        ['name' => 'Kelola User', 'route' => 'users', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'roles' => ['admin']],
    ];
@endphp

<aside class="w-52 bg-gradient-to-b from-[#2D1B4E] via-[#3D2B5E] to-[#1a0f2e] min-h-screen shadow-2xl flex flex-col border-r-2 border-[#D4AF37]/40 relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 20 L10 20 L10 10 L20 10 L20 20 L30 20 L30 10 L40 10 L40 20 L40 30 L30 30 L30 20 L20 20 L20 30 L10 30 L10 20 L0 20 Z" fill="%23D4AF37"/%3E%3C/svg%3E')]"></div>
    </div>

    {{-- Logo --}}
    <div class="relative px-3 py-4 border-b-2 border-[#D4AF37]/30 flex-shrink-0 bg-gradient-to-r from-[#D4AF37]/10 to-transparent">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" @click="sidebarOpen = false">
            <div class="w-9 h-9 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg shadow-[#D4AF37]/20 transform hover:scale-105 transition-transform">
                <svg class="w-5 h-5 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-[#D4AF37] text-sm font-serif font-bold truncate tracking-wide">Bibliotheca</h2>
                <p class="text-[#C4A882] text-[10px] font-serif italic">~ Alexandrina ~</p>
            </div>
        </a>

        {{-- Decorative corner --}}
        <div class="absolute bottom-0 left-0 w-8 h-[2px] bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
    </div>

    {{-- Close button (Mobile) --}}
    <div class="lg:hidden absolute top-2 right-2 z-20">
        <button @click="sidebarOpen = false" class="p-1.5 rounded-md text-[#D4AF37] hover:text-white hover:bg-[#D4AF37]/20 transition-colors">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Menu --}}
    <nav class="relative flex-1 mt-4 px-2 overflow-y-auto">
        {{-- Section Label --}}
        <div class="px-3 mb-2">
            <span class="text-[#D4AF37]/60 text-[9px] font-serif uppercase tracking-widest">Navigation</span>
            <div class="mt-1 h-px bg-gradient-to-r from-[#D4AF37]/30 to-transparent"></div>
        </div>

        <ul class="space-y-1.5">
            @foreach($menus as $menu)
                @if(in_array($userRole, $menu['roles']))
                    <li>
                        <a href="{{ route($menu['route']) }}"
                            @click="sidebarOpen = false"
                            class="group relative flex items-center space-x-2.5 px-3 py-2.5 rounded-lg transition-all duration-300
                                {{ request()->routeIs($menu['route'])
                                    ? 'bg-gradient-to-r from-[#D4AF37]/20 to-[#D4AF37]/5 text-[#D4AF37] border border-[#D4AF37]/30 shadow-lg shadow-[#D4AF37]/10'
                                    : 'text-[#C4A882] hover:bg-gradient-to-r hover:from-[#D4AF37]/10 hover:to-transparent hover:text-[#D4AF37] border border-transparent hover:border-[#D4AF37]/20' }}">

                            {{-- Active indicator --}}
                            @if(request()->routeIs($menu['route']))
                                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-6 bg-[#D4AF37] rounded-r-full shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                            @endif

                            {{-- Icon container --}}
                            <div class="w-8 h-8 rounded-md flex items-center justify-center flex-shrink-0 transition-all duration-300
                                {{ request()->routeIs($menu['route'])
                                    ? 'bg-[#D4AF37]/20 text-[#D4AF37]'
                                    : 'bg-[#2D1B4E]/50 text-[#C4A882] group-hover:bg-[#D4AF37]/10 group-hover:text-[#D4AF37]' }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $menu['icon'] }}" />
                                </svg>
                            </div>

                            <span class="font-serif text-xs tracking-wide">{{ $menu['name'] }}</span>

                            {{-- Hover glow effect --}}
                            <div class="absolute inset-0 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none bg-gradient-to-r from-[#D4AF37]/5 to-transparent"></div>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>

    {{-- Decorative Divider --}}
    <div class="relative px-3 py-2 flex-shrink-0">
        <div class="flex items-center space-x-2">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
            <span class="text-[#D4AF37]/40 text-xs">⚜️</span>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
        </div>
    </div>

    {{-- User Info --}}
    <div class="relative p-3 border-t-2 border-[#D4AF37]/20 flex-shrink-0 bg-gradient-to-t from-[#D4AF37]/5 to-transparent">
        <div class="bg-[#2D1B4E]/80 backdrop-blur-sm rounded-lg p-3 border border-[#D4AF37]/20 shadow-lg">
            <div class="flex items-center space-x-2.5">
                {{-- Avatar --}}
                <div class="relative flex-shrink-0">
                    <div class="w-9 h-9 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-full flex items-center justify-center shadow-md">
                        <span class="text-[#2D1B4E] font-serif font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </span>
                    </div>
                    {{-- Online indicator --}}
                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-400 border-2 border-[#2D1B4E] rounded-full"></div>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-[#D4AF37] text-xs font-serif font-medium truncate">
                        {{ auth()->user()->name ?? 'Scholar' }}
                    </p>
                    <p class="text-[#C4A882] text-[10px] font-serif italic capitalize">
                        {{ auth()->user()->role ?? 'seeker' }}
                    </p>
                </div>

                {{-- Settings icon --}}
                <a href="#" class="text-[#C4A882] hover:text-[#D4AF37] transition-colors flex-shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
            </div>

            {{-- User subtitle --}}
            <p class="text-[#C4A882]/60 text-[9px] font-serif italic mt-2 text-center">
                Keeper of Knowledge
            </p>
        </div>
    </div>

    {{-- Bottom decorative element --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#D4AF37]/40 to-transparent"></div>
</aside>


