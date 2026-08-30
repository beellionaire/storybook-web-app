<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContributorRequest;
use Illuminate\Http\Request;

class SubmissionManageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContributorRequest::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $submissions = $query->paginate(10)->withQueryString();

        return view('admin.submissions.index', compact('submissions'));
    }

    public function approve($id)
    {
        $submission = ContributorRequest::findOrFail($id);

        $submission->status = 'approved';
        $submission->save();

        if ($submission->user->role !== 'admin') {
            $submission->user->role = 'contributor';
            $submission->user->save();
        }

        return back()->with('success', 'Pengajuan berhasil disetujui. Pengguna sekarang adalah Contributor.');
    }

    public function reject(Request $request, $id)
    {
        $submission = ContributorRequest::findOrFail($id);

        $submission->status = 'rejected';

        $submission->save();

        if ($submission->user->role === 'contributor') {
            $submission->user->role = 'user';
            $submission->user->save();
        }

        return back()->with('success', 'Pengajuan pendaftaran berhasil ditolak.');
    }
}
