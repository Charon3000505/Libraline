{{--
=============================================================================
HALAMAN DATA BUKU - PERPUSTAKAAN
=============================================================================
File: resources/views/livewire/books/index.blade.php
Deskripsi: Halaman manajemen data buku dengan desain modern dan profesional

STRUKTUR:
1. Header Section (Judul + Tombol Aksi)
2. Statistics Cards (4 kolom grid)
3. Search & Filter Bar
4. Data Table (siap untuk Livewire/DataTables)

TIPS PENGEMBANGAN:
- Untuk Livewire: Tambahkan wire:model pada input dan wire:click pada tombol
- Untuk yajra DataTables: Ganti section tabel dengan {{ $dataTable->table() }}
- Untuk pagination: Tambahkan {{ $books->links() }} di bawah tabel
=============================================================================
--}}

<div class="p-6">
    {{-- ================================================================
         SECTION 1: HEADER
         - Judul halaman di kiri
         - Tombol aksi di kanan
         - Responsive: stack di mobile, inline di desktop
    ================================================================ --}}
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        {{-- Judul dan Subtext --}}
        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Buku</h1>
            <p class="mt-1 text-sm text-gray-500">Kelola koleksi buku perpustakaan Anda</p>
        </div>

        {{-- Tombol Tambah Buku --}}
        <button 
            wire:click="openModal" 
            type="button"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 
                   bg-purple-600 hover:bg-purple-700 
                   text-white text-sm font-semibold 
                   rounded-xl shadow-sm 
                   transition-all duration-200 
                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            {{-- Icon Plus --}}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            <span>Tambah Buku</span>
        </button>
    </div>

    {{-- ================================================================
         SECTION 2: FLASH MESSAGE
         - Notifikasi sukses/error
    ================================================================ --}}
    @if (session()->has('message'))
        <div class="mb-6 flex items-center gap-3 p-4 bg-green-50 border border-green-200 rounded-xl">
            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-medium text-green-700">{{ session('message') }}</span>
        </div>
    @endif

    {{-- ================================================================
         SECTION 3: STATISTICS CARDS
         - Grid 4 kolom (responsive: 2 kolom di mobile)
         - Setiap card: Icon + Angka + Label
         - Warna sesuai konteks (biru/hijau/merah/ungu)
    ================================================================ --}}
    <div class="mb-6 grid grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Card: Total Buku --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-gray-900">{{ $books->total() }}</p>
                    <p class="text-sm text-gray-500">Total Buku</p>
                </div>
            </div>
        </div>

        {{-- Card: Tersedia --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-green-600">{{ $books->where('stok', '>', 0)->count() }}</p>
                    <p class="text-sm text-gray-500">Tersedia</p>
                </div>
            </div>
        </div>

        {{-- Card: Habis --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-red-600">{{ $books->where('stok', 0)->count() }}</p>
                    <p class="text-sm text-gray-500">Habis</p>
                </div>
            </div>
        </div>

        {{-- Card: Kategori --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-purple-600">{{ $kategoris->count() }}</p>
                    <p class="text-sm text-gray-500">Kategori</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================================================================
         SECTION 4: SEARCH & FILTER BAR
         - Search input di kiri (dengan icon)
         - Filter dropdown di kanan
         - Responsive: stack di mobile
    ================================================================ --}}
    <div class="mb-6 bg-white rounded-xl border border-gray-200 p-4">
        <div class="flex flex-col md:flex-row gap-4">
            {{-- Search Input --}}
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search"
                    placeholder="Cari judul buku atau penulis..."
                    class="w-full pl-12 pr-4 py-2.5 
                           border border-gray-300 rounded-lg 
                           text-sm placeholder-gray-400
                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                           transition-colors">
            </div>

            {{-- Filter Kategori --}}
            <div class="w-full md:w-56">
                <select 
                    wire:model.live="kategori"
                    class="w-full px-4 py-2.5 
                           border border-gray-300 rounded-lg 
                           text-sm text-gray-700
                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                           transition-colors">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat }}">{{ $kat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    {{-- ================================================================
         SECTION 5: DATA TABLE
         - Header dengan background abu
         - Row dengan hover effect
         - Badge untuk status dan kategori
         - Tombol aksi di kolom terakhir
         
         TIPS:
         - Untuk DataTables: Ganti dengan {!! $dataTable->table() !!}
         - Untuk Livewire Pagination: Sudah siap dengan $books->links()
    ================================================================ --}}
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        {{-- Mobile View: Card Layout --}}
        <div class="sm:hidden divide-y divide-gray-100">
            @forelse($books as $book)
                <div class="p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1 min-w-0">
                            {{-- Badges --}}
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                @if($book->kategori)
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                        {{ $book->kategori }}
                                    </span>
                                @endif
                                <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-semibold 
                                    {{ $book->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    Stok: {{ $book->stok }}
                                </span>
                            </div>
                            {{-- Title & Author --}}
                            <h3 class="text-sm font-semibold text-gray-900 truncate">{{ $book->judul }}</h3>
                            <p class="text-sm text-gray-500">{{ $book->penulis }}</p>
                            @if($book->penerbit)
                                <p class="text-xs text-gray-400 mt-1">{{ $book->penerbit }}</p>
                            @endif
                        </div>
                        {{-- Action Buttons --}}
                        <div class="flex flex-col gap-1">
                            <button wire:click="editBook({{ $book->id }})" type="button" 
                                class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                </svg>
                            </button>
                            <button wire:click="confirmDelete({{ $book->id }})" type="button" 
                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                    <h3 class="text-sm font-medium text-gray-900">Belum ada data buku</h3>
                    <p class="text-sm text-gray-500 mt-1">Mulai dengan menambahkan buku pertama</p>
                </div>
            @endforelse
        </div>

        {{-- Desktop View: Table --}}
        <div class="hidden sm:block">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Buku</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Penerbit</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($books as $book)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- Kolom: Buku (Judul + Penulis) --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    {{-- Avatar dengan Inisial --}}
                                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-sm">
                                        <span class="text-white font-bold text-sm">{{ strtoupper(substr($book->judul, 0, 1)) }}</span>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $book->judul }}</p>
                                        <p class="text-sm text-gray-500 truncate">{{ $book->penulis }}</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom: Penerbit --}}
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-600">{{ $book->penerbit ?? '-' }}</p>
                                @if($book->tahun_terbit)
                                    <p class="text-xs text-gray-400">{{ $book->tahun_terbit }}</p>
                                @endif
                            </td>

                            {{-- Kolom: Kategori --}}
                            <td class="px-6 py-4">
                                @if($book->kategori)
                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                        {{ $book->kategori }}
                                    </span>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>

                            {{-- Kolom: Stok --}}
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold
                                    {{ $book->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $book->stok }}
                                </span>
                            </td>

                            {{-- Kolom: Aksi --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <button wire:click="editBook({{ $book->id }})" type="button" 
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium 
                                               text-purple-700 bg-purple-50 hover:bg-purple-100 
                                               rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                        </svg>
                                        Edit
                                    </button>
                                    <button wire:click="confirmDelete({{ $book->id }})" type="button" 
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium 
                                               text-red-700 bg-red-50 hover:bg-red-100 
                                               rounded-lg transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                </svg>
                                <h3 class="text-sm font-medium text-gray-900">Belum ada data buku</h3>
                                <p class="text-sm text-gray-500 mt-1">Mulai dengan menambahkan buku pertama</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        @if($books->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $books->links() }}
            </div>
        @endif
    </div>

    {{-- ================================================================
         SECTION 6: MODAL FORM (TAMBAH/EDIT)
         - Overlay dengan backdrop blur
         - Form dengan spacing konsisten
         - Tombol aksi di footer
    ================================================================ --}}
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            {{-- Backdrop --}}
            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>
                
                {{-- Modal Content --}}
                <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl">
                    <form wire:submit="save">
                        {{-- Header --}}
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $isEdit ? 'Edit Buku' : 'Tambah Buku Baru' }}
                            </h3>
                            <button type="button" wire:click="closeModal" 
                                class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Body --}}
                        <div class="px-6 py-5 space-y-4 max-h-[60vh] overflow-y-auto">
                            {{-- Judul --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Judul Buku <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="judul" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Masukkan judul buku">
                                @error('judul') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Penulis --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Penulis <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="penulis" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Nama penulis">
                                @error('penulis') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Penerbit & Tahun (2 kolom) --}}
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Penerbit</label>
                                    <input type="text" wire:model="penerbit" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                        placeholder="Nama penerbit">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Tahun Terbit</label>
                                    <input type="number" wire:model="tahun_terbit" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                        placeholder="2024">
                                </div>
                            </div>

                            {{-- ISBN & Stok (2 kolom) --}}
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">ISBN</label>
                                    <input type="text" wire:model="isbn" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                        placeholder="978-xxx-xxx">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                        Stok <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" wire:model="stok" min="0"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                    @error('stok') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Kategori --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Kategori</label>
                                <input type="text" wire:model="kategoriInput" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                    placeholder="Fiksi, Non-Fiksi, Sejarah, dll">
                            </div>

                            {{-- Deskripsi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                                <textarea wire:model="deskripsi" rows="3"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm 
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none"
                                    placeholder="Deskripsi singkat tentang buku"></textarea>
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="flex items-center justify-end gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-2xl">
                            <button type="button" wire:click="closeModal"
                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                                       rounded-lg hover:bg-gray-50 transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2.5 text-sm font-medium text-white bg-purple-600 
                                       rounded-lg hover:bg-purple-700 transition-colors">
                                {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Buku' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- ================================================================
         SECTION 7: MODAL KONFIRMASI HAPUS
         - Centered dengan icon warning
         - Tombol cancel & delete
    ================================================================ --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="$set('showDeleteModal', false)"></div>
                
                <div class="relative w-full max-w-sm bg-white rounded-2xl shadow-2xl p-6 text-center">
                    {{-- Warning Icon --}}
                    <div class="mx-auto w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                        </svg>
                    </div>

                    {{-- Text --}}
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Hapus Buku</h3>
                    <p class="text-sm text-gray-500 mb-6">
                        Apakah Anda yakin ingin menghapus buku ini? Tindakan ini tidak dapat dibatalkan.
                    </p>

                    {{-- Buttons --}}
                    <div class="flex gap-3">
                        <button type="button" wire:click="$set('showDeleteModal', false)"
                            class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                                   rounded-lg hover:bg-gray-50 transition-colors">
                            Batal
                        </button>
                        <button type="button" wire:click="deleteBook"
                            class="flex-1 px-4 py-2.5 text-sm font-medium text-white bg-red-600 
                                   rounded-lg hover:bg-red-700 transition-colors">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

{{--
=============================================================================
CATATAN PENGEMBANGAN
=============================================================================

1. INTEGRASI LIVEWIRE (Sudah Siap):
   - wire:model sudah diterapkan pada semua input
   - wire:click sudah ada pada semua tombol aksi
   - wire:submit pada form modal
   - Tinggal pastikan Livewire component sudah ada

2. INTEGRASI YAJRA DATATABLES:
   - Ganti section tabel dengan:
     {!! $dataTable->table(['class' => 'w-full']) !!}
   - Tambahkan di bagian bawah:
     @push('scripts')
         {!! $dataTable->scripts() !!}
     @endpush

3. PAGINATION:
   - Sudah menggunakan {{ $books->links() }}
   - Untuk kustomisasi, publish pagination views:
     php artisan vendor:publish --tag=laravel-pagination

4. RESPONSIVE BREAKPOINTS:
   - Mobile: < 640px (sm)
   - Tablet: 640px - 1024px (md)
   - Desktop: > 1024px (lg)

5. WARNA UTAMA:
   - Primary: Purple (purple-600)
   - Success: Green (green-600)
   - Danger: Red (red-600)
   - Info: Blue (blue-600)
=============================================================================
--}}
