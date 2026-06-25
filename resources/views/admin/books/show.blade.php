<x-app-layout>
    <div x-data="{
            previewModalOpen: false,
            selectedChapter: null,
            openPreview(chapter) {
                this.selectedChapter = chapter;
                this.previewModalOpen = true;
            }
        }" class="w-full pb-10">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-400 mb-2">
                    <a href="{{ route('admin.books.index') }}" class="hover:text-orange-500 transition-colors">Kelola
                        Karya</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-slate-600">Review Karya</span>
                </div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">Review: {{
                    Str::limit($book->title, 40) }}</h1>
            </div>

            <div class="flex items-center gap-3">
                <form action="{{ route('admin.books.toggle', $book->id) }}" method="POST">
                    @csrf @method('PATCH')
                    @if($book->status === 'published')
                    <button type="submit"
                        class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-5 py-2.5 rounded-xl font-bold transition-all shadow-sm flex items-center gap-2">
                        <i class="fa-solid fa-box-archive"></i> Tarik ke Draft
                    </button>
                    @else
                    <button type="submit"
                        class="bg-gradient-to-tr from-emerald-500 to-green-500 text-white hover:shadow-lg hover:shadow-emerald-500/30 px-6 py-2.5 rounded-xl font-bold transition-all flex items-center gap-2 transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-rocket"></i> Setujui & Terbitkan
                    </button>
                    @endif
                </form>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">

            <div class="w-full lg:w-1/3 xl:w-1/4 space-y-6">
                <div
                    class="bg-white rounded-[2rem] p-4 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] relative overflow-hidden group">
                    <div class="aspect-[2/3] rounded-2xl bg-slate-100 overflow-hidden relative shadow-inner">
                        @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-300 gap-3">
                            <i class="fa-solid fa-image text-4xl"></i>
                            <span class="text-xs font-bold uppercase tracking-widest">No Cover</span>
                        </div>
                        @endif

                        <div class="absolute top-4 right-4">
                            @if($book->status === 'published')
                            <span
                                class="bg-emerald-500 text-white px-3 py-1.5 rounded-xl text-xs font-black shadow-lg backdrop-blur-md bg-opacity-90"><i
                                    class="fa-solid fa-check-circle mr-1"></i> Published</span>
                            @else
                            <span
                                class="bg-slate-800 text-white px-3 py-1.5 rounded-xl text-xs font-black shadow-lg backdrop-blur-md bg-opacity-90"><i
                                    class="fa-solid fa-pen-ruler mr-1"></i> Draft</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                    <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Informasi Buku</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-slate-500 font-medium"><i
                                    class="fa-solid fa-layer-group w-5 text-center mr-1 text-slate-400"></i>
                                Kategori</span>
                            <span class="font-bold text-slate-800">{{ $book->category->name ?? '-' }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-slate-500 font-medium"><i
                                    class="fa-solid fa-globe w-5 text-center mr-1 text-slate-400"></i> Bahasa</span>
                            <span class="font-bold text-slate-800">{{ ucfirst($book->language ?? 'Indonesia') }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-slate-50 pb-3">
                            <span class="text-slate-500 font-medium"><i
                                    class="fa-solid fa-users w-5 text-center mr-1 text-slate-400"></i> Audiens</span>
                            <span class="font-bold text-slate-800">{{ ucfirst($book->target_audience ?? 'Semua Umur')
                                }}</span>
                        </li>
                        <li class="flex justify-between items-center pb-1">
                            <span class="text-slate-500 font-medium"><i
                                    class="fa-solid fa-triangle-exclamation w-5 text-center mr-1 text-slate-400"></i>
                                Konten Dewasa</span>
                            @if($book->is_mature)
                            <span
                                class="bg-rose-100 text-rose-600 px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider">Ya
                                (18+)</span>
                            @else
                            <span
                                class="bg-slate-100 text-slate-500 px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider">Tidak</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full lg:w-2/3 xl:w-3/4 space-y-6">

                <div
                    class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($book->author->name) }}&background=f97316&color=fff"
                            class="w-12 h-12 rounded-full shadow-sm ring-4 ring-slate-50">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-0.5">Penulis Cerita
                            </p>
                            <p class="font-black text-lg text-slate-800">{{ $book->author->name }}</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-black text-slate-900 mb-3">Sinopsis</h3>
                    <div class="prose prose-slate prose-sm max-w-none text-slate-600 leading-relaxed">
                        {!! nl2br(e($book->description)) !!}
                    </div>

                    @if($book->genres && $book->genres->count() > 0)
                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Genre Terkait</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($book->genres as $genre)
                            <span
                                class="bg-orange-50 text-orange-600 border border-orange-100/50 px-3 py-1.5 rounded-xl text-xs font-bold">
                                {{ $genre->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div
                    class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
                    <div class="px-6 lg:px-8 py-6 border-b border-slate-100 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-black text-slate-900">Daftar Bab (Chapters)</h3>
                            <p class="text-sm text-slate-500 font-medium mt-1">Review isi tulisan per bab sebelum
                                disetujui.</p>
                        </div>
                        <div class="bg-slate-100 text-slate-600 font-black text-sm px-4 py-2 rounded-xl">
                            {{ $book->chapters->count() }} Bab
                        </div>
                    </div>

                    <div class="divide-y divide-slate-50">
                        @forelse($book->chapters()->orderBy('chapter_number', 'asc')->get() as $chapter)
                        <div
                            class="p-6 lg:px-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center font-black">
                                    {{ $chapter->chapter_number }}
                                </div>
                                <div>
                                    <p
                                        class="font-bold text-slate-800 text-base group-hover:text-orange-600 transition-colors">
                                        {{ $chapter->title }}</p>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5"><i
                                            class="fa-regular fa-calendar-days mr-1"></i> Ditambahkan: {{
                                        $chapter->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                            <button
                                @click="openPreview({ title: '{{ addslashes($chapter->title) }}', number: {{ $chapter->chapter_number }}, content: `{{ str_replace('`', '\`', nl2br(e($chapter->content))) }}` })"
                                class="w-full sm:w-auto bg-white border border-slate-200 text-blue-600 hover:bg-blue-50 hover:border-blue-200 px-4 py-2 rounded-xl text-sm font-bold transition-all shadow-sm flex items-center justify-center gap-2">
                                <i class="fa-solid fa-eye"></i> Baca Preview
                            </button>
                        </div>
                        @empty
                        <div class="p-8 text-center text-slate-500 font-medium">
                            Penulis belum menambahkan bab untuk cerita ini.
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

        <div x-show="previewModalOpen" style="display: none;" class="relative z-50">
            <div x-show="previewModalOpen" x-transition.opacity class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm">
            </div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4">
                    <div x-show="previewModalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-8 scale-95" @click.away="previewModalOpen = false"
                        class="relative w-full max-w-4xl bg-white rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

                        <div
                            class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-white/90 backdrop-blur-md sticky top-0 z-20">
                            <div>
                                <p class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-1"
                                    x-text="'Bab ' + selectedChapter?.number"></p>
                                <h3 class="text-xl font-black text-slate-900" x-text="selectedChapter?.title"></h3>
                            </div>
                            <button @click="previewModalOpen = false"
                                class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-800 flex items-center justify-center transition-colors">
                                <i class="fa-solid fa-xmark text-lg"></i>
                            </button>
                        </div>

                        <div class="p-6 md:p-10 overflow-y-auto flex-1 bg-[#fdfbf7]">
                            <div class="max-w-2xl mx-auto prose prose-slate prose-lg text-slate-700 font-serif leading-loose"
                                x-html="selectedChapter?.content">
                            </div>
                        </div>

                        <div class="px-6 py-4 border-t border-slate-100 bg-white flex justify-end">
                            <button @click="previewModalOpen = false"
                                class="bg-slate-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-800 transition-colors">
                                Tutup Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>