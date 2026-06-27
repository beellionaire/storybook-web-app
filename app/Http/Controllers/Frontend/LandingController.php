<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // 1. Ambil data untuk section Kategori Terpopuler (Header Explore)
        $topCategories = Category::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->take(3)->get();

        // 2. Ambil data untuk semua Genre (di bawah)
        $genres = Genre::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->get();

        $categories = Category::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->get();

        // 3. LOGIKA BARU: Ambil 4 Buku Terpopuler untuk "Cerita Populer Minggu Ini"
        // Kita urutkan berdasarkan views_count tertinggi
        $popularBooks = Book::with(['author', 'chapters'])
            ->where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->take(4)
            ->get();

        return view('frontend.landing.index', compact('topCategories', 'genres', 'popularBooks', 'categories'));
    }
}
