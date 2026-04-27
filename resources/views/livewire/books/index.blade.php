<div class="p-6 bg-[#F5F0E8] min-h-screen bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 5 L55 30 L30 55 L5 30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5" opacity="0.03"/%3E%3C/svg%3E')]">

    {{-- HEADER --}}
    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="relative">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-lg shadow-[#D4AF37]/20">
                    <svg class="w-6 h-6 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-serif font-bold text-[#2D1B4E] tracking-wide">Sacred Manuscripts</h1>
                    <p class="text-sm text-[#5C4B3A] font-serif italic">~ Koleksi Kitab Perpustakaan ~</p>
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
                <span>Add New Manuscript</span>
            </span>
        </button>
    </div>

    {{-- FLASH MESSAGE --}}
    @if(session()->has('message'))
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

    {{-- SEARCH & FILTER --}}
    <div class="mb-6 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" wire:model.live="search"
                class="w-full pl-10 pr-4 py-3 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all"
                placeholder="Search manuscripts by title or author...">
        </div>

        <select wire:model.live="kategori"
            class="px-4 py-3 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all cursor-pointer">
            <option value="">📚 All Categories</option>
            @foreach($kategoris as $k)
                <option value="{{ $k }}">📖 {{ $k }}</option>
            @endforeach
        </select>
    </div>

    {{-- TABLE - KATALOG PERPUSTAKAAN --}}
    <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] border-2 border-[#D4AF37]/30 rounded-lg overflow-hidden shadow-xl">

        {{-- Table Header --}}
        <div class="bg-gradient-to-r from-[#2D1B4E] via-[#3D2B5E] to-[#4A3568] px-6 py-4 border-b-2 border-[#D4AF37]">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="text-[#D4AF37] text-lg">📜</span>
                    <h3 class="text-lg font-serif font-bold text-[#D4AF37]">Library Catalog</h3>
                </div>
                <div class="text-[#C4A882] text-sm font-serif italic">{{ $books->total() }} manuscripts in collection</div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#E8E0D0]/50 border-b-2 border-[#D4AF37]/10">
                        <th class="p-4 text-left w-[40%]">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📖 Manuscript</span>
                        </th>
                        <th class="p-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">✍️ Author</span>
                        </th>
                        <th class="p-4 text-left">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">🏷️ Category</span>
                        </th>
                        <th class="p-4 text-center">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">📦 Stock</span>
                        </th>
                        <th class="p-4 text-right">
                            <span class="text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider">⚜️ Actions</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#D4AF37]/10">
                    @forelse($books as $book)
                        <tr class="hover:bg-[#D4AF37]/5 transition-all duration-300 group">
                            {{-- BOOK COVER + INFO --}}
                            <td class="p-4">
                                <div class="flex items-center space-x-4">
                                    {{-- BOOK COVER THUMBNAIL --}}
                                    <div class="flex-shrink-0 relative">
                                        <div class="w-[60px] h-[85px] rounded-sm overflow-hidden shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-0.5
                                            @if(!empty($book->image) && Storage::disk('public')->exists($book->image))
                                                border-2 border-[#D4AF37]/40 group-hover:border-[#D4AF37]
                                            @else
                                                border-2 border-dashed border-[#D4AF37]/20
                                            @endif">

                                            @if(!empty($book->image) && Storage::disk('public')->exists($book->image))
                                                {{-- REAL BOOK COVER --}}
                                                <img src="{{ asset('storage/' . $book->image) }}"
                                                     alt="Cover of {{ $book->judul }}"
                                                     class="w-full h-full object-cover"
                                                     loading="lazy"
                                                     onerror="this.src='https://via.placeholder.com/100x150/D4AF37/2D1B4E?text=No+Cover'; this.classList.add('opacity-50');">

                                                {{-- Overlay effect on hover --}}
                                                <div class="absolute inset-0 bg-gradient-to-t from-[#2D1B4E]/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-1">
                                                    <span class="text-[#D4AF37] text-[8px] font-serif font-bold">View Cover</span>
                                                </div>
                                            @else
                                                {{-- DEFAULT COVER / NO COVER --}}
                                                <div class="w-full h-full bg-gradient-to-br from-[#D4AF37]/10 via-[#D4AF37]/5 to-[#2D1B4E]/10 flex flex-col items-center justify-center p-1">
                                                    <svg class="w-5 h-5 text-[#D4AF37]/50 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                    <span class="text-[8px] text-[#C4A882] text-center font-serif leading-tight">No Cover</span>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Spine effect --}}
                                        <div class="absolute left-0 top-1 bottom-1 w-[2px] bg-gradient-to-r from-[#D4AF37]/30 to-transparent"></div>
                                    </div>

                                    {{-- BOOK DETAILS --}}
                                    <div class="min-w-0 flex-1">
                                        <h4 class="font-serif font-bold text-[#2D1B4E] group-hover:text-[#B4941E] transition-colors text-sm leading-tight">
                                            {{ $book->judul }}
                                        </h4>

                                        {{-- Cover status badge --}}
                                        <div class="mt-1">
                                            @if(!empty($book->image) && Storage::disk('public')->exists($book->image))
                                                <span class="inline-flex items-center space-x-1 text-[10px] text-[#5C4B3A] font-serif italic">
                                                    <svg class="w-3 h-3 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span>Has cover</span>
                                                </span>
                                            @else
                                                <span class="inline-flex items-center space-x-1 text-[10px] text-[#C4A882] font-serif italic">
                                                    <svg class="w-3 h-3 text-[#C4A882]" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span>No cover</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="font-serif text-[#2D1B4E] text-sm">{{ $book->penulis }}</div>
                            </td>

                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-serif font-medium bg-[#D4AF37]/10 text-[#2D1B4E] border border-[#D4AF37]/30">
                                    {{ $book->kategori ?? 'Uncategorized' }}
                                </span>
                            </td>

                            <td class="p-4 text-center">
                                <span class="inline-flex items-center justify-center min-w-[2rem] h-8 rounded-full font-serif font-bold text-sm
                                    {{ $book->stok > 5 ? 'bg-green-100 text-green-800' : ($book->stok > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $book->stok }}
                                </span>
                            </td>

                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    @if(auth()->user()->role === 'admin')
                                        <button wire:click="editBook({{ $book->id }})"
                                            class="group/btn relative px-3 py-1.5 text-xs font-serif font-medium text-[#D4AF37] bg-[#D4AF37]/10 border border-[#D4AF37]/30 rounded-md hover:bg-[#D4AF37] hover:text-[#2D1B4E] transition-all duration-300">
                                            <span class="flex items-center space-x-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                <span>Edit</span>
                                            </span>
                                        </button>

                                        <button wire:click="confirmDelete({{ $book->id }})"
                                            class="group/btn relative px-3 py-1.5 text-xs font-serif font-medium text-red-600 bg-red-50 border border-red-200 rounded-md hover:bg-red-600 hover:text-white transition-all duration-300">
                                            <span class="flex items-center space-x-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Delete</span>
                                            </span>
                                        </button>
                                    @else
                                        <button wire:click="pinjamBuku({{ $book->id }})"
                                            class="group/btn relative px-4 py-2 text-xs font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-md hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all duration-300">
                                            <span class="flex items-center space-x-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                <span>Borrow</span>
                                            </span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-12">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative">
                                        <div class="text-8xl opacity-20">📚</div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#F5F0E8] via-transparent to-transparent"></div>
                                    </div>
                                    <h3 class="text-2xl font-serif font-bold text-[#2D1B4E]">No Manuscripts Found</h3>
                                    <p class="text-[#5C4B3A] font-serif italic max-w-md text-center">
                                        "The library shelves await new wisdom. Add your first manuscript to begin this collection."
                                    </p>
                                    <div class="flex items-center space-x-2 text-[#D4AF37]">
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
                    Showing {{ $books->firstItem() ?? 0 }} - {{ $books->lastItem() ?? 0 }} of {{ $books->total() }} manuscripts
                </div>
                <div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL FORM - BOOK COVER UPLOAD EXPERIENCE --}}
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 backdrop-blur-sm p-4">
            <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] p-8 rounded-lg border-2 border-[#D4AF37] w-full max-w-lg shadow-2xl shadow-[#D4AF37]/20 transform transition-all max-h-[90vh] overflow-y-auto">

                {{-- Modal Header --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-[#2D1B4E]">
                                {{ $isEdit ? 'Edit Manuscript' : 'Add New Manuscript' }}
                            </h2>
                            <p class="text-xs text-[#C4A882] font-serif italic">Complete the manuscript details</p>
                        </div>
                    </div>
                    <button wire:click="closeModal" class="text-[#C4A882] hover:text-[#2D1B4E] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="save" class="space-y-5">

                    {{-- ========== BOOK COVER SECTION ========== --}}
                    <div class="bg-white/50 rounded-lg p-5 border-2 border-dashed border-[#D4AF37]/20 hover:border-[#D4AF37]/40 transition-all">

                        {{-- Section Header --}}
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-md flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-serif font-bold text-[#2D1B4E]">📚 Book Cover</h3>
                                <p class="text-[10px] text-[#C4A882] font-serif italic">Upload the front cover of this manuscript</p>
                            </div>
                        </div>

                        {{-- COVER PREVIEW AREA --}}
                        <div class="flex justify-center mb-4">
                            @if($image)
                                {{-- NEW COVER PREVIEW --}}
                                <div class="relative group/cover">
                                    <div class="w-[120px] h-[170px] rounded-sm overflow-hidden shadow-2xl border-2 border-[#D4AF37] transform group-hover/cover:scale-105 transition-transform duration-300">
                                        <img src="{{ $image->temporaryUrl() }}"
                                             alt="New book cover preview"
                                             class="w-full h-full object-cover">

                                        {{-- Shine effect --}}
                                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent opacity-0 group-hover/cover:opacity-100 transition-opacity"></div>
                                    </div>

                                    {{-- Book spine --}}
                                    <div class="absolute left-0 top-2 bottom-2 w-[3px] bg-gradient-to-r from-[#D4AF37]/50 to-transparent rounded-l-sm"></div>

                                    {{-- Label --}}
                                    <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-center">
                                        <span class="text-[10px] text-[#D4AF37] font-serif font-bold bg-[#2D1B4E] px-2 py-0.5 rounded-full border border-[#D4AF37]/30">
                                            New Cover Preview
                                        </span>
                                    </div>
                                </div>

                            @elseif($isEdit && !empty($book->image) && Storage::disk('public')->exists($book->image))
                                {{-- EXISTING COVER --}}
                                <div class="relative group/cover">
                                    <div class="w-[120px] h-[170px] rounded-sm overflow-hidden shadow-2xl border-2 border-[#D4AF37]/50 group-hover/cover:border-[#D4AF37] transform group-hover/cover:scale-105 transition-all duration-300">
                                        <img src="{{ asset('storage/' . $book->image) }}"
                                             alt="Current cover of {{ $book->judul }}"
                                             class="w-full h-full object-cover"
                                             onerror="this.src='https://via.placeholder.com/120x170/D4AF37/2D1B4E?text=No+Cover';">

                                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent opacity-0 group-hover/cover:opacity-100 transition-opacity"></div>
                                    </div>

                                    <div class="absolute left-0 top-2 bottom-2 w-[3px] bg-gradient-to-r from-[#D4AF37]/30 to-transparent rounded-l-sm"></div>

                                    <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-center">
                                        <span class="text-[10px] text-[#5C4B3A] font-serif italic bg-[#E8E0D0] px-2 py-0.5 rounded-full border border-[#D4AF37]/20">
                                            Current Cover
                                        </span>
                                    </div>
                                </div>

                            @else
                                {{-- NO COVER PLACEHOLDER --}}
                                <div class="text-center">
                                    <div class="w-[120px] h-[170px] mx-auto rounded-sm border-2 border-dashed border-[#D4AF37]/30 bg-gradient-to-br from-[#D4AF37]/5 to-[#2D1B4E]/5 flex flex-col items-center justify-center p-3">
                                        <svg class="w-10 h-10 text-[#D4AF37]/30 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        <span class="text-[10px] text-[#C4A882] font-serif italic text-center leading-tight">No cover uploaded yet</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- UPLOAD BUTTON --}}
                        <div class="relative">
                            <label class="block text-[10px] font-serif font-bold text-[#5C4B3A] uppercase tracking-wider mb-2">
                                {{ $isEdit ? 'Change Cover' : 'Upload Cover' }}
                            </label>

                            <div class="relative group/upload">
                                <input type="file" wire:model="image"
                                    class="w-full px-4 py-3 bg-white border-2 border-dashed border-[#D4AF37]/30 rounded-lg font-serif text-sm text-[#5C4B3A] cursor-pointer
                                    file:mr-4 file:py-2 file:px-5 file:rounded-md file:border file:border-[#D4AF37]/30
                                    file:text-sm file:font-serif file:font-bold
                                    file:bg-gradient-to-r file:from-[#D4AF37]/20 file:to-[#B4941E]/20
                                    file:text-[#2D1B4E]
                                    hover:file:bg-gradient-to-r hover:file:from-[#D4AF37]/30 hover:file:to-[#B4941E]/30
                                    hover:border-[#D4AF37]/50
                                    transition-all duration-300
                                    focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20"
                                    accept="image/*">
                            </div>

                            <div class="mt-2 flex items-start space-x-1">
                                <svg class="w-3 h-3 text-[#C4A882] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-[10px] text-[#C4A882] font-serif italic leading-tight">
                                    Recommended: Portrait orientation, max 2MB. Formats: JPG, PNG, WebP
                                </p>
                            </div>

                            @error('image')
                                <div class="mt-2 flex items-center space-x-1 text-red-500">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-xs font-serif">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Loading indicator --}}
                        <div wire:loading wire:target="image" class="mt-3">
                            <div class="flex items-center space-x-2 text-[#D4AF37] bg-[#D4AF37]/5 rounded-lg p-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-xs font-serif">Processing cover image...</span>
                            </div>
                        </div>
                    </div>

                    {{-- ========== MANUSCRIPT DETAILS ========== --}}
                    <div class="space-y-4">
                        {{-- Title Input --}}
                        <div>
                            <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                📖 Manuscript Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="judul"
                                class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all"
                                placeholder="Enter the sacred title...">
                            @error('judul') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                        </div>

                        {{-- Author Input --}}
                        <div>
                            <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                ✍️ Author <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="penulis"
                                class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all"
                                placeholder="Who wrote this manuscript?">
                            @error('penulis') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                        </div>

                        {{-- Stock Input --}}
                        <div>
                            <label class="block text-sm font-serif font-bold text-[#2D1B4E] mb-1">
                                📦 Stock <span class="text-red-500">*</span>
                            </label>
                            <input type="number" wire:model="stok"
                                class="w-full px-4 py-2.5 bg-white border-2 border-[#D4AF37]/20 rounded-lg font-serif text-[#2D1B4E] placeholder-[#C4A882] focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/30 transition-all"
                                placeholder="How many copies?"
                                min="0">
                            @error('stok') <span class="text-red-500 text-xs font-serif">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-3 pt-4 border-t-2 border-[#D4AF37]/10">
                        <button type="button" wire:click="closeModal"
                            class="px-6 py-2.5 text-sm font-serif text-[#5C4B3A] bg-[#E8E0D0] border-2 border-[#D4AF37]/20 rounded-lg hover:bg-[#D4AF37]/10 transition-all">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 text-sm font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all">
                            {{ $isEdit ? 'Update Manuscript' : 'Add to Library' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- DELETE CONFIRMATION MODAL --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 backdrop-blur-sm p-4">
            <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] p-8 rounded-lg border-2 border-red-300 shadow-2xl max-w-md w-full transform transition-all">

                <div class="text-center">
                    <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>

                    <h3 class="text-xl font-serif font-bold text-[#2D1B4E] mb-2">Burn This Manuscript?</h3>
                    <p class="text-[#5C4B3A] font-serif italic mb-6">
                        This action cannot be undone. The knowledge will be lost forever from the Library of Alexandria.
                    </p>

                    <div class="flex justify-center gap-3">
                        <button wire:click="$set('showDeleteModal', false)"
                            class="px-6 py-2.5 text-sm font-serif text-[#5C4B3A] bg-[#E8E0D0] border-2 border-[#D4AF37]/20 rounded-lg hover:bg-[#D4AF37]/10 transition-all">
                            Preserve It
                        </button>
                        <button wire:click="deleteBook"
                            class="px-6 py-2.5 text-sm font-serif font-bold text-white bg-gradient-to-r from-red-600 to-red-700 rounded-lg hover:shadow-lg hover:shadow-red-500/30 transform hover:-translate-y-0.5 transition-all">
                            Burn Manuscript
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>


