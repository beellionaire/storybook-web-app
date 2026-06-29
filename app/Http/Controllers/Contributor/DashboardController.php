<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. AMBIL DATA UNTUK TABEL (Gunakan paginate agar links() & hasPages() di View berfungsi)
        $books = Book::where('author_id', $user->id)
            ->latest()
            ->paginate(10);

        // 2. AMBIL SEMUA BUKU SEKALI SAJA UNTUK STATISTIK (Agar tidak query ke database berkali-kali)
        $allBooks = Book::where('author_id', $user->id)->get();

        // 3. HITUNG STATISTIK (Menggunakan Collection dari $allBooks)
        $stats = [
            'total'       => $allBooks->count(),
            'published'   => $allBooks->where('status', 'published')->count(),
            'draft'       => $allBooks->whereIn('status', ['draft', 'pending', 'rejected'])->count(),
            'total_views' => $allBooks->sum('views_count'),
        ];

        // Tetap deklarasikan variabel ini jika View Anda membutuhkannya
        $totalCerita = $stats['total'];
        $totalPembaca = $stats['total_views'];

        $totalBab = \App\Models\Chapter::whereHas('book', function ($q) use ($user) {
            $q->where('author_id', $user->id);
        })->count();

        // 4. AMBIL DATA KATEGORI & GENRE (Pastikan diakhiri dengan get())
        $categories = Category::latest()->get();
        $genres = Genre::with('subgenres')->latest()->get();

        return view('contributor.stories.index', compact(
            'user',
            'totalCerita',
            'totalBab',
            'totalPembaca',
            'books',
            'stats',
            'categories',
            'genres'
        ));
    }
}
