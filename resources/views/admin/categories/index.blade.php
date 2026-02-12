@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bold">Kelola Kategori</h4>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Kategori
        </button>
    </div>

    {{-- SEARCH --}}
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text"
                name="search"
                class="form-control"
                placeholder="Cari kategori..."
                value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </div>
    </form>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Kategori</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="d-flex gap-1">

                                {{-- EDIT BUTTON --}}
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $category->id }}">
                                    Edit
                                </button>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                        {{-- EDIT MODAL --}}
                        <div class="modal fade" id="editModal{{ $category->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST"
                                        action="{{ route('admin.categories.update', $category->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Edit Kategori
                                            </h5>
                                            <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <label class="mb-2">Nama Kategori</label>
                                            <input type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{ $category->name }}"
                                                required>
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
                            <td colspan="2" class="text-center">
                                Tidak ada data kategori
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            {{-- PAGINATION --}}
            {{ $categories->withQueryString()->links() }}

        </div>
    </div>

</div>


{{-- CREATE MODAL --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST"
                action="{{ route('admin.categories.store') }}">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="mb-2">Nama Kategori</label>
                    <input type="text"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama kategori"
                        required>
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