@extends('layouts.app')

@section('title','Dashboard Admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Dashboard Admin</h3>
        <p>Selamat datang, {{ auth()->user()->name }}</p>

        <div class="mt-3">
            <a href="#" class="btn btn-primary">Kelola User</a>
            <a href="#" class="btn btn-success">Kelola Alat</a>
            <a href="#" class="btn btn-warning">Laporan</a>
        </div>
    </div>
</div>
@endsection
