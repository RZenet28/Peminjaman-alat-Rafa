<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'kelas',
        'jurusan',
        'nisn'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}