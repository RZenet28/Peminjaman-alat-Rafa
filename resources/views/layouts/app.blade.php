<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { overflow-x: hidden; }
        .sidebar {
            width: 220px;
            min-height: 100vh;
            background: #212529;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background: #343a40;
        }
        .sidebar a.active {
            background: #0d6efd;
            font-weight: bold;
        }
    </style>
</head>
<body>

@php
function active($path) {
    return request()->is($path) ? 'active' : '';
}
@endphp

<div class="d-flex">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h5 class="text-white p-3">Sistem</h5>

        <a href="/admin" class="{{ active('admin') }}">Dashboard</a>
        <a href="/buku" class="{{ active('buku*') }}">Data Buku</a>
        <a href="/user" class="{{ active('user*') }}">User</a>
        <a href="/peminjaman" class="{{ active('peminjaman*') }}">Peminjaman</a>
    </div>

    <!-- MAIN -->
    <div class="flex-fill">
        <nav class="navbar navbar-light bg-light px-3">
            <div>
                {{ auth()->user()->name }} ({{ auth()->user()->role }})
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-danger">Logout</button>
            </form>
        </nav>

        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
