<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return view('frontend.books.index');
    }

    public function detail()
    {
        return view('frontend.books.detail');
    }

    public function genre()
    {
        return view('frontend.genre.index');
    }
}
