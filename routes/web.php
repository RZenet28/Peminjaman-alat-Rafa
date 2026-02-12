<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

// =====================
// UNIVERSAL REDIRECT
// =====================
Route::get('/redirect-dashboard', function () {
    $user = Auth::user();
    $role = $user->role;

    if ($role == 'admin') {
        return redirect('/admin');
    } elseif ($role == 'petugas') {
        return redirect('/petugas/dashboard');
    } elseif ($role == 'anggota' || $role == 'siswa') {
        return redirect('/peminjam');
    } else {
        return redirect('/peminjam');
    }
})->middleware('auth')->name('redirect.dashboard');

// =====================
// PROFILE
// =====================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// DASHBOARD ROLE
// =====================
Route::middleware(['auth','role:admin'])->get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth','role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth','role:peminjam'])->prefix('peminjam')->name('peminjam.')->group(function () {
    Route::get('/dashboard', [PeminjamController::class, 'dashboard'])->name('peminjam.dashboard');
});

// =====================
// ADMIN - TOOLS
// =====================
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/buku', [ToolController::class, 'index']);
    Route::get('/buku/create', [ToolController::class, 'create']);
    Route::post('/buku', [ToolController::class, 'store']);
});

// =====================
// ROUTE RESOURCES
// =====================

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
    });

Route::middleware(['auth'])->group(function () {

    Route::get('/profile-siswa', [App\Http\Controllers\ProfileSiswaController::class, 'index'])
        ->name('peminjam.profile.siswa');

    Route::put('/profile-siswa', [App\Http\Controllers\ProfileSiswaController::class, 'update'])
        ->name('peminjam.profile.siswa.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('books', \App\Http\Controllers\Admin\BookController::class);

});

require __DIR__.'/auth.php';