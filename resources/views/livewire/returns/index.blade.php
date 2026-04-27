<div class="p-6 bg-[#F5F0E8] min-h-screen bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 5 L55 30 L30 55 L5 30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5" opacity="0.03"/%3E%3C/svg%3E')]">

    {{-- Header --}}
    <div class="mb-8">
        <div class="relative">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-lg shadow-[#D4AF37]/20">
                    <svg class="w-6 h-6 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-serif font-bold text-[#2D1B4E] tracking-wide">Return of Sacred Manuscripts</h2>
                    <p class="text-sm text-[#5C4B3A] font-serif italic">~ Pengembalian Kitab ke Perpustakaan ~</p>
                </div>
            </div>
            <div class="absolute -bottom-2 left-0 w-20 h-0.5 bg-gradient-to-r from-[#D4AF37] to-transparent"></div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-6 bg-gradient-to-r from-green-100 to-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-md animate-fadeIn">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <p class="text-green-800 font-serif italic">{{ session('message') }}</p>
            </div>
        </div>
    @endif

    {{-- Search --}}
    <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl shadow-lg border-2 border-[#D4AF37]/20 p-5 mb-6">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Search by borrower name or manuscript title..."
                class="w-full pl-10 pr-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all text-sm">
        </div>
    </div>

    {{-- Loans to Return --}}
    <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl shadow-xl border-2 border-[#D4AF37]/30 overflow-hidden">

        {{-- Info Banner --}}
        <div class="px-6 py-4 bg-gradient-to-r from-[#D4AF37]/10 to-[#D4AF37]/5 border-b-2 border-[#D4AF37]/20">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-[#D4AF37]/20 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-serif font-bold text-[#2D1B4E]">
                        📜 Manuscripts Currently in Circulation
                    </p>
                    <p class="text-xs text-[#5C4B3A] font-serif italic">
                        These sacred texts await their return to the Library of Alexandria
                    </p>
                </div>
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
                                    <p class="font-serif font-bold text-[#2D1B4E] text-sm">{{ $loan->book->judul ?? '-' }}</p>
                                    <p class="text-xs text-[#C4A882] font-serif italic">{{ $loan->book->penulis ?? 'Unknown Author' }}</p>
                                </div>
                            </div>

                            {{-- Borrower --}}
                            <div class="flex items-center space-x-2 mb-2 ml-10">
                                <div class="w-6 h-6 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-full flex items-center justify-center border border-[#D4AF37]/30">
                                    <span class="text-[8px] font-serif font-bold text-[#D4AF37]">
                                        {{ strtoupper(substr($loan->user->name ?? 'U', 0, 1)) }}
                                    </span>
                                </div>
                                <p class="text-sm font-serif text-[#5C4B3A]">Borrower: {{ $loan->user->name ?? '-' }}</p>
                            </div>

                            {{-- Due Date --}}
                            <div class="ml-10">
                                <p class="text-xs font-serif inline-flex items-center space-x-1
                                    {{ $loan->tanggal_kembali < now() ? 'text-red-600 font-bold' : 'text-[#5C4B3A]' }}">
                                    <span>📅 Due: {{ $loan->tanggal_kembali->format('d M Y') }}</span>
                                    @if($loan->tanggal_kembali < now())
                                        <span class="px-2 py-0.5 text-[10px] bg-red-100 text-red-600 rounded-full border border-red-300 font-serif">
                                            ⚠️ OVERDUE
                                        </span>
                                    @endif
                                </p>
                                @php
                                    $daysOverdue = now()->diffInDays($loan->tanggal_kembali, false);
                                @endphp
                                @if($daysOverdue < 0)
                                    <p class="text-[10px] text-red-500 font-serif italic mt-0.5">
                                        Overdue by {{ abs($daysOverdue) }} day(s)
                                    </p>
                                @endif
                            </div>
                        </div>

                        <button wire:click="confirmReturn({{ $loan->id }})"
                            class="ml-2 px-4 py-2 bg-gradient-to-r from-[#D4AF37] to-[#B4941E] text-[#2D1B4E] text-xs font-serif font-bold rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all duration-300 flex-shrink-0 flex items-center space-x-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                            <span>Return</span>
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <div class="flex flex-col items-center space-y-4">
                        <div class="relative">
                            <div class="text-8xl opacity-20">🏛️</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#F5F0E8] via-transparent to-transparent"></div>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-[#2D1B4E]">All Manuscripts Are Safe</h3>
                        <p class="text-[#5C4B3A] font-serif italic max-w-md text-center">
                            "All borrowed scrolls have been returned. The library shelves are complete once more."
                        </p>
                        <div class="flex items-center space-x-2 text-[#D4AF37] mt-2">
                            <span>✦</span>
                            <span class="text-xl">⚜️</span>
                            <span>✦</span>
                        </div>
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
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📖 Manuscript</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📅 Borrow Date</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📅 Due Date</span>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">⏳ Status</span>
                        </th>
                        <th class="px-6 py-4 text-right">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">⚜️ Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D4AF37]/10">
                    @forelse($loans as $loan)
                        @php
                            $isOverdue = $loan->tanggal_kembali < now();
                            $daysOverdue = now()->diffInDays($loan->tanggal_kembali, false);
                            $daysRemaining = now()->diffInDays($loan->tanggal_kembali, false);
                        @endphp
                        <tr class="hover:bg-[#D4AF37]/5 transition-all duration-300 group {{ $isOverdue ? 'bg-red-50/50' : '' }}">

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
                                <div class="flex items-center space-x-1">
                                    <span class="text-sm font-serif text-[#2D1B4E]">
                                        {{ $loan->tanggal_pinjam->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="text-xs text-[#C4A882] font-serif italic">
                                    {{ $loan->tanggal_pinjam->diffForHumans() }}
                                </div>
                            </td>

                            {{-- Due Date --}}
                            <td class="px-6 py-4">
                                <span class="text-sm font-serif {{ $isOverdue ? 'text-red-600 font-bold' : 'text-[#2D1B4E]' }}">
                                    {{ $loan->tanggal_kembali->format('d M Y') }}
                                </span>
                                @if($isOverdue)
                                    <span class="ml-2 inline-flex items-center space-x-1 px-2 py-0.5 text-xs font-serif font-bold bg-red-100 text-red-600 rounded-full border border-red-300">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>OVERDUE</span>
                                    </span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4">
                                @if($isOverdue)
                                    <div class="flex flex-col">
                                        <span class="inline-flex items-center space-x-1 text-sm font-serif text-red-600 font-bold">
                                            <span>⚠️ Overdue</span>
                                        </span>
                                        <span class="text-xs text-red-500 font-serif italic">
                                            {{ abs($daysOverdue) }} day(s) late
                                        </span>
                                    </div>
                                @else
                                    <div class="flex flex-col">
                                        <span class="inline-flex items-center space-x-1 text-sm font-serif text-green-600">
                                            <span>✅ On Time</span>
                                        </span>
                                        <span class="text-xs text-green-500 font-serif italic">
                                            @if($daysRemaining == 0)
                                                Due today
                                            @elseif($daysRemaining < 0)
                                                {{ abs($daysRemaining) }} day(s) remaining
                                            @else
                                                {{ $daysRemaining }} day(s) remaining
                                            @endif
                                        </span>
                                    </div>
                                @endif
                            </td>

                            {{-- Action Button --}}
                            <td class="px-6 py-4 text-right">
                                <button wire:click="confirmReturn({{ $loan->id }})"
                                    class="group/btn inline-flex items-center space-x-1.5 px-4 py-2 text-xs font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover/btn:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                    </svg>
                                    <span>Return to Library</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative">
                                        <div class="text-8xl opacity-20">🏛️</div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#F5F0E8] via-transparent to-transparent"></div>
                                    </div>
                                    <h3 class="text-2xl font-serif font-bold text-[#2D1B4E]">All Manuscripts Are Safe</h3>
                                    <p class="text-[#5C4B3A] font-serif italic max-w-md text-center">
                                        "All borrowed scrolls have been returned. The library shelves are complete once more."
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

        {{-- Pagination --}}
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

    {{-- Modal Konfirmasi --}}
    @if($showModal && $selectedLoan)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeModal"></div>

                <div class="relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-xl border-2 border-[#D4AF37] shadow-2xl shadow-[#D4AF37]/20 max-w-md w-full p-8 z-10 transform transition-all animate-fadeIn">

                    {{-- Success Icon --}}
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-[#D4AF37]/40">
                            <svg class="w-10 h-10 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-[#2D1B4E]">Confirm Return</h3>
                        <p class="text-sm text-[#5C4B3A] font-serif italic mt-1">
                            Return this manuscript to the Library of Alexandria
                        </p>

                        {{-- Divider --}}
                        <div class="flex items-center justify-center my-4">
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
                            <span class="px-3 text-[#D4AF37] text-sm">⚜️</span>
                            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
                        </div>
                    </div>

                    {{-- Loan Details --}}
                    <div class="bg-white/50 rounded-lg border-2 border-[#D4AF37]/10 p-4 mb-6 space-y-3">
                        {{-- Book --}}
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-14 rounded-sm overflow-hidden border border-[#D4AF37]/30 shadow-md flex-shrink-0">
                                @if(!empty($selectedLoan->book->image) && Storage::disk('public')->exists($selectedLoan->book->image))
                                    <img src="{{ asset('storage/' . $selectedLoan->book->image) }}"
                                         alt="Cover"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#D4AF37]/20 to-[#2D1B4E]/20 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-serif font-bold text-[#2D1B4E] truncate">
                                    {{ $selectedLoan->book->judul ?? '-' }}
                                </p>
                                <p class="text-xs text-[#C4A882] font-serif italic">
                                    {{ $selectedLoan->book->penulis ?? 'Unknown Author' }}
                                </p>
                            </div>
                        </div>

                        {{-- Borrower --}}
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-full flex items-center justify-center border border-[#D4AF37]/30 flex-shrink-0">
                                <span class="text-xs font-serif font-bold text-[#D4AF37]">
                                    {{ strtoupper(substr($selectedLoan->user->name ?? 'U', 0, 1)) }}
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-serif font-bold text-[#2D1B4E]">
                                    {{ $selectedLoan->user->name ?? '-' }}
                                </p>
                                <p class="text-xs text-[#C4A882] font-serif italic">
                                    {{ $selectedLoan->user->email ?? '' }}
                                </p>
                            </div>
                        </div>

                        {{-- Dates --}}
                        <div class="grid grid-cols-2 gap-3 pt-2 border-t border-[#D4AF37]/10">
                            <div>
                                <p class="text-[10px] font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">Borrow Date</p>
                                <p class="text-sm font-serif text-[#2D1B4E]">
                                    {{ $selectedLoan->tanggal_pinjam->format('d M Y') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[10px] font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">Due Date</p>
                                <p class="text-sm font-serif {{ $selectedLoan->tanggal_kembali < now() ? 'text-red-600 font-bold' : 'text-[#2D1B4E]' }}">
                                    {{ $selectedLoan->tanggal_kembali->format('d M Y') }}
                                    @if($selectedLoan->tanggal_kembali < now())
                                        <span class="text-[10px] text-red-500">(Overdue)</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Question --}}
                    <p class="text-[#5C4B3A] font-serif italic text-center text-sm mb-6">
                        Has this manuscript been returned to the library?
                    </p>

                    {{-- Action Buttons --}}
                    <div class="flex justify-center gap-3">
                        <button wire:click="closeModal"
                            class="px-6 py-2.5 text-sm font-serif text-[#5C4B3A] bg-[#E8E0D0] border-2 border-[#D4AF37]/20 rounded-lg hover:bg-[#D4AF37]/10 transition-all">
                            Cancel
                        </button>
                        <button wire:click="processReturn"
                            class="px-6 py-2.5 text-sm font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all flex items-center space-x-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Confirm Return</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


