<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        return view('contributor.submit.index');
    }
}
