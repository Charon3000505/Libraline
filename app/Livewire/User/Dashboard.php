<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Loan;

class Dashboard extends Component
{
    public int $bukuDipinjam = 0;
    public $riwayatPeminjaman;

    public function mount(): void
    {
        $user = auth()->user();
        
        // Hitung buku yang sedang dipinjam user ini
        $this->bukuDipinjam = Loan::where('user_id', $user->id)
            ->where('status', 'dipinjam')
            ->count();
        
        // Ambil riwayat peminjaman user
        $this->riwayatPeminjaman = Loan::with('book')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($loan) {
                return [
                    'judul_buku' => $loan->book->judul ?? '-',
                    'tanggal_pinjam' => $loan->tanggal_pinjam->format('Y-m-d'),
                    'tanggal_kembali' => $loan->tanggal_kembali?->format('Y-m-d'),
                    'status' => $loan->status,
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.user.dashboard')
            ->layout('layouts.app', ['title' => 'Dashboard']);
    }
}

