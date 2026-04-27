<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'stok',
        'kategori',
        'deskripsi',
        'image',
    ];

    /**
     * Relasi: Satu buku bisa dipinjam berkali-kali
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * Cek apakah buku tersedia untuk dipinjam
     */
    public function isAvailable(): bool
    {
        return $this->stok > 0;
    }
}
