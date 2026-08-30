<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ContributorRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $pendingRequestsCount = ContributorRequest::where('status', 'pending')->count();

        $recentSubmissions = ContributorRequest::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalBooks',
            'pendingRequestsCount',
            'recentSubmissions'
        ));
    }
}
