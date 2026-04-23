<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if books already exist
        $existingCount = DB::table('books')->count();
        
        // Only seed if no books exist
        if ($existingCount > 0) {
            return;
        }

        $books = [
            [
                'nama_buku' => 'Sang Kancil',
                'pengarang' => 'Sutan Takdir Alisjahbana',
                'penerbit' => 'Balai Pustaka',
                'tahun' => 2020,
                'isbn' => '978-602-1234-56-7',
                'stock' => 20,
                'category_id' => 1,
                'deskripsi' => 'Cerita klasik tentang kehebatan Kancil dalam berbagai petualangan',
                'denda_hilang' => 50000,
                'denda_rusak' => 30000,
            ],
            [
                'nama_buku' => 'Naskar Pelaingii',
                'pengarang' => 'Ananta Toer',
                'penerbit' => 'Gramedia',
                'tahun' => 2019,
                'isbn' => '978-602-2345-67-8',
                'stock' => 15,
                'category_id' => 1,
                'deskripsi' => 'Kumpulan cerita pendek yang menghibur dan mendidik',
                'denda_hilang' => 45000,
                'denda_rusak' => 25000,
            ],
            [
                'nama_buku' => 'Rafa Pencari Ilmu',
                'pengarang' => 'Dr. Bambang Sutrisno',
                'penerbit' => 'Erlangga',
                'tahun' => 2021,
                'isbn' => '978-602-3456-78-9',
                'stock' => 25,
                'category_id' => 1,
                'deskripsi' => 'Buku fiksi tentang perjalanan seorang pemuda mencari ilmu',
                'denda_hilang' => 55000,
                'denda_rusak' => 35000,
            ],
            [
                'nama_buku' => 'Ayo Baca Enggsikan',
                'pengarang' => 'Siti Nurhaliza',
                'penerbit' => 'Yudhistira',
                'tahun' => 2020,
                'isbn' => '978-602-4567-89-0',
                'stock' => 18,
                'category_id' => 2,
                'deskripsi' => 'Buku pengantar bahasa Inggris untuk pemula',
                'denda_hilang' => 40000,
                'denda_rusak' => 20000,
            ],
            [
                'nama_buku' => 'Rasya Bisnis man',
                'pengarang' => 'Prof. Hendra Wijaya',
                'penerbit' => 'Gramedia',
                'tahun' => 2022,
                'isbn' => '978-602-5678-90-1',
                'stock' => 12,
                'category_id' => 3,
                'deskripsi' => 'Panduan bisnis dan kewirausahaan modern',
                'denda_hilang' => 60000,
                'denda_rusak' => 40000,
            ],
            [
                'nama_buku' => 'Lumpu',
                'pengarang' => 'Dr. Maria Susanti',
                'penerbit' => 'Erlangga',
                'tahun' => 2021,
                'isbn' => '978-602-6789-01-2',
                'stock' => 22,
                'category_id' => 1,
                'deskripsi' => 'Cerita tentang petualangan karakter Lumpu yang menggemaskan',
                'denda_hilang' => 50000,
                'denda_rusak' => 30000,
            ],
            [
                'nama_buku' => 'Reaksi Kimia Dasar',
                'pengarang' => 'Prof. Dr. Agus Setiawan',
                'penerbit' => 'Erlangga',
                'tahun' => 2022,
                'isbn' => '978-602-7890-12-3',
                'stock' => 16,
                'category_id' => 3,
                'deskripsi' => 'Buku praktikum kimia dengan penjelasan lengkap dan mudah',
                'denda_hilang' => 65000,
                'denda_rusak' => 45000,
            ],
            [
                'nama_buku' => 'Matematika Diskrit',
                'pengarang' => 'Drs. Bambang Suwito, M.Sc',
                'penerbit' => 'Yudhistira',
                'tahun' => 2021,
                'isbn' => '978-602-8901-23-4',
                'stock' => 14,
                'category_id' => 3,
                'deskripsi' => 'Buku matematika tingkat lanjut untuk siswa SMA',
                'denda_hilang' => 70000,
                'denda_rusak' => 50000,
            ],
            [
                'nama_buku' => 'Biologi Sel dan Genetika',
                'pengarang' => 'Dr. Eka Pratiwi',
                'penerbit' => 'Gramedia',
                'tahun' => 2022,
                'isbn' => '978-602-9012-34-5',
                'stock' => 18,
                'category_id' => 3,
                'deskripsi' => 'Buku biologi tingkat SMA dengan ilustrasi lengkap',
                'denda_hilang' => 55000,
                'denda_rusak' => 35000,
            ],
            [
                'nama_buku' => 'Sejarah Dunia Modern',
                'pengarang' => 'Prof. Nurul Hidayat',
                'penerbit' => 'Erlangga',
                'tahun' => 2020,
                'isbn' => '978-602-0123-45-6',
                'stock' => 20,
                'category_id' => 2,
                'deskripsi' => 'Sejarah perkembangan dunia dari abad ke-20 hingga sekarang',
                'denda_hilang' => 50000,
                'denda_rusak' => 30000,
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->insert([
                'nama_buku' => $book['nama_buku'],
                'pengarang' => $book['pengarang'],
                'penerbit' => $book['penerbit'],
                'tahun' => $book['tahun'],
                'isbn' => $book['isbn'],
                'stock' => $book['stock'],
                'category_id' => $book['category_id'],
                'deskripsi' => $book['deskripsi'],
                'denda_hilang' => $book['denda_hilang'],
                'denda_rusak' => $book['denda_rusak'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
