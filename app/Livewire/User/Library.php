<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Book;
use App\Models\Loan;

class Library extends Component
{
    public $books;
    public $myLoans;
    public $history;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = auth()->id();

        $this->books = Book::latest()->take(8)->get();

        $this->myLoans = Loan::with('book')
            ->where('user_id', $userId)
            ->whereNull('returned_at')
            ->latest()
            ->get();

        $this->history = Loan::with('book')
            ->where('user_id', $userId)
            ->whereNotNull('returned_at')
            ->latest()
            ->take(5)
            ->get();
    }

    public function borrow($bookId)
    {
        $book = Book::find($bookId);

        if (!$book) return;

        // 🚫 CEK SUDAH PINJAM BELUM
        $alreadyBorrowed = Loan::where('user_id', auth()->id())
            ->where('book_id', $bookId)
            ->whereNull('returned_at')
            ->exists();

        if ($alreadyBorrowed) {
            session()->flash('error', 'Kamu sudah meminjam buku ini!');
            return;
        }

        // 🚫 CEK STOK
        if ($book->stok <= 0) {
            session()->flash('error', 'Stok habis!');
            return;
        }

        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $bookId,
            'borrowed_at' => now()
        ]);

        $book->decrement('stok');

        session()->flash('success', 'Buku berhasil dipinjam!');

        $this->loadData();
    }

    public function returnBook($loanId)
    {
        $loan = Loan::with('book')->find($loanId);

        if (!$loan) return;

        // 🚫 PASTIKAN MILIK USER
        if ($loan->user_id !== auth()->id()) {
            abort(403);
        }

        // 🚫 JANGAN DOUBLE RETURN
        if ($loan->returned_at) {
            session()->flash('error', 'Buku sudah dikembalikan!');
            return;
        }

        $loan->update([
            'returned_at' => now()
        ]);

        $loan->book->increment('stok');

        session()->flash('success', 'Buku berhasil dikembalikan!');

        $this->loadData();
    }

    public function render()
    {
        return view('livewire.user.library')
            ->layout('layouts.library');
    }
}
