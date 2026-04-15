<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\Library as UserLibrary;
use App\Livewire\Books\Index as BooksIndex;
use App\Livewire\Loans\Index as LoansIndex;
use App\Livewire\Returns\Index as ReturnsIndex;


// ==========================
// LANDING PAGE
// ==========================
Route::get('/', function () {
    return view('welcome');
})->name('home');


// ==========================
// DASHBOARD (ROLE BASED)
// ==========================
Route::get('/dashboard', function () {

    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login');
    }

    // ADMIN → tetap ke dashboard admin
    if ($user->role === 'admin') {
        return app(AdminDashboard::class)();
    }

    // USER → langsung ke library 🔥
    return redirect()->route('library');
})->middleware(['auth'])->name('dashboard');


// ==========================
// LIBRARY (USER PAGE UTAMA)
// ==========================
Route::get('/library', UserLibrary::class)
    ->middleware(['auth'])
    ->name('library');


// ==========================
// ROUTE SETELAH LOGIN
// ==========================
Route::middleware(['auth'])->group(function () {

    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ================= BOOKS =================
    Route::get('/books', BooksIndex::class)->name('books');


    // ================= LOANS =================
    Route::get('/loans', LoansIndex::class)->name('loans');


    // ================= RETURNS =================
    Route::get('/returns', ReturnsIndex::class)->name('returns');


    // ================= USERS (ADMIN ONLY) =================
    Route::get('/users', function () {

        $user = auth()->user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        return view('livewire.placeholder', [
            'title' => 'Kelola User',
            'message' => 'Halaman Kelola User akan dibuat.'
        ]);
    })->name('users');
});


// ==========================
// AUTH ROUTES (WAJIB)
// ==========================
require __DIR__ . '/auth.php';
