<div>
    {{-- Header Dashboard --}}
    <div class="mb-6 sm:mb-8">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard</h2>
        <p class="text-gray-600 mt-1 text-sm sm:text-base">Selamat datang kembali, {{ auth()->user()->name }}!</p>
    </div>
    
    {{-- Statistik Peminjaman - Responsive Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
        {{-- Buku Dipinjam --}}
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-4 sm:p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-indigo-100 text-xs sm:text-sm font-medium">Buku Sedang Dipinjam</p>
                        <p class="text-3xl sm:text-4xl font-bold mt-1 sm:mt-2">{{ $bukuDipinjam }}</p>
                        <p class="text-indigo-200 text-xs sm:text-sm mt-1 sm:mt-2">dari maksimal 5 buku</p>
                    </div>
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-white bg-opacity-20 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Aksi Cepat --}}
        <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">Aksi Cepat</h3>
            <div class="space-y-2 sm:space-y-3">
                <a href="{{ route('books') }}" class="flex items-center p-2.5 sm:p-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700 font-medium text-sm sm:text-base">Cari Buku</span>
                </a>
                <a href="{{ route('loans') }}" class="flex items-center p-2.5 sm:p-3 bg-gray-50 rounded-lg hover:bg-green-50 transition-colors">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700 font-medium text-sm sm:text-base">Riwayat Peminjaman</span>
                </a>
            </div>
        </div>
    </div>
    
    {{-- Riwayat Peminjaman --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-200">
            <h3 class="text-base sm:text-lg font-semibold text-gray-800">Riwayat Peminjaman Terbaru</h3>
        </div>
        
        @if(count($riwayatPeminjaman) > 0)
            {{-- Mobile: Card view --}}
            <div class="block sm:hidden divide-y divide-gray-200">
                @foreach($riwayatPeminjaman as $pinjam)
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div class="min-w-0 flex-1">
                                <p class="font-medium text-gray-900 truncate">{{ $pinjam['judul_buku'] }}</p>
                                <p class="text-sm text-gray-500 mt-1">{{ $pinjam['tanggal_pinjam'] }}</p>
                            </div>
                            <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full flex-shrink-0
                                {{ $pinjam['status'] === 'dipinjam' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($pinjam['status']) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Desktop: Table view --}}
            <div class="hidden sm:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($riwayatPeminjaman as $pinjam)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pinjam['judul_buku'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pinjam['tanggal_pinjam'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $pinjam['status'] === 'dipinjam' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($pinjam['status']) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-6 sm:py-8 text-gray-500">
                <p class="text-sm sm:text-base">Belum ada riwayat peminjaman.</p>
            </div>
        @endif
    </div>
</div>
