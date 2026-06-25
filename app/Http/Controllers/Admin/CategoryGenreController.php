<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Subgenre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryGenreController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        // Mengambil genre beserta subgenre-nya
        $genres = Genre::with('subgenres')->latest()->get();

        return view('admin.categories.index', compact('categories', 'genres'));
    }

    // --- MANAJEMEN KATEGORI ---
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:categories,name']);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $request->icon ?? '📚', // Default icon jika kosong
        ]);

        return back()->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function destroyCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }

    // --- MANAJEMEN GENRE ---
    public function storeGenre(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:genres,name']);

        Genre::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Genre baru berhasil ditambahkan.');
    }

    public function destroyGenre($id)
    {
        Genre::findOrFail($id)->delete();
        return back()->with('success', 'Genre beserta subgenrenya berhasil dihapus.');
    }

    // --- MANAJEMEN SUBGENRE ---
    public function storeSubgenre(Request $request)
    {
        $request->validate([
            'genre_id' => 'required|exists:genres,id',
            'name' => 'required|string|max:255',
        ]);

        Subgenre::create([
            'genre_id' => $request->genre_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Subgenre berhasil ditambahkan.');
    }

    public function destroySubgenre($id)
    {
        Subgenre::findOrFail($id)->delete();
        return back()->with('success', 'Subgenre berhasil dihapus.');
    }
}
