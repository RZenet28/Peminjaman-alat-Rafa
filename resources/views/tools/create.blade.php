@extends('layouts.app')

@section('title','Tambah Buku')

@section('content')
<form method="POST" action="/buku">
@csrf
<div class="mb-2">
    <input name="name" class="form-control" placeholder="Nama alat">
</div>
<div class="mb-2">
    <input name="stock" type="number" class="form-control" placeholder="Stok">
</div>
<div class="mb-2">
    <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
</div>
<button class="btn btn-success">Simpan</button>
</form>
@endsection
