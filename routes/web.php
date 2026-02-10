<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// =====================
// UNIVERSAL REDIRECT
// =====================
Route::get('/redirect-dashboard', function () {
    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect('/admin');
    } elseif ($role == 'petugas') {
        return redirect('/petugas');
    } else {
        return redirect('/peminjam');
    }
})->middleware('auth');

// =====================
// PROFILE
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// DASHBOARD ROLE
// =====================
Route::middleware(['auth','role:admin'])->get('/admin', function () {
    return view('admin.dashboard');
});

Route::middleware(['auth','role:petugas'])->get('/petugas', function(){
    return view('petugas.dashboard');
});

Route::middleware(['auth','role:peminjam'])->get('/peminjam', function(){
    return view('peminjam.dashboard');
});

// =====================
// ADMIN - TOOLS
// =====================
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/buku', [ToolController::class, 'index']);
    Route::get('/buku/create', [ToolController::class, 'create']);
    Route::post('/buku', [ToolController::class, 'store']);
});

require __DIR__.'/auth.php';
