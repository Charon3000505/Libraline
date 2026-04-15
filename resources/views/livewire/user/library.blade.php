


<div class="min-h-screen bg-[#F5F1EC]">

    {{-- Navigation --}}
    <nav class="sticky top-0 z-40 border-b border-[#E8DFD5] bg-[#F5F1EC]/90 backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-[#C4A77D] to-[#A88964] shadow-sm">
                        <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="font-serif text-xl font-bold tracking-tight text-[#2C241B]">
                        Libraline
                    </span>
                </a>

                {{-- User Menu Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center space-x-2 rounded-full border border-[#E8DFD5] bg-white px-4 py-2 text-sm text-[#5C4D3C] transition hover:bg-[#EDE4D9]">
                        <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
                        <span class="sm:hidden">Menu</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open"
                         @click.away="open = false"
                         x-cloak
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 origin-top-right rounded-xl border border-[#E8DFD5] bg-white py-1 shadow-lg">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-red-600 transition hover:bg-[#F5F1EC]">
                                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

        {{-- Welcome Header --}}
        <div class="mb-10">
            <h1 class="font-serif text-3xl font-bold text-[#2C241B] sm:text-4xl">
                Halo, {{ auth()->user()->name }}
                <span class="inline-block animate-wave">👋</span>
            </h1>
            <p class="mt-2 text-[#5C4D3C]">Selamat datang di perpustakaan digitalmu</p>
        </div>

        {{-- Currently Reading Section (Horizontal Scroll) --}}
        @if($myLoans && count($myLoans) > 0)
        <section class="mb-14">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="font-serif text-2xl font-semibold text-[#2C241B]">Sedang Kamu Baca</h2>
                <span class="rounded-full bg-[#A88964]/10 px-3 py-1 text-xs font-medium text-[#A88964]">
                    {{ count($myLoans) }} buku
                </span>
            </div>

            <div class="relative">
                <div class="flex snap-x gap-4 overflow-x-auto pb-4 scrollbar-hide">
                    @foreach($myLoans as $loan)
                    <div class="w-44 flex-none snap-start sm:w-48">
                        <div class="overflow-hidden rounded-2xl border border-[#E8DFD5] bg-white p-4 shadow-sm transition hover:shadow-md">

                            {{-- Book Cover Placeholder --}}
                            <div class="aspect-[3/4] w-full overflow-hidden rounded-lg bg-gradient-to-br from-[#C4A77D]/30 to-[#A88964]/20">
                                <div class="flex h-full w-full items-center justify-center">
                                    <svg class="h-10 w-10 text-[#A88964]/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Book Info --}}
                            <div class="mt-3">
                                <h3 class="line-clamp-1 font-serif text-base font-semibold text-[#2C241B]">
                                    {{ $loan->book->judul ?? 'Judul Buku' }}
                                </h3>
                                <p class="line-clamp-1 text-xs text-[#8B7355]">
                                    {{ $loan->book->penulis ?? 'Penulis' }}
                                </p>
                            </div>

                            {{-- Return Button --}}
                            <div class="mt-3">
                                <button wire:click="returnBook({{ $loan->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="returnBook({{ $loan->id }})"
                                        class="w-full rounded-full border border-[#A88964] py-1.5 text-xs font-medium text-[#A88964] transition hover:bg-[#A88964] hover:text-white">
                                    <span wire:loading.remove wire:target="returnBook({{ $loan->id }})">Kembalikan</span>
                                    <span wire:loading wire:target="returnBook({{ $loan->id }})" class="flex items-center justify-center">
                                        <svg class="mr-1 h-3 w-3 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- Book Collection Section (Grid) --}}
        <section class="mb-14">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="font-serif text-2xl font-semibold text-[#2C241B]">Koleksi Buku</h2>
                <span class="rounded-full bg-[#A88964]/10 px-3 py-1 text-xs font-medium text-[#A88964]">
                    {{ $books ? count($books) : 0 }} buku
                </span>
            </div>

            @if($books && count($books) > 0)
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($books as $book)
                <div class="group relative overflow-hidden rounded-2xl border border-[#E8DFD5] bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                    {{-- Book Cover Placeholder --}}
                    <div class="aspect-[3/4] w-full overflow-hidden rounded-xl bg-gradient-to-br from-[#E8DFD5]/50 to-[#D4C4B0]/30">
                        <div class="flex h-full w-full flex-col items-center justify-center p-4 text-center">
                            <svg class="mb-3 h-12 w-12 text-[#A88964]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="line-clamp-2 text-xs font-medium text-[#A88964]">{{ $book->judul }}</span>
                        </div>
                    </div>

                    {{-- Book Info --}}
                    <div class="mt-4">
                        <h3 class="line-clamp-1 font-serif text-lg font-semibold text-[#2C241B]">{{ $book->judul }}</h3>
                        <p class="line-clamp-1 text-sm text-[#8B7355]">{{ $book->penulis }}</p>

                        {{-- Stock Badge --}}
                        <div class="mt-2 flex items-center space-x-2">
                            <span class="inline-flex items-center rounded-full border px-2 py-0.5 text-xs
                                {{ $book->stok > 0 ? 'border-green-200 bg-green-50 text-green-700' : 'border-red-200 bg-red-50 text-red-700' }}">
                                <span class="mr-1 inline-block h-1.5 w-1.5 rounded-full {{ $book->stok > 0 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                Stok: {{ $book->stok }}
                            </span>
                        </div>
                    </div>

                    {{-- Borrow Button --}}
                    <div class="mt-4">
                        @if($book->stok > 0)
                            <button wire:click="borrow({{ $book->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="borrow({{ $book->id }})"
                                    class="w-full rounded-full bg-[#A88964] py-2.5 text-sm font-medium text-white transition hover:bg-[#8B7355]">
                                <span wire:loading.remove wire:target="borrow({{ $book->id }})">Pinjam Buku</span>
                                <span wire:loading wire:target="borrow({{ $book->id }})" class="flex items-center justify-center">
                                    <svg class="mr-2 h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Memproses
                                </span>
                            </button>
                        @else
                            <button disabled class="w-full cursor-not-allowed rounded-full bg-[#E8DFD5] py-2.5 text-sm font-medium text-[#8B7355]">
                                Stok Habis
                            </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Empty State --}}
            <div class="rounded-3xl border border-dashed border-[#D4C4B0] bg-white/50 py-16 text-center">
                <svg class="mx-auto h-16 w-16 text-[#D4C4B0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-4 font-serif text-xl font-semibold text-[#2C241B]">Belum ada buku</h3>
                <p class="mt-2 text-[#8B7355]">Koleksi buku akan segera ditambahkan.</p>
            </div>
            @endif
        </section>

        {{-- Borrowing History Section --}}
        <section>
            <div class="mb-5">
                <h2 class="font-serif text-2xl font-semibold text-[#2C241B]">Riwayat Peminjaman</h2>
            </div>

            @if($history && count($history) > 0)
            <div class="overflow-hidden rounded-2xl border border-[#E8DFD5] bg-white">
                <div class="divide-y divide-[#E8DFD5]">
                    @foreach($history as $item)
                    <div class="flex flex-col p-4 transition hover:bg-[#F5F1EC]/50 sm:flex-row sm:items-center sm:justify-between sm:p-5">
                        <div class="flex items-start space-x-4">
                            {{-- Mini Book Icon --}}
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-[#C4A77D]/20 to-[#A88964]/10">
                                <svg class="h-5 w-5 text-[#A88964]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>

                            <div>
                                <h4 class="font-serif text-base font-semibold text-[#2C241B]">
                                    {{ $item->book->judul ?? 'Judul Buku' }}
                                </h4>
                                <p class="text-sm text-[#8B7355]">{{ $item->book->penulis ?? 'Penulis' }}</p>

                                <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-[#8B7355]">
                                    <span class="flex items-center">
                                        <svg class="mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Pinjam: {{ \Carbon\Carbon::parse($item->borrowed_at)->format('d M Y') }}
                                    </span>

                                    @if($item->returned_at)
                                    <span class="flex items-center">
                                        <svg class="mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kembali: {{ \Carbon\Carbon::parse($item->returned_at)->format('d M Y') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Status Badge --}}
                        <div class="mt-3 sm:mt-0">
                            @if($item->returned_at)
                                <span class="inline-flex items-center rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Dikembalikan
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-yellow-50 px-3 py-1 text-xs font-medium text-yellow-700">
                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Dipinjam
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            {{-- Empty State History --}}
            <div class="rounded-2xl border border-dashed border-[#D4C4B0] bg-white/50 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-[#D4C4B0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-3 text-[#8B7355]">Belum ada riwayat peminjaman</p>
                <p class="text-sm text-[#B8A692]">Buku yang kamu pinjam akan muncul di sini</p>
            </div>
            @endif
        </section>

    </main>

    {{-- Custom CSS --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        @keyframes wave {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(20deg); }
            75% { transform: rotate(-15deg); }
        }
        .animate-wave {
            display: inline-block;
            animation: wave 1.5s ease-in-out infinite;
            transform-origin: 70% 70%;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
