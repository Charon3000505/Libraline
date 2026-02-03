<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\Books\Index as BooksIndex;
use App\Livewire\Loans\Index as LoansIndex;
use App\Livewire\Returns\Index as ReturnsIndex;

// Route halaman utama - redirect langsung ke login
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Dashboard - menggunakan Livewire component berdasarkan role
Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'user';
    
    if ($role === 'admin') {
        return app(AdminDashboard::class)();
    }
    
    return app(UserDashboard::class)();
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk halaman lainnya
Route::middleware('auth')->group(function () {
    // Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Data Buku - Livewire Component
    Route::get('/books', BooksIndex::class)->name('books');
    
    // Peminjaman - Livewire Component
    Route::get('/loans', LoansIndex::class)->name('loans');
    
    // Pengembalian - Livewire Component
    Route::get('/returns', ReturnsIndex::class)->name('returns');
    
    // Kelola User (khusus admin)
    Route::get('/users', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
        return view('livewire.placeholder', ['title' => 'Kelola User', 'message' => 'Halaman Kelola User akan dibuat.']);
    })->name('users');
});

require __DIR__.'/auth.php';


