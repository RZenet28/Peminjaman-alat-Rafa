@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
<div class="container-fluid p-4">
    
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center text-white">
                        <div>
                            <h2 class="fw-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                            <p class="mb-0 opacity-75">
                                <i class="bi bi-person-badge me-2"></i>
                                Petugas Perpustakaan | NIP: {{ Auth::user()->no_identitas ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <!-- Total Buku -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);">
                            <i class="bi bi-book text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Katalog</span>
                    </div>
                    <h6 class="text-muted small mb-1">Total Buku</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">buku tersedia</small>
                </div>
            </div>
        </div>

        <!-- Sedang Dipinjam -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                            <i class="bi bi-hourglass-split text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning">Aktif</span>
                    </div>
                    <h6 class="text-muted small mb-1">Sedang Dipinjam</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">peminjaman aktif</small>
                </div>
            </div>
        </div>

        <!-- Menunggu Persetujuan -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);">
                            <i class="bi bi-clock-history text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge bg-info bg-opacity-10 text-info">Pending</span>
                    </div>
                    <h6 class="text-muted small mb-1">Menunggu Persetujuan</h6>
                    <h2 class="fw-bold mb-0">0</h2>
                    <small class="text-muted">perlu diproses</small>
                </div>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-3 rounded-3" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                            <i class="bi bi-exclamation-triangle text-white" style="font-size: 24px;"></i>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger">Alert</span>
                    </div>
                    <h6 class="text-muted small mb-1">Terlambat</h6>
                    <h2 class="fw-bold mb-0 text-danger">0</h2>
                    <small class="text-muted">perlu tindakan</small>
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
                        <i class="bi bi-lightning-charge text-success me-2"></i>
                        Aksi Cepat Petugas
                    </h5>
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <a href="/petugas/persetujuan-peminjaman" class="btn btn-outline-primary w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-clipboard-check" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Setujui Peminjaman</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="/petugas/pantau-pengembalian" class="btn btn-outline-success w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-eye" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Pantau Pengembalian</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="/petugas/cetak-laporan" class="btn btn-outline-warning w-100 py-3 d-flex flex-column align-items-center gap-2 hover-lift">
                                <i class="bi bi-printer" style="font-size: 24px;"></i>
                                <span class="small fw-semibold">Cetak Laporan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Peminjaman Menunggu & Aktivitas Terbaru -->
    <div class="row g-4 mb-4">
        
        <!-- Menunggu Persetujuan -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-hourglass text-warning me-2"></i>
                            Peminjaman Menunggu Persetujuan
                        </h5>
                        <a href="/petugas/persetujuan-peminjaman" class="text-primary text-decoration-none fw-semibold small">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <i class="bi bi-check-circle text-success" style="font-size: 64px;"></i>
                        <p class="text-muted mt-3">Tidak ada peminjaman menunggu persetujuan</p>
                    </div>

                    <!-- Example Data (commented) -->
                    <!--
                    <div class="card mb-3 border">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="bg-warning bg-opacity-10 rounded p-3">
                                        <i class="bi bi-person text-warning" style="font-size: 28px;"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="fw-bold mb-1">Ahmad Rizki - XII IPA 1</h6>
                                    <p class="text-muted small mb-2">Matematika XII K13 Revisi</p>
                                    <span class="badge bg-warning">Menunggu Persetujuan</span>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-success me-2">
                                        <i class="bi bi-check-lg"></i> Setujui
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-x-lg"></i> Tolak
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        Aktivitas Terbaru
                    </h5>
                    
                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg">
                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-center flex-shrink-0" style="width: 40px; height: 40px;">
                            <i class="bi bi-check-circle text-success"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 small"><strong>Peminjaman disetujui</strong></p>
                            <p class="text-muted mb-0" style="font-size: 12px;">Siti - Fisika Dasar</p>
                            <p class="text-muted mb-0" style="font-size: 11px;">5 menit yang lalu</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-center flex-shrink-0" style="width: 40px; height: 40px;">
                            <i class="bi bi-arrow-return-left text-primary"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 small"><strong>Buku dikembalikan</strong></p>
                            <p class="text-muted mb-0" style="font-size: 12px;">Budi - Biologi XI</p>
                            <p class="text-muted mb-0" style="font-size: 11px;">15 menit yang lalu</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3 p-2 rounded hover-bg">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-center flex-shrink-0" style="width: 40px; height: 40px;">
                            <i class="bi bi-exclamation-triangle text-warning"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 small"><strong>Keterlambatan terdeteksi</strong></p>
                            <p class="text-muted mb-0" style="font-size: 12px;">Andi - Kimia Organik</p>
                            <p class="text-muted mb-0" style="font-size: 11px;">1 jam yang lalu</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 p-2 rounded hover-bg">
                        <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-center flex-shrink-0" style="width: 40px; height: 40px;">
                            <i class="bi bi-plus-circle text-info"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-1 small"><strong>Buku baru ditambahkan</strong></p>
                            <p class="text-muted mb-0" style="font-size: 12px;">Sejarah Indonesia</p>
                            <p class="text-muted mb-0" style="font-size: 11px;">2 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik & Buku Terlaris -->
    <div class="row g-4 mb-4">
        
        <!-- Statistik Hari Ini -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-graph-up text-success me-2"></i>
                        Statistik Hari Ini
                    </h5>
                    <div class="row text-center">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-success">0</div>
                                <p class="text-muted small mb-0">Disetujui</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-primary">0</div>
                                <p class="text-muted small mb-0">Dikembalikan</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-warning">0</div>
                                <p class="text-muted small mb-0">Pending</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="p-3">
                                <div class="display-6 fw-bold text-danger">0</div>
                                <p class="text-muted small mb-0">Terlambat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buku Paling Sering Dipinjam -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-trophy text-warning me-2"></i>
                        Buku Terlaris
                    </h5>
                    
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1 small fw-bold">Matematika XII</h6>
                                    <p class="text-muted mb-0" style="font-size: 12px;">K13 Revisi</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">89</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1 small fw-bold">Fisika Dasar</h6>
                                    <p class="text-muted mb-0" style="font-size: 12px;">Kelas X</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">76</span>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1 small fw-bold">Biologi XI</h6>
                                    <p class="text-muted mb-0" style="font-size: 12px;">K13 Revisi</p>
                                </div>
                                <span class="badge bg-primary rounded-pill">64</span>
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