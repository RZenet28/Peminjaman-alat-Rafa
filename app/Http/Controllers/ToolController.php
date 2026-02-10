<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    // Tampilkan semua data alat
    public function index()
    {
        $tools = Tool::all();
        return view('tools.index', compact('tools'));
    }

    // Form tambah alat
    public function create()
    {
        return view('tools.create');
    }

    // Simpan data alat
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer'
        ]);

        Tool::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'description' => $request->description
        ]);

        return redirect('/buku')->with('success','Data berhasil ditambahkan');
    }
}
