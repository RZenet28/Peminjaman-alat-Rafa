@extends('layouts.app')

@section('title', 'Kelola Buku')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">Kelola Buku</h4>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Buku
        </button>
    </div>

    {{-- SEARCH --}}
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                placeholder="Cari buku atau kategori..."
                value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </div>
    </form>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stock</th>
                        <th>Denda Hilang</th>
                        <th>Denda Rusak</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>
                                @if($book->gambar)
                                    <img src="{{ asset('storage/' . $book->gambar) }}" width="60">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $book->nama_buku }}</td>
                            <td>{{ $book->category->name ?? '-' }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>Rp {{ number_format($book->denda_hilang) }}</td>
                            <td>Rp {{ number_format($book->denda_rusak) }}</td>
                            <td class="d-flex gap-1">

                                {{-- EDIT BUTTON --}}
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $book->id }}">
                                    Edit
                                </button>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.books.destroy', $book->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>

                            </td>
                        </tr>

                        {{-- EDIT MODAL --}}
                        <div class="modal fade" id="editModal{{ $book->id }}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="POST"
                                        action="{{ route('admin.books.update', $book->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Buku</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body row">

                                            <div class="col-md-6 mb-3">
                                                <label>Nama Buku</label>
                                                <input type="text"
                                                    name="nama_buku"
                                                    class="form-control"
                                                    value="{{ $book->nama_buku }}"
                                                    required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Kategori</label>
                                                <select name="category_id"
                                                    class="form-select" required>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi"
                                                    class="form-control">{{ $book->deskripsi }}</textarea>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Stock</label>
                                                <input type="number"
                                                    name="stock"
                                                    class="form-control"
                                                    value="{{ $book->stock }}"
                                                    required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Denda Hilang</label>
                                                <input type="number"
                                                    name="denda_hilang"
                                                    class="form-control"
                                                    value="{{ $book->denda_hilang }}"
                                                    required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Denda Rusak</label>
                                                <input type="number"
                                                    name="denda_rusak"
                                                    class="form-control"
                                                    value="{{ $book->denda_rusak }}"
                                                    required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Gambar</label>

                                                @if($book->gambar)
                                                    <div class="mb-2">
                                                        <img src="{{ asset('storage/' . $book->gambar) }}"
                                                            width="80">
                                                    </div>
                                                @endif

                                                <input type="file"
                                                    name="gambar"
                                                    class="form-control">
                                                <small class="text-muted">
                                                    Kosongkan jika tidak ingin mengganti gambar
                                                </small>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Tidak ada data buku
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            {{ $books->withQueryString()->links() }}

        </div>
    </div>

</div>


{{-- CREATE MODAL --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST"
                action="{{ route('admin.books.store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body row">

                    <div class="col-md-6 mb-3">
                        <label>Nama Buku</label>
                        <input type="text"
                            name="nama_buku"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <select name="category_id"
                            class="form-select"
                            required>
                            <option value="">-- Pilih --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi"
                            class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Stock</label>
                        <input type="number"
                            name="stock"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Denda Hilang</label>
                        <input type="number"
                            name="denda_hilang"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Denda Rusak</label>
                        <input type="number"
                            name="denda_rusak"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Gambar</label>
                        <input type="file"
                            name="gambar"
                            class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection