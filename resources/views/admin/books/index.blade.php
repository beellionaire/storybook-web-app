<x-app-layout>
    <div class="w-full pb-8 relative" x-data="{
            deleteModalOpen: false,
            selectedBook: null,
            openDelete(book) {
                this.selectedBook = book;
                this.deleteModalOpen = true;
            }
        }">

        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Manajemen Karya</h1>
                <p class="text-slate-500 font-medium">Pantau dan kelola semua cerita yang diterbitkan oleh kontributor.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Cerita</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['total'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest mb-1">Terbit</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['published'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-amber-500 uppercase tracking-widest mb-1">Draft</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['draft'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1">Total Pembaca</p>
                <h3 class="text-3xl font-black text-slate-800">{{ number_format($stats['total_views']) }}</h3>
            </div>
        </div>

        <form action="{{ route('admin.books.index') }}" method="GET"
            class="bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-sm mb-6 flex flex-col lg:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari judul cerita atau penulis..."
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all">
            </div>
            <div class="flex flex-wrap gap-2">
                <select name="category" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-amber-500/20 font-medium">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected' : '' }}>{{ $cat->name
                        }}</option>
                    @endforeach
                </select>
                <select name="status" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-amber-500/20 font-medium">
                    <option value="">Semua Status</option>
                    <option value="published" {{ request('status')=='published' ? 'selected' : '' }}>Terbit</option>
                    <option value="draft" {{ request('status')=='draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @if(request()->anyFilled(['search', 'category', 'status']))
                <a href="{{ route('admin.books.index') }}"
                    class="bg-rose-50 text-rose-600 px-4 py-2.5 rounded-xl text-sm font-bold hover:bg-rose-100 transition-colors">Reset</a>
                @endif
            </div>
        </form>

        <div
            class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead
                        class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-6 lg:px-8 py-5">Judul & Penulis</th>
                            <th class="px-6 py-5">Kategori</th>
                            <th class="px-6 py-5 text-center">Bab</th>
                            <th class="px-6 py-5 text-center">Dilihat</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 lg:px-8 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        @forelse($books as $book)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-16 rounded-lg bg-slate-100 overflow-hidden shadow-sm shrink-0">
                                        @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" width="160" height="40"
                                            class="w-full h-full object-cover">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-800">{{ $book->title }}</p>
                                        <p class="text-xs text-slate-400 font-bold uppercase tracking-tight">Oleh: {{
                                            $book->author->name ?? 'Penulis Dihapus' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-bold">
                                    {{ $book->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-600">
                                {{ $book->chapters->count() }}
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-600">
                                {{ number_format($book->views_count) }}
                            </td>
                            <td class="px-6 py-4">
                                @if($book->status === 'published')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full text-xs font-bold border border-emerald-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Published
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-500 px-3 py-1.5 rounded-full text-xs font-bold border border-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft
                                </span>
                                @endif
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('admin.books.show', $book->id) }}"
                                        class="bg-white border border-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white p-2 rounded-xl transition-all shadow-sm"
                                        title="Review Detail">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.books.toggle', $book->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                            class="bg-white border {{ $book->status === 'published' ? 'border-amber-200 text-amber-600 hover:bg-amber-500' : 'border-emerald-200 text-emerald-600 hover:bg-emerald-500' }} hover:text-white px-3 py-1.5 rounded-xl font-bold transition-all shadow-sm text-xs">
                                            {{ $book->status === 'published' ? 'Jadikan Draft' : 'Terbitkan' }}
                                        </button>
                                    </form>

                                    <button
                                        @click="openDelete({ id: {{ $book->id }}, title: '{{ addslashes($book->title) }}' })"
                                        type="button"
                                        class="bg-white border border-rose-200 text-rose-500 hover:bg-rose-500 hover:text-white p-2 rounded-xl transition-all shadow-sm"
                                        title="Hapus">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 font-medium">Belum ada karya
                                yang masuk ke sistem.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($books->hasPages())
            <div class="px-6 lg:px-8 py-4 border-t border-slate-100">
                {{ $books->links() }}
            </div>
            @endif
        </div>

        @include('admin.books.partials.delete-modal')

    </div>
</x-app-layout>