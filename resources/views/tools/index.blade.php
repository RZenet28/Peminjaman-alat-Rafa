@extends('layouts.app')

@section('title','Data Buku')

@section('content')
<a href="/buku/create" class="btn btn-primary mb-2">Tambah</a>

<table class="table table-bordered">
<tr>
    <th>Nama</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
@foreach($tools as $t)
<tr>
    <td>{{ $t->name }}</td>
    <td>{{ $t->stock }}</td>
    <td>
        <a href="#" class="btn btn-warning btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
@endforeach
</table>
@endsection
