<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManageController extends Controller
{
    // Menampilkan daftar pengguna beserta fitur pencarian & filter role
    public function index(Request $request)
    {
        $query = User::query();

        // Fitur Pencarian (berdasarkan nama atau email)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Fitur Filter Role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Mengambil data dengan pagination (10 data per halaman)
        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // Menyimpan pengguna baru (Create)
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', Rule::in(['admin', 'contributor', 'user'])],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Mengembalikan response dengan session 'success' untuk mentrigger Toast
        return back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Memperbarui data pengguna (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', \Illuminate\Validation\Rule::in(['admin', 'contributor', 'user'])],
            // Ignore email unik untuk user yang sedang diedit ini
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id)],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna (Delete)
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cegah admin menghapus akunnya sendiri
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return back()->with('success', 'Akun pengguna berhasil dihapus permanen.');
    }
}
