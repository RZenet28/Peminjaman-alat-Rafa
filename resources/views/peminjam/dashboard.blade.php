@extends('layouts.peminjam')

@section('title', 'Dashboard Peminjam')

@section('content')
<div class="container-fluid p-4">
    
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center text-white">
                        <div>
                            <h2 class="fw-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                            <p class="mb-0 opacity-75">
                                <i class="bi bi-mortarboard me-2"></i>
                                {{ Auth::user()->kelas ?? 'Peminjam' }} | NIS: {{ Auth::user()->no_identitas ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <!-- Buku Dipinjam -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="bi bi-book text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge" style="background: #f3f4f6; color: #667eea;">Aktif</span>
                    </div>
                    <h6 class="text-muted small mb-1">Sedang Dipinjam</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">dari 3 maksimal</small>
                </div>
            </div>
        </div>

        <!-- Total Pinjam -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <i class="bi bi-graph-up text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge" style="background: #fef3f2; color: #f5576c;">Total</span>
                    </div>
                    <h6 class="text-muted small mb-1">Total Peminjaman</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">sepanjang waktu</small>
                </div>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <i class="bi bi-exclamation-triangle text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge" style="background: #dcfce7; color: #16a34a;">Aman</span>
                    </div>
                    <h6 class="text-muted small mb-1">Keterlambatan</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">buku terlambat</small>
                </div>
            </div>
        </div>

        <!-- Favorit -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <i class="bi bi-star text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge" style="background: #e0f2fe; color: #0284c7;">Koleksi</span>
                    </div>
                    <h6 class="text-muted small mb-1">Buku Favorit</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">tersimpan</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-lightning-charge text-primary me-2"></i>
                        Aksi Cepat
                    </h5>
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <a href="/peminjam/daftar-buku" class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-book-fill" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Daftar Buku</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="/peminjam/ajukan-peminjaman" class="btn btn-outline-success w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-plus-circle-fill" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Ajukan Peminjaman</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="/peminjam/kembalikan-buku" class="btn btn-outline-warning w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-arrow-return-left" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Kembalikan Buku</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Current Borrowings & Book Recommendations -->
    <div class="row g-4 mb-4">
        
        <!-- Current Borrowings -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-book-half text-primary me-2"></i>
                            Buku yang Sedang Dipinjam
                        </h5>
                        <a href="/peminjam/ajukan-peminjaman" class="text-primary text-decoration-none fw-semibold small">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <i class="bi bi-inbox text-muted" style="font-size: 64px;"></i>
                        <p class="text-muted mt-3 mb-3">Belum ada buku yang dipinjam</p>
                        <a href="/peminjam/daftar-buku" class="btn btn-primary btn-sm">
                            <i class="bi bi-search me-2"></i>Lihat Daftar Buku
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book Recommendations -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-star text-warning me-2"></i>
                        Buku Populer
                    </h5>
                    
                    <!-- Example recommendations -->
                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg" style="cursor: pointer;">
                        <div class="bg-gradient rounded" style="width: 60px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-book text-white" style="font-size: 24px;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">Matematika XII</h6>
                            <p class="text-muted mb-2" style="font-size: 12px;">K13 Revisi</p>
                            <div class="d-flex gap-2 align-items-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size: 10px;">
                                    <i class="bi bi-bookmark-check me-1"></i>Pelajaran
                                </span>
                                <span class="text-success small">
                                    <i class="bi bi-check-circle me-1"></i>Tersedia
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg" style="cursor: pointer;">
                        <div class="bg-gradient rounded" style="width: 60px; height: 80px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-book text-white" style="font-size: 24px;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">Fisika Dasar</h6>
                            <p class="text-muted mb-2" style="font-size: 12px;">Kelas X</p>
                            <div class="d-flex gap-2 align-items-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size: 10px;">
                                    <i class="bi bi-bookmark-check me-1"></i>Pelajaran
                                </span>
                                <span class="text-success small">
                                    <i class="bi bi-check-circle me-1"></i>Tersedia
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg" style="cursor: pointer;">
                        <div class="bg-gradient rounded" style="width: 60px; height: 80px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-book text-white" style="font-size: 24px;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1 small">Biologi XI</h6>
                            <p class="text-muted mb-2" style="font-size: 12px;">K13 Revisi</p>
                            <div class="d-flex gap-2 align-items-center">
                                <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size: 10px;">
                                    <i class="bi bi-bookmark-check me-1"></i>Pelajaran
                                </span>
                                <span class="text-success small">
                                    <i class="bi bi-check-circle me-1"></i>Tersedia
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="/peminjam/daftar-buku" class="btn btn-sm btn-outline-primary">
                            Lihat Semua Buku
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reading Statistics -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-graph-up text-success me-2"></i>
                        Statistik Peminjaman Saya
                    </h5>
                    <div class="row text-center">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-primary">0</div>
                                <p class="text-muted small mb-0">Bulan Ini</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-success">0</div>
                                <p class="text-muted small mb-0">Tahun Ini</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="h4 fw-bold text-warning">-</div>
                                <p class="text-muted small mb-0">Kategori Favorit</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-info">0</div>
                                <p class="text-muted small mb-0">Rata-rata/Bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .hover-lift {
        transition: all 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .hover-bg:hover {
        background: #f9fafb;
    }
</style>
@endsection