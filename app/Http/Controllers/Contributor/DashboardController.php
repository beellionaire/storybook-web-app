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

        $books = Book::where('author_id', $user->id)
            ->latest()
            ->paginate(10);

        $allBooks = Book::where('author_id', $user->id)->get();

        $stats = [
            'total'       => $allBooks->count(),
            'published'   => $allBooks->where('status', 'published')->count(),
            'draft'       => $allBooks->whereIn('status', ['draft', 'pending', 'rejected'])->count(),
            'total_views' => $allBooks->sum('views_count'),
        ];

        $totalCerita = $stats['total'];
        $totalPembaca = $stats['total_views'];

        $totalBab = \App\Models\Chapter::whereHas('book', function ($q) use ($user) {
            $q->where('author_id', $user->id);
        })->count();

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
