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

<aside class="w-52 bg-gradient-to-b from-indigo-800 to-indigo-900 min-h-screen shadow-lg flex flex-col">
    {{-- Logo --}}
    <div class="px-3 py-3 border-b border-indigo-700 flex-shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" @click="sidebarOpen = false">
            <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-white text-sm font-bold truncate">Perpustakaan</h2>
                <p class="text-indigo-300 text-[10px]">Sistem Informasi</p>
            </div>
        </a>
    </div>
    
    {{-- Close button (Mobile) --}}
    <div class="lg:hidden absolute top-2 right-2">
        <button @click="sidebarOpen = false" class="p-1.5 rounded-md text-indigo-200 hover:text-white hover:bg-indigo-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    
    {{-- Menu --}}
    <nav class="flex-1 mt-3 px-2 overflow-y-auto">
        <ul class="space-y-1">
            @foreach($menus as $menu)
                @if(in_array($userRole, $menu['roles']))
                    <li>
                        <a href="{{ route($menu['route']) }}" 
                            @click="sidebarOpen = false"
                            class="flex items-center space-x-2 px-2.5 py-2 rounded-lg transition-all duration-200
                                {{ request()->routeIs($menu['route']) 
                                    ? 'bg-white bg-opacity-20 text-white shadow-md' 
                                    : 'text-indigo-200 hover:bg-white hover:bg-opacity-10 hover:text-white' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $menu['icon'] }}" />
                            </svg>
                            <span class="font-medium text-xs">{{ $menu['name'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
    
    {{-- User Info --}}
    <div class="p-2 border-t border-indigo-700 flex-shrink-0">
        <div class="bg-indigo-700 bg-opacity-50 rounded-lg p-2">
            <div class="flex items-center space-x-2">
                <div class="w-7 h-7 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-medium text-xs">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-xs font-medium truncate">
                        {{ auth()->user()->name ?? 'Guest' }}
                    </p>
                    <p class="text-indigo-300 text-[10px] capitalize">
                        {{ auth()->user()->role ?? 'user' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</aside>
