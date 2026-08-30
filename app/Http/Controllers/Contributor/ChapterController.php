<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    // Menampilkan kanvas penulisan
    public function create($book_id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($book_id);
        $nextChapterNumber = $book->chapters()->max('chapter_number') + 1;

        return view('contributor.chapters.create', compact('book', 'nextChapterNumber'));
    }

    // Menyimpan bab cerita beserta multi-halaman
    public function store(Request $request, $book_id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($book_id);

        $request->validate([
            'chapter_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'pages' => 'required|array|min:1',
            'pages.*.text' => 'required|string',
            'pages.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $structuredPages = [];

        foreach ($request->pages as $page) {
            $imageUrl = null;
            if (isset($page['image'])) {
                $imagePath = $page['image']->store('chapters', 'public');
                $imageUrl = asset('storage/' . $imagePath);
            }

            $structuredPages[] = [
                'image' => $imageUrl,
                'text' => $page['text']
            ];
        }

        $nextChapterNumber = $book->chapters()->max('chapter_number') + 1;
        $status = in_array($request->action, ['publish', 'publish_and_next']) ? 'published' : 'draft';

        Chapter::create([
            'book_id' => $book->id,
            'chapter_number' => $request->chapter_number,
            'title' => $request->title,
            'content' => $structuredPages,
            'visual_image' => null,
            'status' => $status,
        ]);

        if ($request->action === 'publish_and_next') {
            return redirect()->route('contributor.chapters.create', $book->id)
                ->with('success', 'Bab ' . $nextChapterNumber . ' diterbitkan! Silakan lanjut menulis bab berikutnya.');
        }

        return redirect()->route('contributor.stories.show', $book->id)
            ->with('success', 'Bab "' . $request->title . '" berhasil disimpan!');
    }

    public function edit($book_id, $chapter_id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($book_id);
        $chapter = Chapter::where('book_id', $book->id)->findOrFail($chapter_id);

        $pages = [];

        $contentData = is_array($chapter->content) ? $chapter->content : json_decode($chapter->content, true);

        if ($contentData && is_array($contentData)) {
            foreach ($contentData as $pageData) {
                $pages[] = [
                    'text' => $pageData['text'] ?? '',
                    'imagePreview' => $pageData['image'] ?? null,
                    'existingImage' => $pageData['image'] ?? null
                ];
            }
        } else {
            $pages[] = ['text' => '', 'imagePreview' => null, 'existingImage' => null];
        }

        return view('contributor.chapters.edit', compact('book', 'chapter', 'pages'));
    }

    public function update(Request $request, $book_id, $chapter_id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($book_id);
        $chapter = Chapter::where('book_id', $book->id)->findOrFail($chapter_id);

        $request->validate([
            'chapter_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'pages' => 'required|array|min:1',
            'pages.*.text' => 'required|string',
            'pages.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $structuredPages = [];

        foreach ($request->pages as $page) {
            $imageUrl = $page['old_image'] ?? null;

            if (isset($page['image'])) {
                if ($imageUrl) {
                    $oldPath = Str::after($imageUrl, 'storage/');
                    Storage::disk('public')->delete($oldPath);
                }

                $imagePath = $page['image']->store('chapters', 'public');
                $imageUrl = asset('storage/' . $imagePath);
            }

            $structuredPages[] = [
                'image' => $imageUrl,
                'text' => $page['text']
            ];
        }

        $chapter->update([
            'title' => $request->title,
            'chapter_number' => $request->chapter_number,
            'content' => $structuredPages, 
            'status' => $request->action === 'publish' ? 'published' : 'draft',
        ]);

        return redirect()->route('contributor.stories.show', $book->id)
            ->with('success', 'Bab berhasil diperbarui!');
    }

    public function destroy($book_id, $chapter_id)
    {
        $book = Book::where('author_id', Auth::id())->findOrFail($book_id);
        $chapter = Chapter::where('book_id', $book->id)->findOrFail($chapter_id);

        $contentData = is_array($chapter->content) ? $chapter->content : json_decode($chapter->content, true);
        if ($contentData && is_array($contentData)) {
            foreach ($contentData as $pageData) {
                if (!empty($pageData['image'])) {
                    $oldPath = Str::after($pageData['image'], 'storage/');
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }

        $chapter->delete();

        return back()->with('success', 'Bab beserta gambar visualnya berhasil dihapus secara permanen.');
    }
}
