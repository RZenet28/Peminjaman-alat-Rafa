<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\UserPasswordMail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')
                    ->with('siswa')
                    ->get();

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:petugas,peminjam',

            'nama_lengkap' => 'required_if:role,peminjam',
            'kelas' => 'required_if:role,peminjam',
            'jurusan' => 'required_if:role,peminjam',
            'nisn' => 'nullable'
        ]);

        // 🔥 Generate password otomatis
        $generatedPassword = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($generatedPassword),
            'role' => $request->role
        ]);

        // Jika peminjam → buat data siswa
        if ($request->role == 'peminjam') {
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'nisn' => $request->nisn
            ]);
        }

        // 🔥 Kirim password ke email
        Mail::to($user->email)->send(new UserPasswordMail($user, $generatedPassword));

        return redirect()->back()
            ->with('success', 'User berhasil ditambahkan dan password dikirim ke email.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:petugas,peminjam',

            'nama_lengkap' => 'required_if:role,peminjam',
            'kelas' => 'required_if:role,peminjam',
            'jurusan' => 'required_if:role,peminjam',
            'nisn' => 'nullable'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // Jika role peminjam
        if ($request->role == 'peminjam') {

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

        } else {
            // Jika diubah jadi petugas → hapus data siswa
            if ($user->siswa) {
                $user->siswa->delete();
            }
        }

        return redirect()->back()
            ->with('success', 'User berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        if ($user->siswa) {
            $user->siswa->delete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}