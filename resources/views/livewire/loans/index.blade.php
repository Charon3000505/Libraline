<div class="p-6 bg-[#F5F0E8] min-h-screen bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 5 L55 30 L30 55 L5 30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5" opacity="0.03"/%3E%3C/svg%3E')]">

    {{-- Header --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="relative">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-lg shadow-[#D4AF37]/20">
                    <svg class="w-6 h-6 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-serif font-bold text-[#2D1B4E] tracking-wide">Sacred Borrowings</h2>
                    <p class="text-sm text-[#5C4B3A] font-serif italic">~ Peminjaman Kitab Perpustakaan ~</p>
                </div>
            </div>
            <div class="absolute -bottom-2 left-0 w-20 h-0.5 bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
        </div>

        <button wire:click="openModal"
            class="group relative bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] text-[#D4AF37] px-6 py-3 rounded-lg border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1 font-serif font-bold">
            <span class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>New Borrowing</span>
            </span>
        </button>
    </div>

    {{-- Flash Messages --}}
    @if (session()->has('message'))
        <div class="mb-6 bg-gradient-to-r from-[#D4AF37]/10 to-[#D4AF37]/5 border-l-4 border-[#D4AF37] p-4 rounded-r-lg shadow-md animate-fadeIn">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="text-[#2D1B4E] font-serif italic">{{ session('message') }}</p>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 bg-gradient-to-r from-red-100 to-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-md animate-fadeIn">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="text-red-800 font-serif italic">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    {{-- Search & Filter --}}
    <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl shadow-lg border-2 border-[#D4AF37]/20 p-5 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search"
                    placeholder="Search by borrower name or book title..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all text-sm">
            </div>
            <div class="sm:w-48">
                <select wire:model.live="status"
                    class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all cursor-pointer text-sm">
                    <option value="">📋 All Status</option>
                    <option value="dipinjam">📖 Borrowed</option>
                    <option value="dikembalikan">✅ Returned</option>
                    <option value="terlambat">⚠️ Overdue</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Loans List --}}
    <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl shadow-xl border-2 border-[#D4AF37]/30 overflow-hidden">

        {{-- Table Header --}}
        <div class="bg-gradient-to-r from-[#2D1B4E] via-[#3D2B5E] to-[#4A3568] px-6 py-4 border-b-2 border-[#D4AF37]">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="text-[#D4AF37] text-lg">📜</span>
                    <h3 class="text-lg font-serif font-bold text-[#D4AF37]">Borrowing Records</h3>
                </div>
                <div class="text-[#C4A882] text-sm font-serif italic">{{ $loans->total() }} records</div>
            </div>
        </div>

        {{-- Mobile: Card View --}}
        <div class="block sm:hidden divide-y divide-[#D4AF37]/10">
            @forelse($loans as $loan)
                <div class="p-4 hover:bg-[#D4AF37]/5 transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div class="min-w-0 flex-1">
                            {{-- Book Title --}}
                            <div class="flex items-center space-x-2 mb-1">
                                <svg class="w-4 h-4 text-[#D4AF37] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <p class="font-serif font-bold text-[#2D1B4E] text-sm">{{ $loan->book->judul ?? '-' }}</p>
                            </div>

                            {{-- Borrower --}}
                            <div class="flex items-center space-x-2 mb-2">
                                <svg class="w-4 h-4 text-[#C4A882] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <p class="text-sm font-serif text-[#5C4B3A]">Borrower: {{ $loan->user->name ?? '-' }}</p>
                            </div>

                            {{-- Dates --}}
                            <div class="flex items-center space-x-2 text-xs text-[#5C4B3A] font-serif">
                                <span>📅 {{ $loan->tanggal_pinjam->format('d M Y') }}</span>
                                <span class="text-[#D4AF37]">→</span>
                                <span>📅 {{ $loan->tanggal_kembali->format('d M Y') }}</span>
                            </div>
                        </div>

                        {{-- Status Badge --}}
                        <span class="ml-2 px-3 py-1.5 text-xs font-serif font-semibold rounded-full flex-shrink-0 border
                            @if($loan->status === 'dipinjam')
                                bg-[#D4AF37]/10 text-[#D4AF37] border-[#D4AF37]/30
                            @elseif($loan->status === 'dikembalikan')
                                bg-green-100 text-green-800 border-green-300
                            @else
                                bg-red-100 text-red-800 border-red-300
                            @endif">
                            @if($loan->status === 'dipinjam')
                                📖 {{ ucfirst($loan->status) }}
                            @elseif($loan->status === 'dikembalikan')
                                ✅ {{ ucfirst($loan->status) }}
                            @else
                                ⚠️ {{ ucfirst($loan->status) }}
                            @endif
                        </span>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <div class="flex flex-col items-center space-y-3">
                        <div class="text-6xl opacity-20">📜</div>
                        <p class="text-[#5C4B3A] font-serif italic text-lg">No borrowing records found</p>
                        <p class="text-[#C4A882] text-sm font-serif">"The scrolls remain in their shelves, awaiting curious minds."</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Desktop: Table View --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#E8E0D0]/50 border-b-2 border-[#D4AF37]/10">
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">👤 Borrower</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📖 Book</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📅 Borrow Date</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📅 Due Date</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">⚜️ Status</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D4AF37]/10">
                    @forelse($loans as $loan)
                        <tr class="hover:bg-[#D4AF37]/5 transition-all duration-300 group">
                            {{-- Borrower --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-full flex items-center justify-center border border-[#D4AF37]/30">
                                        <span class="text-xs font-serif font-bold text-[#D4AF37]">
                                            {{ strtoupper(substr($loan->user->name ?? 'U', 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-serif font-bold text-[#2D1B4E] group-hover:text-[#D4AF37] transition-colors">
                                            {{ $loan->user->name ?? '-' }}
                                        </p>
                                        <p class="text-xs text-[#C4A882] font-serif italic">{{ $loan->user->email ?? '' }}</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Book --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    {{-- Book Cover Thumbnail --}}
                                    <div class="flex-shrink-0 w-8 h-11 rounded-sm overflow-hidden border border-[#D4AF37]/30 shadow-sm">
                                        @if(!empty($loan->book->image) && Storage::disk('public')->exists($loan->book->image))
                                            <img src="{{ asset('storage/' . $loan->book->image) }}"
                                                 alt="Cover"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-[#D4AF37]/20 to-[#2D1B4E]/20 flex items-center justify-center">
                                                <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-serif font-bold text-[#2D1B4E] group-hover:text-[#D4AF37] transition-colors">
                                            {{ $loan->book->judul ?? '-' }}
                                        </p>
                                        <p class="text-xs text-[#C4A882] font-serif italic">{{ $loan->book->penulis ?? 'Unknown Author' }}</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Borrow Date --}}
                            <td class="px-6 py-4">
                                <div class="text-sm font-serif text-[#2D1B4E]">
                                    {{ $loan->tanggal_pinjam->format('d M Y') }}
                                </div>
                                <div class="text-xs text-[#C4A882] font-serif italic">
                                    {{ $loan->tanggal_pinjam->diffForHumans() }}
                                </div>
                            </td>

                            {{-- Due Date --}}
                            <td class="px-6 py-4">
                                <div class="text-sm font-serif text-[#2D1B4E]">
                                    {{ $loan->tanggal_kembali->format('d M Y') }}
                                </div>
                                @php
                                    $now = \Carbon\Carbon::now();
                                    $dueDate = $loan->tanggal_kembali;
                                    $daysLeft = $now->diffInDays($dueDate, false);
                                @endphp
                                @if($loan->status === 'dipinjam')
                                    <div class="text-xs font-serif italic
                                        {{ $daysLeft < 0 ? 'text-red-600' : ($daysLeft <= 3 ? 'text-yellow-600' : 'text-green-600') }}">
                                        @if($daysLeft < 0)
                                            ⚠️ Overdue {{ abs($daysLeft) }} days
                                        @elseif($daysLeft == 0)
                                            📍 Due today
                                        @else
                                            📅 {{ $daysLeft }} days remaining
                                        @endif
                                    </div>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center space-x-1 px-3 py-1.5 text-xs font-serif font-semibold rounded-full border
                                    @if($loan->status === 'dipinjam')
                                        bg-[#D4AF37]/10 text-[#D4AF37] border-[#D4AF37]/30
                                    @elseif($loan->status === 'dikembalikan')
                                        bg-green-100 text-green-800 border-green-300
                                    @else
                                        bg-red-100 text-red-800 border-red-300
                                    @endif">
                                    @if($loan->status === 'dipinjam')
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        <span>{{ ucfirst($loan->status) }}</span>
                                    @elseif($loan->status === 'dikembalikan')
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>{{ ucfirst($loan->status) }}</span>
                                    @else
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ ucfirst($loan->status) }}</span>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative">
                                        <div class="text-8xl opacity-20">📜</div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#F5F0E8] via-transparent to-transparent"></div>
                                    </div>
                                    <h3 class="text-2xl font-serif font-bold text-[#2D1B4E]">No Borrowing Records</h3>
                                    <p class="text-[#5C4B3A] font-serif italic max-w-md text-center">
                                        "The scrolls remain in their shelves, awaiting curious minds to borrow them."
                                    </p>
                                    <div class="flex items-center space-x-2 text-[#D4AF37] mt-2">
                                        <span>✦</span>
                                        <span class="text-xl">⚜️</span>
                                        <span>✦</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t-2 border-[#D4AF37]/10 bg-[#E8E0D0]/30">
            <div class="flex items-center justify-between">
                <div class="text-sm font-serif text-[#5C4B3A] italic">
                    Showing {{ $loans->firstItem() ?? 0 }} - {{ $loans->lastItem() ?? 0 }} of {{ $loans->total() }} records
                </div>
                <div>
                    {{ $loans->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Peminjaman --}}
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>

                <div class="relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl border-2 border-[#D4AF37] shadow-2xl shadow-[#D4AF37]/20 max-w-lg w-full p-8 z-10 transform transition-all animate-fadeIn">

                    {{-- Modal Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-serif font-bold text-[#2D1B4E]">New Borrowing Request</h3>
                                <p class="text-xs text-[#C4A882] font-serif italic">Issue a sacred manuscript to a seeker of knowledge</p>
                            </div>
                        </div>
                        <button wire:click="closeModal" class="text-[#C4A882] hover:text-[#2D1B4E] transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    {{-- Form --}}
                    <form wire:submit="save" class="space-y-5">
                        {{-- Borrower Selection --}}
                        <div>
                            <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                👤 Seeker of Knowledge <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="userId"
                                class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all cursor-pointer text-sm">
                                <option value="">✨ Choose a borrower...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                            @error('userId') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                        </div>

                        {{-- Book Selection --}}
                        <div>
                            <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                📖 Sacred Manuscript <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="bookId"
                                class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all cursor-pointer text-sm">
                                <option value="">📚 Choose a manuscript...</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ $book->stok <= 0 ? 'disabled' : '' }}>
                                        {{ $book->judul }} —
                                        @if($book->stok > 5)
                                            📦 Stock: {{ $book->stok }}
                                        @elseif($book->stok > 0)
                                            ⚠️ Only {{ $book->stok }} left
                                        @else
                                            ❌ Out of stock
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('bookId') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                        </div>

                        {{-- Dates --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                    📅 Borrow Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" wire:model="tanggalPinjam"
                                    class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all text-sm">
                                @error('tanggalPinjam') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                    📅 Due Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" wire:model="tanggalKembali"
                                    class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all text-sm">
                                @error('tanggalKembali') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Info Box --}}
                        <div class="bg-[#D4AF37]/5 border border-[#D4AF37]/20 rounded-lg p-3">
                            <div class="flex items-start space-x-2">
                                <svg class="w-4 h-4 text-[#D4AF37] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-xs text-[#5C4B3A] font-serif italic">
                                    The borrowing period is 14 days. Late returns will be recorded in the archives.
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex justify-end gap-3 pt-4 border-t-2 border-[#D4AF37]/10">
                            <button type="button" wire:click="closeModal"
                                class="px-6 py-2.5 text-sm font-serif text-[#5C4B3A] bg-[#E8E0D0] border-2 border-[#D4AF37]/20 rounded-lg hover:bg-[#D4AF37]/10 transition-all">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 text-sm font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all">
                                Issue Manuscript
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>


