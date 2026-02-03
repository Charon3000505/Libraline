<div>
    {{-- Header --}}
    <div class="mb-6 sm:mb-8">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Pengembalian Buku</h2>
        <p class="text-gray-600 mt-1 text-sm">Proses pengembalian buku yang sedang dipinjam</p>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">{{ session('message') }}</div>
    @endif

    {{-- Search --}}
    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" 
            placeholder="Cari nama peminjam atau judul buku..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm">
    </div>

    {{-- Loans to Return --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-4 sm:px-6 py-3 bg-yellow-50 border-b border-yellow-200">
            <p class="text-sm font-medium text-yellow-800">
                📚 Daftar buku yang sedang dipinjam dan perlu dikembalikan
            </p>
        </div>

        {{-- Mobile: Card View --}}
        <div class="block sm:hidden divide-y divide-gray-200">
            @forelse($loans as $loan)
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div class="min-w-0 flex-1">
                            <p class="font-medium text-gray-900">{{ $loan->book->judul ?? '-' }}</p>
                            <p class="text-sm text-gray-500">Peminjam: {{ $loan->user->name ?? '-' }}</p>
                            <p class="text-xs mt-1 {{ $loan->tanggal_kembali < now() ? 'text-red-600 font-medium' : 'text-gray-400' }}">
                                Batas: {{ $loan->tanggal_kembali->format('d M Y') }}
                                @if($loan->tanggal_kembali < now())
                                    (TERLAMBAT)
                                @endif
                            </p>
                        </div>
                        <button wire:click="confirmReturn({{ $loan->id }})" 
                            class="ml-2 px-3 py-1.5 bg-green-600 text-white text-xs rounded-lg hover:bg-green-700 flex-shrink-0">
                            Kembalikan
                        </button>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">
                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p>Tidak ada buku yang perlu dikembalikan.</p>
                </div>
            @endforelse
        </div>

        {{-- Desktop: Table View --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peminjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Pinjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Batas Kembali</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($loans as $loan)
                        <tr class="hover:bg-gray-50 {{ $loan->tanggal_kembali < now() ? 'bg-red-50' : '' }}">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $loan->user->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->book->judul ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->tanggal_pinjam->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="{{ $loan->tanggal_kembali < now() ? 'text-red-600 font-medium' : 'text-gray-600' }}">
                                    {{ $loan->tanggal_kembali->format('d M Y') }}
                                </span>
                                @if($loan->tanggal_kembali < now())
                                    <span class="ml-2 px-2 py-0.5 text-xs bg-red-100 text-red-600 rounded-full">TERLAMBAT</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="confirmReturn({{ $loan->id }})" 
                                    class="px-3 py-1.5 bg-green-600 text-white text-xs rounded-lg hover:bg-green-700">
                                    Kembalikan
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Tidak ada buku yang perlu dikembalikan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-4 py-3 border-t border-gray-200">
            {{ $loans->links() }}
        </div>
    </div>

    {{-- Modal Konfirmasi --}}
    @if($showModal && $selectedLoan)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75" wire:click="closeModal"></div>
                
                <div class="relative bg-white rounded-xl shadow-xl max-w-sm w-full p-6 z-10">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Konfirmasi Pengembalian</h3>
                        
                        <div class="bg-gray-50 rounded-lg p-3 mb-4 text-left">
                            <p class="text-sm text-gray-600"><strong>Buku:</strong> {{ $selectedLoan->book->judul ?? '-' }}</p>
                            <p class="text-sm text-gray-600"><strong>Peminjam:</strong> {{ $selectedLoan->user->name ?? '-' }}</p>
                            <p class="text-sm text-gray-600"><strong>Tgl Pinjam:</strong> {{ $selectedLoan->tanggal_pinjam->format('d M Y') }}</p>
                        </div>

                        <p class="text-gray-600 text-sm mb-6">Apakah buku ini sudah dikembalikan?</p>
                        
                        <div class="flex justify-center gap-3">
                            <button wire:click="closeModal" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 text-sm">
                                Batal
                            </button>
                            <button wire:click="processReturn" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">
                                Ya, Sudah Dikembalikan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
