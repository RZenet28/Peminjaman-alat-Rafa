<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $table = 'buku';
    
    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'tahun_terbit',
        'isbn',
        'stok',
        'stok_tersedia',
        'deskripsi',
        'kategori',
        'cover'
    ];
    
    /**
     * Relasi ke peminjaman
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }
    
    /**
     * Scope untuk buku yang tersedia
     */
    public function scopeTersedia($query)
    {
        return $query->where('stok_tersedia', '>', 0);
    }
    
    /**
     * Check apakah buku tersedia
     */
    public function isTersedia()
    {
        return $this->stok_tersedia > 0;
    }
}