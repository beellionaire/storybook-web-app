<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContributorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributorApplyController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        if ($user->role === 'contributor' || $user->role === 'admin') {
            return redirect()->route('contributor.dashboard');
        }

        return view('frontend.apply.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:13',
            'address' => 'required|string',
            'reason' => 'required|string',
            'terms' => 'accepted'
        ]);

        $user = Auth::user();

        $existingRequest = ContributorRequest::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($existingRequest) {
            return back()->withErrors(['reason' => 'Anda sudah memiliki pengajuan yang sedang menunggu persetujuan admin.']);
        }

        ContributorRequest::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'reason' => $request->reason,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pengajuan berhasil dikirim! Silakan tunggu persetujuan dari Tim Admin.');
    }
}
