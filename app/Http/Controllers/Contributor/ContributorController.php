<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function dashboard()
    {
        return view('contributor.dashboard.index');
    }
}
