<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Ambil data buku khusus milik user yang sedang login
        $query = Book::with(['category', 'chapters'])->where('author_id', $userId)->latest();

        // Fitur Pencarian Judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $books = $query->paginate(10)->withQueryString();
        $categories = Category::all();

        // Statistik Karya Pribadi
        $stats = [
            'total' => Book::where('author_id', $userId)->count(),
            'published' => Book::where('author_id', $userId)->where('status', 'published')->count(),
            'draft' => Book::where('author_id', $userId)->whereIn('status', ['draft', 'pending', 'rejected'])->count(),
            'total_views' => Book::where('author_id', $userId)->sum('views_count'),
        ];

        return view('contributor.stories.index', compact('books', 'categories', 'stats'));
    }

    // Fungsi untuk menghapus karya sendiri
    public function destroy($id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($id);
        $book->delete();

        return back()->with('success', 'Karya berhasil dihapus.');
    }


    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();

        return view('contributor.stories.create', compact('categories', 'genres'));
    }

    // Menyimpan data cerita baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
            'language' => 'required|string|in:indonesia,inggris,daerah',
            'target_audience' => 'required|string|in:semua umur,remaja,dewasa',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            // Simpan gambar ke folder 'covers' di storage/app/public
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        // Buat buku baru dengan status awal 'draft'
        $book = Book::create([
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5), // Slug unik
            'description' => $request->description,
            'cover_image' => $coverPath,
            'language' => $request->language,
            'target_audience' => $request->target_audience,
            'is_mature' => $request->has('is_mature'),
            'status' => 'draft', // Selalu draft saat pertama kali dibuat
            'views_count' => 0,
        ]);

        // Simpan relasi genre jika ada yang dipilih
        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }

        return redirect()->route('contributor.chapters.create', $book->id)
            ->with('success', 'Detail cerita berhasil disimpan! Silakan mulai menulis bab pertama Anda.');
    }

    public function show($id)
    {
        // Pastikan hanya bisa membuka buku miliknya sendiri
        $book = Book::with(['category', 'chapters' => function ($query) {
            $query->orderBy('chapter_number', 'asc');
        }])->where('author_id', Auth::id())->findOrFail($id);

        return view('contributor.stories.show', compact('book'));
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();

        return view('contributor.stories.edit', compact('book', 'categories', 'genres'));
    }

    // Memperbarui data buku di database
    public function update(Request $request, $id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language' => 'required|string|in:indonesia,inggris,daerah',
            'target_audience' => 'required|string|in:semua umur,remaja,dewasa',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            // Hapus cover lama jika ada (opsional, tambahkan Storage facade jika perlu)
            $coverPath = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $coverPath;
        }

        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->language = $request->language;
        $book->target_audience = $request->target_audience;
        $book->is_mature = $request->has('is_mature');
        $book->slug = Str::slug($request->title) . '-' . $book->id;
        $book->save();

        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }

        return redirect()->route('contributor.stories.show', $book->id)->with('success', 'Informasi buku berhasil diperbarui.');
    }

    // Fungsi untuk memperbarui urutan bab via Ajax (Drag & Drop)
    public function reorderChapters(Request $request, $id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($id);

        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|exists:chapters,id',
            'order.*.position' => 'required|integer',
        ]);

        foreach ($request->order as $item) {
            Chapter::where('book_id', $book->id)
                ->where('id', $item['id'])
                ->update(['chapter_number' => $item['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Urutan bab berhasil diperbarui.']);
    }
}
