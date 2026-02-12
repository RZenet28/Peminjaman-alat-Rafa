@extends('layouts.peminjam')

@section('title', 'Profile Siswa')

@section('content')
<div class="container py-4">

    <h4 class="fw-bold mb-4">Profile Siswa</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">

            <form action="{{ route('peminjam.profile.siswa.update') }}" method="POST">
                @csrf
                @method('PUT')

                <h6 class="fw-bold mb-3">Data Akun</h6>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <hr>

                <h6 class="fw-bold mb-3">Data Siswa</h6>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                           value="{{ $user->siswa->nama_lengkap ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control"
                           value="{{ $user->siswa->kelas ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control"
                           value="{{ $user->siswa->jurusan ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control"
                           value="{{ $user->siswa->nisn ?? '' }}">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary">
                        Update Profile Siswa
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection