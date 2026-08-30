<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\ReadingProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{

    public function index()
    {
        return view('frontend.books.index');
    }

    public function library(Request $request)
    {
        $query = \App\Models\Book::with(['author', 'chapters'])->where('status', 'published');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereHas('author', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
        }

        if ($request->filled('genre') && $request->genre !== 'semua') {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('slug', $request->genre);
            });
        }

        if ($request->filled('status') && $request->status !== 'semua') {
        }

        $sort = $request->get('sort', 'populer');
        if ($sort === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'rating') {
            $query->orderBy('views_count', 'desc');
        } else {
            $query->orderBy('views_count', 'desc');
        }

        $books = $query->paginate(16)->withQueryString();

        $genres = \App\Models\Genre::orderBy('name', 'asc')->get();

        return view('frontend.books.index', compact('books', 'genres'));
    }

    public function readStory($slug)
    {
        $book = \App\Models\Book::with(['author', 'category', 'genres', 'chapters' => function ($q) {
            $q->where('status', 'published')->orderBy('chapter_number', 'asc');
        }])->where('slug', $slug)->where('status', 'published')->firstOrFail();

        $totalWords = 0;
        foreach ($book->chapters as $chapter) {
            $text = is_array($chapter->content)
                ? collect($chapter->content)->pluck('text')->join(' ')
                : strip_tags($chapter->content);
            $totalWords += str_word_count($text);
        }

        $similarBooks = \App\Models\Book::with('author')
            ->where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->take(3)
            ->get();

        return view('frontend.books.show', compact('book', 'totalWords', 'similarBooks'));
    }

    public function readChapter($book_slug, $chapter_number)
    {
        $book = Book::where('slug', $book_slug)
            ->where('status', 'published')
            ->firstOrFail();

        $chapter = Chapter::where('book_id', $book->id)
            ->where('chapter_number', $chapter_number)
            ->where('status', 'published')
            ->firstOrFail();

        if (Auth::check()) {
            ReadingProgress::updateOrCreate(
                ['user_id' => Auth::id(), 'book_id' => $book->id],
                ['chapter_id' => $chapter->id, 'updated_at' => now()]
            );
        }

        $prevChapter = Chapter::where('book_id', $book->id)
            ->where('status', 'published')
            ->where('chapter_number', '<', $chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

        $nextChapter = Chapter::where('book_id', $book->id)
            ->where('status', 'published')
            ->where('chapter_number', '>', $chapter_number)
            ->orderBy('chapter_number', 'asc')
            ->first();

        $book->increment('views_count');

        $contentData = is_array($chapter->content) ? $chapter->content : json_decode($chapter->content, true);

        return view('frontend.books.read', compact('book', 'chapter', 'contentData', 'prevChapter', 'nextChapter'));
    }

    public function readPdf($slug)
    {
        // 1. Cari buku berdasarkan slug
        $book = Book::where('slug', $slug)->firstOrFail();

        // 2. Cek apakah buku benar-benar memiliki file PDF
        if (!$book->pdf_path) {
            abort(404, 'File PDF tidak ditemukan.');
        }

        // 3. Tambahkan jumlah tayangan (views_count)
        $book->increment('views_count');

        // 4. Arahkan pengguna ke URL file PDF di storage
        return redirect(asset('storage/' . $book->pdf_path));
    }
}
