@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Header -->
        <div class="col-12 mb-4">
            <h2 class="fw-bold">Dashboard Petugas</h2>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}</p>
        </div>

        <!-- Statistics Cards -->
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Buku</h6>
                            <h3 class="mb-0 fw-bold">{{ $totalBuku ?? 0 }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Dipinjam</h6>
                            <h3 class="mb-0 fw-bold">{{ $bukuDipinjam ?? 0 }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-warning">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Terlambat</h6>
                            <h3 class="mb-0 fw-bold text-danger">{{ $bukuTerlambat ?? 0 }}</h3>
                        </div>
                        <div class="bg-danger bg-opacity-10 rounded-3 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Anggota</h6>
                            <h3 class="mb-0 fw-bold">{{ $totalAnggota ?? 0 }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-3 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Menu Cepat</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('buku.index') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="bi bi-book me-2"></i> Kelola Buku
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-warning w-100 py-3">
                                <i class="bi bi-arrow-left-right me-2"></i> Peminjaman
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('pengembalian.index') }}" class="btn btn-outline-success w-100 py-3">
                                <i class="bi bi-check-circle me-2"></i> Pengembalian
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('anggota.index') }}" class="btn btn-outline-info w-100 py-3">
                                <i class="bi bi-people me-2"></i> Anggota
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Peminjaman Terbaru</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peminjamanTerbaru ?? [] as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->anggota->nama ?? '-' }}</td>
                                    <td>{{ $peminjaman->buku->judul ?? '-' }}</td>
                                    <td>{{ $peminjaman->tanggal_pinjam ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-warning">Dipinjam</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data peminjaman</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buku Populer -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Buku Populer</h5>
                    <div class="list-group list-group-flush">
                        @forelse($bukuPopuler ?? [] as $buku)
                        <div class="list-group-item px-0">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $buku->judul ?? '-' }}</h6>
                                    <small class="text-muted">{{ $buku->penulis ?? '-' }}</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $buku->total_dipinjam ?? 0 }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-muted py-3">
                            Tidak ada data
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .btn-outline-primary:hover,
    .btn-outline-warning:hover,
    .btn-outline-success:hover,
    .btn-outline-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endsection