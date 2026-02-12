<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class ProfileSiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'peminjam') {
            abort(403);
        }

        $user->load('siswa');

        return view('peminjam.profile.siswa', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'peminjam') {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nisn' => 'nullable'
        ]);

        // Update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        // Update atau buat siswa kalau belum ada
        if ($user->siswa) {
            $user->siswa->update([
                'nama_lengkap' => $request->nama_lengkap,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'nisn' => $request->nisn
            ]);
        } else {
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'nisn' => $request->nisn
            ]);
        }

        return back()->with('success', 'Profile siswa berhasil diperbarui');
    }
}