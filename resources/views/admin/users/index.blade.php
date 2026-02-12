@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Manajemen User</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bi bi-plus-lg me-2"></i>Tambah User
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Data Siswa</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-info text-dark text-capitalize">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>
                                @if($user->role == 'peminjam' && $user->siswa)
                                    <small>
                                        {{ $user->siswa->nama_lengkap }} <br>
                                        {{ $user->siswa->kelas }} - {{ $user->siswa->jurusan }}
                                    </small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- ================= CREATE MODAL ================= --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-3">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        <small class="text-muted">
                            Password akan dibuat otomatis dan dikirim ke email ini.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" id="create_role" class="form-select">
                            <option value="petugas">Petugas</option>
                            <option value="peminjam">Peminjam</option>
                        </select>
                    </div>

                    <div id="createSiswaFields" style="display:none;">
                        <hr>
                        <h6 class="fw-bold">Data Siswa</h6>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NISN (Opsional)</label>
                            <input type="text" name="nisn" class="form-control">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    const createRole = document.getElementById('create_role');
    const createSiswaFields = document.getElementById('createSiswaFields');

    createRole.addEventListener('change', function() {
        createSiswaFields.style.display =
            this.value === 'peminjam' ? 'block' : 'none';
    });

});
</script>
@endpush