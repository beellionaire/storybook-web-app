<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ReadingProgress;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $watchlists = Watchlist::with('book.author')->where('user_id', $user->id)->latest()->get();

        $progresses = ReadingProgress::with(['book.author', 'book.chapters', 'chapter'])
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('frontend.library.index', compact('watchlists', 'progresses'));
    }

    public function toggleWatchlist(Book $book)
    {
        $user = Auth::user();
        $watchlist = Watchlist::where('user_id', $user->id)->where('book_id', $book->id)->first();

        if ($watchlist) {
            $watchlist->delete();
            return back()->with('success', 'Dihapus dari pustaka.');
        } else {
            Watchlist::create(['user_id' => $user->id, 'book_id' => $book->id]);
            return back()->with('success', 'Ditambahkan ke pustaka.');
        }
    }
}
