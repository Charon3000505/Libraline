<div class="min-h-screen bg-[#F5F0E8] bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 5 L55 30 L30 55 L5 30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5" opacity="0.05"/%3E%3C/svg%3E')]">
    <!-- Header dengan Ornamen Yunani -->
    <div class="relative bg-gradient-to-b from-[#2D1B4E] via-[#3D2B5E] to-[#4A3568] border-b-4 border-[#D4AF37] shadow-2xl">
        <!-- Pola Meander Yunani -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 20 L10 20 L10 10 L20 10 L20 20 L30 20 L30 10 L40 10 L40 20 L40 30 L30 30 L30 20 L20 20 L20 30 L10 30 L10 20 L0 20 Z" fill="%23D4AF37" opacity="0.3"/%3E%3C/svg%3E')]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Kolom Ikonik -->
                    <div class="hidden sm:block text-[#D4AF37] text-4xl opacity-80">🏛️</div>
                    <div>
                        <h1 class="text-4xl font-serif font-bold text-[#D4AF37] tracking-wide" style="font-family: 'Georgia', 'Times New Roman', serif;">
                            Bibliotheca Alexandrina
                        </h1>
                        <p class="text-[#C4A882] text-sm mt-1 font-serif italic">~ Rumah Para Pencari Kebijaksanaan ~</p>
                    </div>
                </div>

                <!-- Hiasan Karangan Bunga Laurel -->
                <div class="hidden lg:flex items-center space-x-2 text-[#D4AF37] opacity-60">
                    <span>🌿</span>
                    <span class="text-2xl">⚜️</span>
                    <span>🌿</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Royal Info Panel - Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Active Loans Card -->
            <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg shadow-lg border-2 border-[#D4AF37]/30 hover:border-[#D4AF37]/60 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20">
                <!-- Ornamen Sudut -->
                <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/40 rounded-tl-lg"></div>
                <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/40 rounded-tr-lg"></div>
                <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/40 rounded-bl-lg"></div>
                <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/40 rounded-br-lg"></div>

                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-[#2D1B4E] to-[#4A3568] rounded-lg shadow-md group-hover:shadow-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-8 h-8 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                            </svg>
                        </div>
                        <div class="text-[#D4AF37] opacity-40 text-3xl font-serif">I</div>
                    </div>
                    <h3 class="text-sm font-serif text-[#5C4B3A] uppercase tracking-wider mb-2">Active Loans</h3>
                    <p class="text-4xl font-bold text-[#2D1B4E] font-serif">{{ $activeLoans ?? 0 }}</p>
                    <div class="mt-3 h-0.5 bg-gradient-to-r from-[#D4AF37] to-transparent w-1/2 group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>

            <!-- Total Books Card -->
            <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg shadow-lg border-2 border-[#D4AF37]/30 hover:border-[#D4AF37]/60 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20">
                <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/40 rounded-tl-lg"></div>
                <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/40 rounded-tr-lg"></div>
                <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/40 rounded-bl-lg"></div>
                <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/40 rounded-br-lg"></div>

                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-[#2D1B4E] to-[#4A3568] rounded-lg shadow-md group-hover:shadow-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-8 h-8 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                            </svg>
                        </div>
                        <div class="text-[#D4AF37] opacity-40 text-3xl font-serif">II</div>
                    </div>
                    <h3 class="text-sm font-serif text-[#5C4B3A] uppercase tracking-wider mb-2">Total Collection</h3>
                    <p class="text-4xl font-bold text-[#2D1B4E] font-serif">{{ $totalBooks ?? 0 }}</p>
                    <div class="mt-3 h-0.5 bg-gradient-to-r from-[#D4AF37] to-transparent w-1/2 group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>

            <!-- Loan History Card -->
            <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg shadow-lg border-2 border-[#D4AF37]/30 hover:border-[#D4AF37]/60 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20">
                <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/40 rounded-tl-lg"></div>
                <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/40 rounded-tr-lg"></div>
                <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/40 rounded-bl-lg"></div>
                <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/40 rounded-br-lg"></div>

                <div class="relative p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-[#2D1B4E] to-[#4A3568] rounded-lg shadow-md group-hover:shadow-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-8 h-8 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm1 2a1 1 0 000 2h10a1 1 0 100-2H5zm0 4a1 1 0 100 2h10a1 1 0 100-2H5zm0 4a1 1 0 100 2h6a1 1 0 100-2H5z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-[#D4AF37] opacity-40 text-3xl font-serif">III</div>
                    </div>
                    <h3 class="text-sm font-serif text-[#5C4B3A] uppercase tracking-wider mb-2">Loan History</h3>
                    <p class="text-4xl font-bold text-[#2D1B4E] font-serif">{{ $loanHistory ?? 0 }}</p>
                    <div class="mt-3 h-0.5 bg-gradient-to-r from-[#D4AF37] to-transparent w-1/2 group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>
        </div>

        <!-- Divider Ornamen Yunani -->
        <div class="flex items-center justify-center my-8">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent"></div>
            <div class="px-4 text-[#D4AF37] text-2xl">⚜️</div>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent"></div>
        </div>

        <!-- Menu Kerajaan - Aksi Cepat -->
        <div class="mb-8">
            <h2 class="text-2xl font-serif font-bold text-[#2D1B4E] mb-6 flex items-center">
                <span class="text-[#D4AF37] mr-3 text-3xl">❦</span>
                Royal Actions
                <span class="text-[#D4AF37] ml-3 text-3xl">❦</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Browse Books -->
                <a href="{{ route('books') }}"
                   class="group relative bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] rounded-lg p-6 border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Ccircle cx="10" cy="10" r="1" fill="%23D4AF37"/%3E%3C/svg%3E')]"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="p-3 bg-[#D4AF37]/20 rounded-full group-hover:bg-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-[#D4AF37] font-serif font-bold text-lg">Browse Collection</h3>
                            <p class="text-[#C4A882] text-sm font-serif italic">Explore ancient manuscripts</p>
                        </div>
                    </div>
                </a>

                <!-- Active Loans -->
                <a href="{{ route('loans') }}"
                   class="group relative bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] rounded-lg p-6 border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Ccircle cx="10" cy="10" r="1" fill="%23D4AF37"/%3E%3C/svg%3E')]"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="p-3 bg-[#D4AF37]/20 rounded-full group-hover:bg-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-[#D4AF37] font-serif font-bold text-lg">Manage Loans</h3>
                            <p class="text-[#C4A882] text-sm font-serif italic">View active borrowings</p>
                        </div>
                    </div>
                </a>

                <!-- Returns -->
                <a href="{{ route('returns') }}"
                   class="group relative bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] rounded-lg p-6 border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Ccircle cx="10" cy="10" r="1" fill="%23D4AF37"/%3E%3C/svg%3E')]"></div>
                    <div class="relative flex items-center space-x-4">
                        <div class="p-3 bg-[#D4AF37]/20 rounded-full group-hover:bg-[#D4AF37]/30 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-[#D4AF37] font-serif font-bold text-lg">Return Books</h3>
                            <p class="text-[#C4A882] text-sm font-serif italic">Process book returns</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Divider Ornamen Yunani -->
        <div class="flex items-center justify-center my-8">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent"></div>
            <div class="px-4 text-[#2D1B4E] text-xl font-serif">📜</div>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent"></div>
        </div>

        <!-- Table seperti Scroll Kuno -->
        @if(isset($activeLoansList) && count($activeLoansList) > 0)
        <div class="mb-8">
            <h2 class="text-2xl font-serif font-bold text-[#2D1B4E] mb-6 flex items-center">
                <span class="text-[#D4AF37] mr-3">📜</span>
                Active Borrowings
            </h2>

            <div class="bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg shadow-xl border-2 border-[#D4AF37]/30 overflow-hidden">
                <!-- Header ala Scroll -->
                <div class="bg-gradient-to-r from-[#2D1B4E] via-[#3D2B5E] to-[#4A3568] px-6 py-4 border-b-2 border-[#D4AF37]">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="text-[#D4AF37] text-lg">📜</span>
                            <h3 class="text-lg font-serif font-bold text-[#D4AF37]">Loan Records</h3>
                        </div>
                        <div class="text-[#C4A882] text-sm font-serif italic">{{ count($activeLoansList) }} Active</div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#D4AF37]/20">
                        <thead class="bg-[#E8E0D0]/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider border-b border-[#D4AF37]/20">Book</th>
                                <th class="px-6 py-4 text-left text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider border-b border-[#D4AF37]/20">Borrower</th>
                                <th class="px-6 py-4 text-left text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider border-b border-[#D4AF37]/20">Borrow Date</th>
                                <th class="px-6 py-4 text-left text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider border-b border-[#D4AF37]/20">Due Date</th>
                                <th class="px-6 py-4 text-left text-xs font-serif font-bold text-[#5C4B3A] uppercase tracking-wider border-b border-[#D4AF37]/20">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#D4AF37]/10">
                            @foreach($activeLoansList as $loan)
                            <tr class="hover:bg-[#D4AF37]/5 transition-all duration-300 cursor-pointer group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-full flex items-center justify-center shadow-md group-hover:shadow-lg transition-all">
                                            <span class="text-[#2D1B4E] font-serif font-bold text-sm">📖</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-serif font-bold text-[#2D1B4E] group-hover:text-[#D4AF37] transition-colors">
                                                {{ $loan->book->judul ?? 'Unknown Book' }}
                                            </div>
                                            <div class="text-xs text-[#5C4B3A] font-serif italic">
                                                {{ $loan->book->penulis ?? 'Anonymous' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-serif text-[#2D1B4E]">{{ $loan->user->name ?? 'Unknown User' }}</div>
                                    <div class="text-xs text-[#5C4B3A] font-serif italic">{{ $loan->user->email ?? '' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-serif text-[#2D1B4E]">
                                        {{ isset($loan->tanggal_pinjam) ? \Carbon\Carbon::parse($loan->tanggal_pinjam)->format('d M Y') : '-' }}
                                    </div>
                                    <div class="text-xs text-[#5C4B3A] font-serif italic">
                                        {{ isset($loan->tanggal_pinjam) ? \Carbon\Carbon::parse($loan->tanggal_pinjam)->diffForHumans() : '' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-serif text-[#2D1B4E]">
                                        {{ isset($loan->tanggal_kembali) ? \Carbon\Carbon::parse($loan->tanggal_kembali)->format('d M Y') : '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $status = $loan->status ?? 'active';
                                        $statusColors = [
                                            'active' => 'bg-[#D4AF37]/20 text-[#2D1B4E] border-[#D4AF37]/40',
                                            'returned' => 'bg-green-100 text-green-800 border-green-300',
                                            'overdue' => 'bg-red-100 text-red-800 border-red-300'
                                        ];
                                        $statusLabels = [
                                            'active' => 'Active',
                                            'returned' => 'Returned',
                                            'overdue' => 'Overdue'
                                        ];
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-serif font-semibold rounded-full border {{ $statusColors[$status] ?? $statusColors['active'] }}">
                                        {{ $statusLabels[$status] ?? ucfirst($status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        <!-- Empty State Artistik -->
        @if(!isset($activeLoansList) || count($activeLoansList) == 0)
        <div class="text-center py-16">
            <div class="relative inline-block">
                <div class="text-8xl mb-8 opacity-30 transform hover:scale-110 transition-transform">📜</div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#F5F0E8] via-transparent to-transparent"></div>
            </div>

            <h3 class="text-3xl font-serif font-bold text-[#2D1B4E] mb-4">
                The Library Awaits
            </h3>

            <p class="text-lg text-[#5C4B3A] font-serif italic mb-6 max-w-2xl mx-auto">
                "A library is a temple of wisdom, where seekers of knowledge gather to enlighten their minds."
            </p>

            <div class="flex items-center justify-center space-x-2 text-[#D4AF37] mb-8">
                <span>✦</span>
                <span class="text-2xl">⚜️</span>
                <span>✦</span>
            </div>

            <a href="{{ route('books') }}"
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] text-[#D4AF37] font-serif font-bold rounded-lg border-2 border-[#D4AF37] hover:bg-[#D4AF37] hover:text-[#2D1B4E] transition-all duration-500 shadow-lg hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                <span class="mr-2 text-xl">📚</span>
                Explore the Collection
                <span class="ml-2 text-xl">✨</span>
            </a>

            <!-- Dekorasi Bawah -->
            <div class="mt-12 flex justify-center space-x-4 opacity-20">
                <div class="w-24 h-24 border-2 border-[#D4AF37] rounded-full flex items-center justify-center">
                    <span class="text-2xl">🏛️</span>
                </div>
                <div class="w-24 h-24 border-2 border-[#D4AF37] rounded-full flex items-center justify-center">
                    <span class="text-2xl">📖</span>
                </div>
                <div class="w-24 h-24 border-2 border-[#D4AF37] rounded-full flex items-center justify-center">
                    <span class="text-2xl">🕯️</span>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Footer dengan Motif Yunani -->
    <div class="mt-16 bg-gradient-to-r from-[#2D1B4E] via-[#3D2B5E] to-[#2D1B4E] border-t-2 border-[#D4AF37]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-[#D4AF37] text-2xl">⚜️</span>
                    <p class="text-[#C4A882] font-serif italic text-sm">
                        Bibliotheca Alexandrina - Eternal Legacy of Knowledge
                    </p>
                </div>
                <div class="flex items-center space-x-2 text-[#D4AF37]/40">
                    <span>🌿</span>
                    <span>🏛️</span>
                    <span>📜</span>
                    <span>🌿</span>
                </div>
            </div>
        </div>
    </div>
</div>

