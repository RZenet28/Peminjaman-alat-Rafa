@extends('layouts.app')

@section('title', 'Menyetujui Peminjaman')

@section('content')
    <div class="container-fluid p-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Menyetujui Peminjaman</h2>
                <p class="text-muted mb-0">Kelola permintaan peminjaman yang menunggu persetujuan</p>
            </div>
            <div class="badge bg-warning text-dark" style="font-size: 1rem;">
                {{ $pendingCount }} Menunggu
            </div>
        </div>

        <!-- Alert Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi Kesalahan!</strong>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Search & Filter -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama peminjam atau judul buku..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="bi bi-search me-1"></i>Cari
                            </button>
                            <a href="{{ route('admin.borrowing.approval') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pending Borrowings Table -->
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Peminjam</th>
                            <th>Kontak</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Stok Tersedia</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingBorrowings as $borrowing)
                            <tr>
                                <td>
                                    <strong>{{ $borrowing->user->name ?? '-' }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $borrowing->user->email ?? '-' }}</small><br>
                                    <small class="text-muted">{{ $borrowing->user->phone ?? '-' }}</small>
                                </td>
                                <td>
                                    <div>
                                        <strong>{{ $borrowing->buku->nama_buku ?? '-' }}</strong>
                                    </div>
                                    <small class="text-muted">
                                        @if($borrowing->buku && $borrowing->buku->penulis)
                                            Penulis: {{ $borrowing->buku->penulis }}
                                        @endif
                                    </small>
                                </td>
                                <td>{{ $borrowing->tanggal_pinjam->format('d M Y') }}</td>
                                <td>{{ $borrowing->tanggal_kembali->format('d M Y') }}</td>
                                <td>
                                    @if($borrowing->buku)
                                        @if($borrowing->buku->stock > 0)
                                            <span class="badge bg-success">{{ $borrowing->buku->stock }}</span>
                                        @else
                                            <span class="badge bg-danger">0</span>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <form action="{{ route('admin.borrowing.approve', $borrowing->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success" title="Setujui peminjaman"
                                                data-confirm="Setujui peminjaman ini? Stok buku akan berkurang.">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.borrowing.reject', $borrowing->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger" title="Tolak peminjaman"
                                                data-confirm="Tolak peminjaman ini?">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-inbox" style="font-size: 48px; color: #ccc;"></i>
                                    <p class="text-muted mt-3 mb-0">Tidak ada peminjaman yang menunggu persetujuan</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($pendingBorrowings->count() > 0)
                <div class="card-footer bg-white">
                    {{ $pendingBorrowings->links() }}
                </div>
            @endif
        </div>

        <!-- Quick Stats -->
        <div class="row g-3 mt-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted small mb-1">Menunggu Persetujuan</h6>
                                <h3 class="fw-bold mb-0">{{ $stats['pending'] }}</h3>
                            </div>
                            <i class="bi bi-hourglass-split text-warning" style="font-size: 28px;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted small mb-1">Sudah Disetujui</h6>
                                <h3 class="fw-bold mb-0">{{ $stats['dipinjam'] }}</h3>
                            </div>
                            <i class="bi bi-check-circle text-success" style="font-size: 28px;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted small mb-1">Ditolak</h6>
                                <h3 class="fw-bold mb-0">{{ $stats['ditolak'] }}</h3>
                            </div>
                            <i class="bi bi-x-circle text-danger" style="font-size: 28px;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="text-muted small mb-1">Dikembalikan</h6>
                                <h3 class="fw-bold mb-0">{{ $stats['dikembalikan'] }}</h3>
                            </div>
                            <i class="bi bi-book-half text-info" style="font-size: 28px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection