<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookManageController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'category', 'chapters'])->latest();

        // Pencarian berdasarkan Judul atau Penulis
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('author', function ($sq) use ($search) {
                        $sq->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Filter berdasarkan Kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter berdasarkan Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $books = $query->paginate(10)->withQueryString();
        $categories = Category::all();

        // Statistik Ringkas
        $stats = [
            'total' => Book::count(),
            'published' => Book::where('status', 'published')->count(),
            'draft' => Book::where('status', 'draft')->count(),
            'total_views' => Book::sum('views_count'),
        ];

        return view('admin.books.index', compact('books', 'categories', 'stats'));
    }

    public function show($id)
    {
        // Ambil data buku beserta relasinya
        $book = Book::with(['author', 'category', 'chapters', 'genres'])->findOrFail($id);

        return view('admin.books.show', compact('book'));
    }

    // Mengubah status buku (Draft <-> Published)
    public function toggleStatus($id)
    {
        $book = Book::findOrFail($id);
        $book->status = $book->status === 'published' ? 'draft' : 'published';
        $book->save();

        return back()->with('success', 'Status buku "' . $book->title . '" berhasil diubah.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return back()->with('success', 'Buku berhasil dihapus permanen dari sistem.');
    }
}
