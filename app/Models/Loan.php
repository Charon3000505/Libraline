<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_dikembalikan',
        'status',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'tanggal_dikembalikan' => 'date',
    ];

    /**
     * Relasi: Loan belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Loan belongs to Book
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Scope: Hanya peminjaman aktif (belum dikembalikan)
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'dipinjam');
    }

    /**
     * Scope: Peminjaman yang sudah dikembalikan
     */
    public function scopeReturned($query)
    {
        return $query->where('status', 'dikembalikan');
    }

    /**
     * Cek apakah sudah terlambat
     */
    public function isOverdue(): bool
    {
        return $this->status === 'dipinjam' && $this->tanggal_kembali < now();
    }
}
