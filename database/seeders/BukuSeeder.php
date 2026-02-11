<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = [
            [
                'kode_buku' => 'BK001',
                'judul' => 'Matematika Kelas 12',
                'penulis' => 'Dr. Ahmad Suryadi',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-456-7',
                'stok' => 15,
                'stok_tersedia' => 15,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku matematika untuk kelas 12 SMA',
            ],
            [
                'kode_buku' => 'BK002',
                'judul' => 'Fisika Dasar',
                'penulis' => 'Prof. Dr. Budi Santoso',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-457-8',
                'stok' => 20,
                'stok_tersedia' => 20,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku fisika dasar untuk SMA',
            ],
            [
                'kode_buku' => 'BK003',
                'judul' => 'Bahasa Indonesia',
                'penulis' => 'Dra. Siti Nurhaliza',
                'penerbit' => 'Yudhistira',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-458-9',
                'stok' => 25,
                'stok_tersedia' => 25,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku bahasa Indonesia untuk SMA',
            ],
            [
                'kode_buku' => 'BK004',
                'judul' => 'Sejarah Indonesia',
                'penulis' => 'Drs. Hendra Wijaya',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => '2022',
                'isbn' => '978-602-298-459-0',
                'stok' => 18,
                'stok_tersedia' => 18,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku sejarah Indonesia modern',
            ],
            [
                'kode_buku' => 'BK005',
                'judul' => 'Biologi Umum',
                'penulis' => 'Dr. Maria Susanti',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-460-6',
                'stok' => 22,
                'stok_tersedia' => 22,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku biologi untuk SMA',
            ],
            [
                'kode_buku' => 'BK006',
                'judul' => 'Kimia Organik',
                'penulis' => 'Prof. Dr. Ir. Bambang',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-461-7',
                'stok' => 12,
                'stok_tersedia' => 12,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku kimia organik tingkat lanjut',
            ],
            [
                'kode_buku' => 'BK007',
                'judul' => 'Ekonomi Makro',
                'penulis' => 'Drs. Agus Setiawan, M.Si',
                'penerbit' => 'Yudhistira',
                'tahun_terbit' => '2022',
                'isbn' => '978-602-298-462-8',
                'stok' => 16,
                'stok_tersedia' => 16,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku ekonomi makro untuk SMA',
            ],
            [
                'kode_buku' => 'BK008',
                'judul' => 'Geografi Indonesia',
                'penulis' => 'Dra. Dewi Anggraini',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-463-9',
                'stok' => 20,
                'stok_tersedia' => 20,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku geografi Indonesia dan dunia',
            ],
            [
                'kode_buku' => 'BK009',
                'judul' => 'Sosiologi Modern',
                'penulis' => 'Prof. Dr. Hadi Kusuma',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => '2022',
                'isbn' => '978-602-298-464-0',
                'stok' => 14,
                'stok_tersedia' => 14,
                'kategori' => 'Pelajaran',
                'deskripsi' => 'Buku sosiologi untuk SMA',
            ],
            [
                'kode_buku' => 'BK010',
                'judul' => 'English Grammar',
                'penulis' => 'Sarah Johnson',
                'penerbit' => 'Oxford',
                'tahun_terbit' => '2023',
                'isbn' => '978-602-298-465-1',
                'stok' => 30,
                'stok_tersedia' => 30,
                'kategori' => 'Bahasa',
                'deskripsi' => 'Buku grammar bahasa Inggris',
            ],
        ];

        foreach ($buku as $item) {
            DB::table('buku')->insert([
                'kode_buku' => $item['kode_buku'],
                'judul' => $item['judul'],
                'penulis' => $item['penulis'],
                'penerbit' => $item['penerbit'],
                'tahun_terbit' => $item['tahun_terbit'],
                'isbn' => $item['isbn'],
                'stok' => $item['stok'],
                'stok_tersedia' => $item['stok_tersedia'],
                'kategori' => $item['kategori'],
                'deskripsi' => $item['deskripsi'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}