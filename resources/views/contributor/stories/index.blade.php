<x-app-layout>
    <div class="w-full pb-8 relative" x-data="{
            deleteModalOpen: false,
            selectedBook: null,
            openDelete(book) {
                this.selectedBook = book;
                this.deleteModalOpen = true;
            }
        }">

        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-6">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Karya Saya</h1>
                <p class="text-slate-500 font-medium">Kelola cerita, tambah bab baru, dan pantau perkembangan pembaca
                    Anda.</p>
            </div>

            <!-- Kumpulan Tombol Aksi -->
            <div class="flex flex-col sm:flex-row gap-3">
                <!-- Tombol Upload Naskah (PDF/DOCX) -->
                <a href="{{ route('contributor.stories.upload') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white border border-slate-200 text-slate-700 px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-slate-50 hover:-translate-y-0.5 transition-all">
                    <i class="fa-solid fa-file-arrow-up text-blue-600"></i>
                    Upload Naskah
                </a>

                <!-- Tombol Tulis Cerita (Manual) -->
                <a href="{{ route('contributor.stories.create') }}"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-tr from-amber-500 to-orange-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-[0_8px_20px_rgb(249,115,22,0.3)] hover:-translate-y-0.5 transition-all">
                    <i class="fa-solid fa-pen-nib"></i>
                    Tulis Manual
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-10">
            <div
                class="bg-white p-5 sm:p-6 rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.03)] relative overflow-hidden group">
                <div class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity">
                    <i class="fa-solid fa-book text-8xl"></i>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Cerita</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['total'] }}</h3>
            </div>
            <div
                class="bg-white p-5 sm:p-6 rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.03)] relative overflow-hidden group">
                <div
                    class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity text-emerald-500">
                    <i class="fa-solid fa-check-circle text-8xl"></i>
                </div>
                <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest mb-1">Published</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['published'] }}</h3>
            </div>
            <div
                class="bg-white p-5 sm:p-6 rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.03)] relative overflow-hidden group">
                <div
                    class="absolute right-[-10px] top-[-10px] opacity-5 group-hover:opacity-10 transition-opacity text-amber-500">
                    <i class="fa-solid fa-pen-ruler text-8xl"></i>
                </div>
                <p class="text-[10px] font-bold text-amber-500 uppercase tracking-widest mb-1">Draft / Pending</p>
                <h3 class="text-3xl font-black text-slate-800">{{ $stats['draft'] }}</h3>
            </div>
            <div
                class="bg-gradient-to-br from-slate-900 to-slate-800 p-5 sm:p-6 rounded-[2rem] border border-slate-700 shadow-lg relative overflow-hidden group">
                <div
                    class="absolute right-[-10px] top-[-10px] opacity-10 group-hover:opacity-20 transition-opacity text-white">
                    <i class="fa-solid fa-eye text-8xl"></i>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Pembaca</p>
                <h3 class="text-3xl font-black text-white">{{ number_format($stats['total_views']) }}</h3>
            </div>
        </div>

        <form action="{{ route('contributor.stories.index') }}" method="GET"
            class="bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-sm mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-slate-400"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul ceritamu..."
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-orange-500/20 focus:bg-white transition-all">
            </div>
            <div class="flex flex-wrap gap-2">
                <select name="category" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-orange-500/20 font-medium">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected' : '' }}>{{ $cat->name
                        }}</option>
                    @endforeach
                </select>
                <select name="status" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-orange-500/20 font-medium">
                    <option value="">Semua Status</option>
                    <option value="published" {{ request('status')=='published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status')=='draft' ? 'selected' : '' }}>Draft</option>
                    <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Menunggu Review
                    </option>
                </select>
                @if(request()->anyFilled(['search', 'category', 'status']))
                <a href="{{ route('contributor.stories.index') }}"
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
                            <th class="px-6 lg:px-8 py-5">Info Cerita</th>
                            <th class="px-6 py-5">Kategori</th>
                            <th class="px-6 py-5 text-center">Statistik</th>
                            <th class="px-6 py-5">Status Pengajuan</th>
                            <th class="px-6 lg:px-8 py-5 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        @forelse($books as $book)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-14 h-20 rounded-xl bg-slate-100 overflow-hidden shadow-sm shrink-0 border border-slate-200/50">
                                        @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" width="160" height="40"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <i class="fa-solid fa-image text-xl"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-800 text-base mb-0.5">{{ $book->title }}</p>
                                        <div
                                            class="flex items-center gap-3 text-xs text-slate-400 font-bold uppercase tracking-tight">
                                            <span><i class="fa-solid fa-language mr-1"></i> {{ substr($book->language,
                                                0, 3) ?? 'ID' }}</span>
                                            <span>&bull;</span>
                                            <span class="{{ $book->is_mature ? 'text-rose-500' : '' }}"><i
                                                    class="fa-solid {{ $book->is_mature ? 'fa-triangle-exclamation' : 'fa-child' }} mr-1"></i>
                                                {{ $book->is_mature ? '18+' : 'SU' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="bg-orange-50 text-orange-600 border border-orange-100 px-3 py-1.5 rounded-lg text-xs font-bold">
                                    {{ $book->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <div class="flex flex-col gap-1 items-center">
                                    <span class="text-slate-700 font-black"><i
                                            class="fa-solid fa-list-ol text-slate-400 mr-1.5"></i> {{
                                        $book->chapters->count() }} Bab</span>
                                    <span class="text-slate-700 font-black"><i
                                            class="fa-solid fa-eye text-slate-400 mr-1.5"></i> {{
                                        number_format($book->views_count) }} Kali</span>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @if($book->status === 'published')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full text-xs font-bold border border-emerald-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Published
                                </span>
                                @elseif($book->status === 'pending')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold border border-amber-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Review
                                    Admin
                                </span>
                                @elseif($book->status === 'rejected')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-600 px-3 py-1.5 rounded-full text-xs font-bold border border-rose-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-500 px-3 py-1.5 rounded-full text-xs font-bold border border-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft Lokal
                                </span>
                                @endif
                            </td>

                            <td class="px-6 lg:px-8 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('contributor.stories.show', $book->id) }}"
                                        class="bg-white border border-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white px-3 py-1.5 rounded-xl font-bold transition-all shadow-sm text-xs flex items-center gap-1.5"
                                        title="Kelola Bab">
                                        <i class="fa-solid fa-list-check"></i> Bab
                                    </a>

                                    <a href="{{ route('contributor.stories.edit', $book->id) }}"
                                        class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 p-2 rounded-xl transition-all shadow-sm"
                                        title="Edit Sampul & Sinopsis">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <button
                                        @click="openDelete({ id: {{ $book->id }}, title: '{{ addslashes($book->title) }}' })"
                                        type="button"
                                        class="bg-white border border-rose-200 text-rose-500 hover:bg-rose-500 hover:text-white p-2 rounded-xl transition-all shadow-sm"
                                        title="Hapus Karya">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-box-open text-4xl mb-3 opacity-50"></i>
                                    <p class="font-medium text-slate-500">Anda belum menulis cerita apapun.</p>
                                    <a href="{{ route('contributor.stories.create') }}"
                                        class="mt-4 text-orange-500 font-bold hover:underline">Mulai menulis
                                        sekarang!</a>
                                </div>
                            </td>
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

        <div x-show="deleteModalOpen" style="display: none;" class="relative z-50">
            <div x-show="deleteModalOpen" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm">
            </div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div x-show="deleteModalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        @click.away="deleteModalOpen = false"
                        class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-slate-100">

                        <form x-bind:action="`{{ url('/contributor/stories') }}/${selectedBook?.id}`" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="bg-white px-6 pb-6 pt-8 sm:px-8 sm:pt-8">
                                <div
                                    class="sm:flex sm:items-start flex-col sm:flex-row items-center text-center sm:text-left">
                                    <div
                                        class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-12 sm:w-12 mb-4 sm:mb-0">
                                        <i class="fa-solid fa-triangle-exclamation text-red-600 text-xl"></i>
                                    </div>
                                    <div class="sm:ml-4">
                                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Hapus Karya Saya
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-slate-500 font-medium leading-relaxed">
                                                Tindakan ini tidak bisa dibatalkan. Menghapus buku <strong
                                                    class="text-slate-800" x-text="selectedBook?.title"></strong> juga
                                                akan menghapus seluruh bab dan statistik yang telah diraih.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-slate-50/50 px-6 py-4 flex flex-col sm:flex-row-reverse sm:px-8 border-t border-slate-100 gap-3 sm:gap-2">
                                <button type="submit"
                                    class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-red-600 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-700 transition-all">
                                    Ya, Hapus Karya
                                </button>
                                <button type="button" @click="deleteModalOpen = false"
                                    class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white px-6 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-all">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>