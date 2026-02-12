<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display listing + search + pagination
     */
    public function index(Request $request)
    {
        $query = Book::with('category');

        // Search
        if ($request->search) {
            $query->where('nama_buku', 'like', '%' . $request->search . '%')
                  ->orWhereHas('category', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        $books = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('admin.books.index', compact('books', 'categories'));
    }

    /**
     * Store new book
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
            'denda_hilang' => 'required|numeric|min:0',
            'denda_rusak' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('books', 'public');
        }

        Book::create([
            'nama_buku' => $request->nama_buku,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'denda_hilang' => $request->denda_hilang,
            'denda_rusak' => $request->denda_rusak,
            'gambar' => $gambarPath
        ]);

        return back()->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Update book
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'nama_buku' => 'required',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
            'denda_hilang' => 'required|numeric|min:0',
            'denda_rusak' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $gambarPath = $book->gambar;

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }

            $gambarPath = $request->file('gambar')->store('books', 'public');
        }

        $book->update([
            'nama_buku' => $request->nama_buku,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'denda_hilang' => $request->denda_hilang,
            'denda_rusak' => $request->denda_rusak,
            'gambar' => $gambarPath
        ]);

        return back()->with('success', 'Buku berhasil diupdate');
    }

    /**
     * Delete book
     */
    public function destroy(Book $book)
    {
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return back()->with('success', 'Buku berhasil dihapus');
    }
}