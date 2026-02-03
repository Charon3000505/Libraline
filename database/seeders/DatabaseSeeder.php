<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat User Admin
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpustakaan.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat User Biasa
        User::create([
            'name' => 'User Test',
            'email' => 'user@perpustakaan.id',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Buat Sample Buku
        $books = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'stok' => 5, 'kategori' => 'Fiksi'],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 1980, 'stok' => 3, 'kategori' => 'Fiksi'],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'penerbit' => 'Kompas', 'tahun_terbit' => 2018, 'stok' => 4, 'kategori' => 'Non-Fiksi'],
            ['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'stok' => 6, 'kategori' => 'Self-Help'],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'Kepustakaan Populer', 'tahun_terbit' => 2011, 'stok' => 2, 'kategori' => 'Sejarah'],
            ['judul' => 'Dilan 1990', 'penulis' => 'Pidi Baiq', 'penerbit' => 'Pastel Books', 'tahun_terbit' => 2014, 'stok' => 4, 'kategori' => 'Fiksi'],
            ['judul' => 'Rich Dad Poor Dad', 'penulis' => 'Robert Kiyosaki', 'penerbit' => 'Gramedia', 'tahun_terbit' => 1997, 'stok' => 3, 'kategori' => 'Bisnis'],
            ['judul' => 'The Lean Startup', 'penulis' => 'Eric Ries', 'penerbit' => 'Crown Business', 'tahun_terbit' => 2011, 'stok' => 2, 'kategori' => 'Bisnis'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

