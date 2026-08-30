<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExploreController extends Controller
{
    public function index()
    {
        $topCategories = Category::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->get();

        $genres = Genre::withCount(['books' => function ($query) {
            $query->where('status', 'published');
        }])->orderBy('books_count', 'desc')->get();

        return view('frontend.explore.index', compact('topCategories', 'genres'));
    }

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

        return view('frontend.explore.detail', [
            'title' => $category->name,
            'type' => 'Kategori',
            'books' => $books
        ]);
    }

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

        return view('frontend.explore.detail', [
            'title' => $genre->name,
            'type' => 'Genre',
            'books' => $books
        ]);
    }
}
