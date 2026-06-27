<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExploreController extends Controller
{
    // 1. Halaman Utama Explore
    public function index()
    {
        // Ambil 3 Kategori Teratas berdasarkan jumlah buku
        $topCategories = Category::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->take(3)->get();

        // Ambil SEMUA Genre beserta jumlah bukunya
        $genres = Genre::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->get();

        return view('frontend.explore.index', compact('topCategories', 'genres'));
    }

    // 2. Halaman Detail Kategori
    public function showCategory($slug)
    {
        $category = Category::get()->first(function ($c) use ($slug) {
            return Str::slug($c->name) === $slug;
        });

        if (!$category) abort(404, 'Kategori tidak ditemukan.');

        $books = $category->books()->with(['author', 'chapters'])
            ->where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->paginate(12);

        // Kita gunakan view yang sama, cukup bedakan variabel labelnya
        return view('frontend.explore.detail', [
            'title' => $category->name,
            'type' => 'Kategori',
            'books' => $books
        ]);
    }

    // 3. Halaman Detail Genre
    public function showGenre($slug)
    {
        $genre = Genre::get()->first(function ($g) use ($slug) {
            return Str::slug($g->name) === $slug;
        });

        if (!$genre) abort(404, 'Genre tidak ditemukan.');

        $books = $genre->books()->with(['author', 'chapters'])
            ->where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->paginate(12);

        // Menggunakan view yang sama dengan Kategori
        return view('frontend.explore.detail', [
            'title' => $genre->name,
            'type' => 'Genre',
            'books' => $books
        ]);
    }
}
