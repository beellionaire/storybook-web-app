<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Contributor\ContributorController as ContributorContributorController;
use App\Http\Controllers\Contributor\SubmissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.landing.index');
})->name('home');

Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/detail', [BooksController::class, 'detail'])->name('books.detail');
Route::get('/genres', [BooksController::class, 'genre'])->name('genre.index');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (Wajib Login & Verifikasi Email)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. PENGATUR LALU LINTAS DASHBOARD (Redirector)
    // Setelah login, user akan otomatis diarahkan ke ruangannya masing-masing
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'contributor') {
            return redirect()->route('contributor.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');


    // 2. PENGATURAN PROFIL (Semua Role bisa akses)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // 3. AREA USER BIASA (Pembaca Cilik / Orang Tua)
    Route::middleware(['role:user'])->prefix('user')->name('user.')->group(function () {
        // Akses url: /user/dashboard
        Route::get('/dashboard', [UserUserController::class, 'dashboard'])->name('dashboard');
        // Route::get('/history', [UserController::class, 'readingHistory'])->name('history');
    });


    // 4. AREA CONTRIBUTOR (Penulis)
    // Admin diizinkan masuk ke area ini jika sewaktu-waktu perlu memantau langsung
    Route::middleware(['role:contributor,admin'])->prefix('contributor')->name('contributor.')->group(function () {
        // Akses url: /contributor/dashboard
        Route::get('/dashboard', [ContributorContributorController::class, 'dashboard'])->name('dashboard');

        Route::get('/submission', [SubmissionController::class, 'index'])->name('submit.index');

        // Manajemen Cerita
        // Route::get('/my-stories', [StoryController::class, 'index'])->name('stories.index');
        // Route::get('/write', [StoryController::class, 'create'])->name('stories.create');
        // Route::post('/write', [StoryController::class, 'store'])->name('stories.store');
    });


    // 5. AREA ADMIN (Hanya Admin)
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // Akses url: /admin/dashboard
        Route::get('/dashboard', [AdminAdminController::class, 'dashboard'])->name('dashboard');

        // Manajemen Platform
        Route::get('/users', [UserManageController::class, 'index'])->name('users');
        // Route::get('/submissions', [AdminController::class, 'manageSubmissions'])->name('submissions');
        // Route::post('/submissions/{id}/approve', [AdminController::class, 'approve'])->name('submissions.approve');
    });
});

require __DIR__ . '/auth.php';
