<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = Book::with(['category', 'chapters'])->where('author_id', $userId)->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $books = $query->paginate(10)->withQueryString();
        $categories = Category::all();

        $stats = [
            'total' => Book::where('author_id', $userId)->count(),
            'published' => Book::where('author_id', $userId)->where('status', 'published')->count(),
            'draft' => Book::where('author_id', $userId)->whereIn('status', ['draft', 'pending', 'rejected'])->count(),
            'total_views' => Book::where('author_id', $userId)->sum('views_count'),
        ];

        return view('contributor.stories.index', compact('books', 'categories', 'stats'));
    }

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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $book = Book::create([
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'description' => $request->description,
            'cover_image' => $coverPath,
            'language' => $request->language,
            'target_audience' => $request->target_audience,
            'is_mature' => $request->has('is_mature'),
            'status' => 'draft',
            'views_count' => 0,
        ]);

        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }

        return redirect()->route('contributor.chapters.create', $book->id)
            ->with('success', 'Detail cerita berhasil disimpan! Silakan mulai menulis bab pertama Anda.');
    }

    public function show($id)
    {
        $book = Book::with(['category', 'chapters' => function ($query) {
            $query->orderBy('chapter_number', 'asc');
        }])->where('author_id', Auth::id())->findOrFail($id);

        return view('contributor.stories.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        $genres = Genre::orderBy('name', 'asc')->get();

        return view('contributor.stories.edit', compact('book', 'categories', 'genres'));
    }

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

    public function upload()
    {
        $categories = Category::all();

        return view('contributor.stories.upload', compact('categories'));
    }

    public function storeUpload(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'language'    => 'required|string|max:50',
            'is_mature'   => 'required|boolean',
            'tags'        => 'nullable|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pdf_file'    => 'required|file|mimes:pdf|max:15360',
        ]);

        $bookData = [
            'author_id'   => auth()->id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . time(),
            'description' => $request->description,
            'language'    => $request->language,
            'is_mature'   => $request->is_mature,
            'status'      => 'draft',

            'story_type'  => 'Fiction',
            'copyright'   => 'All Rights Reserved',
            'views_count' => 0,
        ];

        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image');
            $coverName = 'cover-' . Str::slug($request->title) . '-' . time() . '.' . $cover->getClientOriginalExtension();
            $bookData['cover_image'] = $cover->storeAs('covers', $coverName, 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $pdfName = 'pdf-' . Str::slug($request->title) . '-' . time() . '.' . $pdf->getClientOriginalExtension();
            $bookData['pdf_path'] = $pdf->storeAs('submissions/pdfs', $pdfName, 'public');
        }

        $book = Book::create($bookData);

        if ($request->filled('tags')) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];

            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if (!empty($tagName)) {
                    $tag = Tag::firstOrCreate(
                        ['name' => $tagName],
                        ['slug' => Str::slug($tagName)]
                    );
                    $tagIds[] = $tag->id;
                }
            }

            $book->tags()->sync($tagIds);
        }

        return redirect()->route('contributor.stories.index')
            ->with('success', 'Naskah dan Sampul berhasil diunggah! Saat ini sedang dalam antrean review.');
    }
}
