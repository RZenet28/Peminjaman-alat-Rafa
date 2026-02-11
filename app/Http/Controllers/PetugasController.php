<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;

class PetugasController extends Controller
{
    /**
     * Display petugas dashboard
     */
    public function dashboard()
    {
        // Total buku
        $totalBuku = Buku::count();
        
        // Buku yang sedang dipinjam
        $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        
        // Buku terlambat (melewati tanggal kembali)
        $bukuTerlambat = Peminjaman::where('status', 'dipinjam')
            ->where('tanggal_kembali', '<', Carbon::now())
            ->count();
        
        // Total anggota (users dengan role anggota/siswa)
        $totalAnggota = User::where('role', 'anggota')
            ->orWhere('role', 'siswa')
            ->count();
        
        // Peminjaman terbaru (5 terakhir)
        $peminjamanTerbaru = Peminjaman::with(['anggota', 'buku'])
            ->where('status', 'dipinjam')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Buku populer (paling banyak dipinjam)
        $bukuPopuler = Buku::withCount(['peminjaman' => function($query) {
                $query->where('status', 'selesai');
            }])
            ->orderBy('peminjaman_count', 'desc')
            ->limit(5)
            ->get()
            ->map(function($buku) {
                $buku->total_dipinjam = $buku->peminjaman_count;
                return $buku;
            });
        
        return view('petugas.dashboard', compact(
            'totalBuku',
            'bukuDipinjam',
            'bukuTerlambat',
            'totalAnggota',
            'peminjamanTerbaru',
            'bukuPopuler'
        ));
    }
}