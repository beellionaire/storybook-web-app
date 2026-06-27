<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {
        return view('frontend.books.index');
    }

    public function library(Request $request)
    {
        // 1. Ambil data dasar (Hanya buku yang di-publish)
        $query = \App\Models\Book::with(['author', 'chapters'])->where('status', 'published');

        // 2. Filter Pencarian Teks
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereHas('author', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
        }

        // 3. Filter Genre
        if ($request->filled('genre') && $request->genre !== 'semua') {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('slug', $request->genre);
            });
        }

        // 4. Filter Status (Jika Anda punya kolom 'completion_status' di tabel books.
        // Jika tidak punya, abaikan atau sesuaikan dengan struktur tabel Anda)
        if ($request->filled('status') && $request->status !== 'semua') {
            // Contoh asumsi: $query->where('completion_status', $request->status);
        }

        // 5. Pengurutan (Sorting)
        $sort = $request->get('sort', 'populer');
        if ($sort === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort === 'rating') {
            // Sesuaikan jika punya kolom rating, jika tidak kita fallback ke views
            $query->orderBy('views_count', 'desc');
        } else {
            // Default: Populer (berdasarkan views)
            $query->orderBy('views_count', 'desc');
        }

        // 6. Eksekusi Query dengan Pagination (16 buku per halaman)
        $books = $query->paginate(16)->withQueryString();

        // 7. Ambil daftar semua genre untuk menu tab
        $genres = \App\Models\Genre::orderBy('name', 'asc')->get();

        return view('frontend.books.index', compact('books', 'genres'));
    }

    public function readStory($slug)
    {
        // Cari buku berdasarkan slug, pastikan statusnya 'published'
        $book = \App\Models\Book::with(['author', 'category', 'genres', 'chapters' => function ($q) {
            // Hanya ambil bab yang sudah dipublikasikan, urutkan dari bab 1
            $q->where('status', 'published')->orderBy('chapter_number', 'asc');
        }])->where('slug', $slug)->where('status', 'published')->firstOrFail();

        // (Opsional) Hitung total kata dari seluruh bab yang sudah publish
        $totalWords = 0;
        foreach ($book->chapters as $chapter) {
            $text = is_array($chapter->content)
                ? collect($chapter->content)->pluck('text')->join(' ')
                : strip_tags($chapter->content);
            $totalWords += str_word_count($text);
        }

        // Ambil cerita serupa (berdasarkan kategori yang sama)
        $similarBooks = \App\Models\Book::with('author')
            ->where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->take(3)
            ->get();

        return view('frontend.books.show', compact('book', 'totalWords', 'similarBooks'));
    }

    // Fungsi untuk halaman membaca cerita
    public function readChapter($book_slug, $chapter_number)
    {
        // 1. Validasi buku
        $book = Book::where('slug', $book_slug)
            ->where('status', 'published')
            ->firstOrFail();

        // 2. Validasi bab yang sedang dibaca
        $chapter = Chapter::where('book_id', $book->id)
            ->where('chapter_number', $chapter_number)
            ->where('status', 'published')
            ->firstOrFail();

        // 3. Cari Bab Sebelumnya (untuk navigasi)
        $prevChapter = Chapter::where('book_id', $book->id)
            ->where('status', 'published')
            ->where('chapter_number', '<', $chapter_number)
            ->orderBy('chapter_number', 'desc')
            ->first();

        // 4. Cari Bab Selanjutnya (untuk navigasi)
        $nextChapter = Chapter::where('book_id', $book->id)
            ->where('status', 'published')
            ->where('chapter_number', '>', $chapter_number)
            ->orderBy('chapter_number', 'asc')
            ->first();

        // 5. Tambah View Count (hanya jika halaman ini dibuka)
        // Gunakan session agar tidak spam refresh, tapi untuk sekarang kita increment langsung
        $book->increment('views_count');

        // 6. Pastikan konten siap dibaca sebagai array
        $contentData = is_array($chapter->content) ? $chapter->content : json_decode($chapter->content, true);

        return view('frontend.books.read', compact('book', 'chapter', 'contentData', 'prevChapter', 'nextChapter'));
    }
}
