{{-- Navbar Component --}}
<nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
    <div class="px-3">
        <div class="flex items-center justify-between h-12">
            {{-- Left: Hamburger + Title --}}
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" 
                    class="lg:hidden p-1.5 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <h1 class="ml-2 lg:ml-0 text-sm font-semibold text-gray-800 truncate">
                    Dashboard
                </h1>
            </div>
            
            {{-- Right: User + Logout --}}
            <div class="flex items-center space-x-2">
                <div class="flex items-center space-x-2">
                    <div class="w-7 h-7 bg-indigo-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs font-medium">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </span>
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-xs font-medium text-gray-700 truncate max-w-[100px]">
                            {{ auth()->user()->name ?? 'Guest' }}
                        </p>
                        <p class="text-[10px] text-gray-500 capitalize">
                            {{ auth()->user()->role ?? 'user' }}
                        </p>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="flex items-center space-x-1 px-2 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="hidden sm:inline">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
