<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContributorRequest;
use Illuminate\Http\Request;

class SubmissionManageController extends Controller
{
    // 1. Menampilkan Halaman Persetujuan Penulis
    public function index(Request $request)
    {
        // Mengambil data pengajuan beserta relasi user-nya
        $query = ContributorRequest::with('user')->latest();

        // Fitur Pencarian (berdasarkan nama pendaftar atau email akun)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('email', 'like', '%' . $search . '%');
                    });
            });
        }

        // Fitur Filter Status (pending, approved, rejected)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $submissions = $query->paginate(10)->withQueryString();

        return view('admin.submissions.index', compact('submissions'));
    }

    // 2. Menyetujui Pendaftaran (Approve)
    public function approve($id)
    {
        $submission = ContributorRequest::findOrFail($id);

        // Ubah status pengajuan menjadi disetujui
        $submission->status = 'approved';
        $submission->save();

        // Ubah role pengguna di tabel users menjadi 'contributor'
        // (Pastikan tidak mengubah role Admin jika kebetulan Admin yang mendaftar)
        if ($submission->user->role !== 'admin') {
            $submission->user->role = 'contributor';
            $submission->user->save();
        }

        return back()->with('success', 'Pengajuan berhasil disetujui. Pengguna sekarang adalah Contributor.');
    }

    // 3. Menolak Pendaftaran (Reject)
    public function reject(Request $request, $id)
    {
        // Validasi wajib mengisi alasan penolakan
        $request->validate([
            'admin_notes' => ['required', 'string', 'max:1000'],
        ]);

        $submission = ContributorRequest::findOrFail($id);

        // Ubah status menjadi ditolak dan simpan alasan Admin
        $submission->status = 'rejected';
        $submission->admin_notes = $request->admin_notes;
        $submission->save();

        // Kembalikan role ke user biasa jika sebelumnya sempat disetujui lalu dibatalkan
        if ($submission->user->role === 'contributor') {
            $submission->user->role = 'user';
            $submission->user->save();
        }

        return back()->with('success', 'Pengajuan pendaftaran telah ditolak.');
    }
}
