<div>
    {{-- Header Dashboard --}}
    <div class="mb-6 sm:mb-8">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard Admin</h2>
        <p class="text-gray-600 mt-1 text-sm sm:text-base">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>
    
    {{-- Statistik Cards - Responsive Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        {{-- Total Buku --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Total Buku</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ number_format($totalBuku) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-blue-50 px-4 sm:px-6 py-2 sm:py-3">
                <a href="{{ route('books') }}" class="text-xs sm:text-sm text-blue-600 hover:text-blue-800 font-medium">
                    Lihat semua buku →
                </a>
            </div>
        </div>
        
        {{-- Total User --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Total User</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ number_format($totalUser) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-green-50 px-4 sm:px-6 py-2 sm:py-3">
                <a href="{{ route('users') }}" class="text-xs sm:text-sm text-green-600 hover:text-green-800 font-medium">
                    Kelola user →
                </a>
            </div>
        </div>
        
        {{-- Peminjaman Aktif --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow sm:col-span-2 lg:col-span-1">
            <div class="p-4 sm:p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4 min-w-0">
                        <p class="text-xs sm:text-sm font-medium text-gray-500">Peminjaman Aktif</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ number_format($totalPeminjamanAktif) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-orange-50 px-4 sm:px-6 py-2 sm:py-3">
                <a href="{{ route('loans') }}" class="text-xs sm:text-sm text-orange-600 hover:text-orange-800 font-medium">
                    Lihat peminjaman →
                </a>
            </div>
        </div>
    </div>
    
    {{-- Info Section --}}
    <div class="mt-6 sm:mt-8 bg-white rounded-xl shadow-md p-4 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h3>
        <div class="text-gray-500 text-center py-6 sm:py-8">
            <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="text-sm sm:text-base">Aktivitas terbaru akan ditampilkan di sini.</p>
        </div>
    </div>
</div>
