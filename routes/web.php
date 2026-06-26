<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\BookManageController;
use App\Http\Controllers\Admin\CategoryGenreController;
use App\Http\Controllers\Admin\SubmissionManageController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Contributor\ChapterController;
use App\Http\Controllers\Contributor\ContributorController as ContributorContributorController;
use App\Http\Controllers\Contributor\StoryController;
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
    Route::middleware(['role:contributor,admin'])->prefix('contributor')->name('contributor.')->group(function () {
        // Akses url: /contributor/dashboard
        Route::get('/dashboard', [ContributorContributorController::class, 'dashboard'])->name('dashboard');

        Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
        Route::get('/stories/create', [StoryController::class, 'create'])->name('stories.create');
        Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
        Route::get('/stories/{id}', [StoryController::class, 'show'])->name('stories.show');
        Route::delete('/stories/{id}', [StoryController::class, 'destroy'])->name('stories.destroy');
        Route::post('/stories/{id}/reorder-chapters', [StoryController::class, 'reorderChapters'])->name('stories.reorder_chapters');
        // Rute Edit Info Buku
        Route::get('/stories/{id}/edit', [StoryController::class, 'edit'])->name('stories.edit');
        Route::put('/stories/{id}', [StoryController::class, 'update'])->name('stories.update');

        Route::get('/stories/{book_id}/chapters/create', [ChapterController::class, 'create'])->name('chapters.create');
        Route::post('/stories/{book_id}/chapters', [ChapterController::class, 'store'])->name('chapters.store');
        // Rute Edit Bab
        Route::get('/stories/{book_id}/chapters/{chapter_id}/edit', [ChapterController::class, 'edit'])->name('chapters.edit');
        Route::put('/stories/{book_id}/chapters/{chapter_id}', [ChapterController::class, 'update'])->name('chapters.update');
        // Ubah dari PUT menjadi DELETE
        Route::delete('/stories/{book_id}/chapters/{chapter_id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');
    });


    // 5. AREA ADMIN (Hanya Admin)
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // Akses url: /admin/dashboard
        Route::get('/dashboard', [AdminAdminController::class, 'dashboard'])->name('dashboard');

        // Manajemen Platform
        Route::get('/users', [UserManageController::class, 'index'])->name('users.index');
        Route::post('/users', [UserManageController::class, 'store'])->name('users.store');
        Route::put('/users/{id}', [UserManageController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserManageController::class, 'destroy'])->name('users.destroy');

        // Submission
        Route::get('/submissions', [SubmissionManageController::class, 'index'])->name('submissions.index');
        Route::post('/submissions/{id}/approve', [SubmissionManageController::class, 'approve'])->name('submissions.approve');
        Route::post('/submissions/{id}/reject', [SubmissionManageController::class, 'reject'])->name('submissions.reject');

        // Category
        Route::get('/taxonomy', [CategoryGenreController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryGenreController::class, 'storeCategory'])->name('categories.store');
        Route::delete('/categories/{id}', [CategoryGenreController::class, 'destroyCategory'])->name('categories.destroy');
        Route::post('/genres', [CategoryGenreController::class, 'storeGenre'])->name('genres.store');
        Route::delete('/genres/{id}', [CategoryGenreController::class, 'destroyGenre'])->name('genres.destroy');
        Route::post('/subgenres', [CategoryGenreController::class, 'storeSubgenre'])->name('subgenres.store');
        Route::delete('/subgenres/{id}', [CategoryGenreController::class, 'destroySubgenre'])->name('subgenres.destroy');

        // Book
        Route::get('/books', [BookManageController::class, 'index'])->name('books.index');
        Route::get('/books/{id}', [BookManageController::class, 'show'])->name('books.show');
        Route::patch('/books/{id}/toggle', [BookManageController::class, 'toggleStatus'])->name('books.toggle');
        Route::delete('/books/{id}', [BookManageController::class, 'destroy'])->name('books.destroy');
    });
});

require __DIR__ . '/auth.php';
