<x-layouts.main>
    <div x-data="{
            currentPage: 0,
            totalPages: {{ count($contentData ?? []) }}
         }"
        class="min-h-screen bg-[#FDFBF7] pb-24 font-serif antialiased text-slate-800 selection:bg-amber-200 selection:text-amber-900">

        <div
            class="sticky top-0 z-50 bg-[#FDFBF7]/80 backdrop-blur-xl border-b border-slate-200/50 shadow-sm py-4 transition-all">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 flex items-center justify-between">

                <a href="{{ route('books.story', $book->slug) }}"
                    class="flex items-center gap-2 text-slate-400 hover:text-amber-600 transition-colors font-sans text-sm font-semibold group">
                    <div
                        class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <span class="hidden sm:block">Detail</span>
                </a>

                <div class="text-center font-sans flex flex-col items-center">
                    <p
                        class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-0.5 truncate max-w-[150px] sm:max-w-xs">
                        {{ $book->title }}</p>
                    <div class="flex items-center gap-2">
                        <p class="text-xs font-bold text-slate-800">Bab {{ $chapter->chapter_number }}</p>
                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                        <p class="text-xs font-medium text-slate-500">
                            Hal <span x-text="currentPage + 1"></span> / <span x-text="totalPages"></span>
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button
                        class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition-colors"
                        title="Pengaturan Teks">
                        <i class="fa-solid fa-font"></i>
                    </button>
                    <button
                        class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-amber-600 hover:bg-amber-50 transition-colors"
                        title="Bookmark">
                        <i class="fa-regular fa-bookmark"></i>
                    </button>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 h-[2px] bg-amber-500 transition-all duration-300 ease-out"
                :style="'width: ' + ((currentPage + 1) / totalPages * 100) + '%'"></div>
        </div>

        <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 sm:mt-16">

            <header x-show="currentPage === 0" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="mb-14 text-center">
                <h2 class="text-amber-600 font-sans font-black text-xs uppercase tracking-widest mb-3">Bab {{
                    $chapter->chapter_number }}</h2>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 leading-[1.2] tracking-tight">
                    {{ $chapter->title }}
                </h1>
                <div class="flex items-center justify-center gap-3 mt-6 font-sans text-xs font-medium text-slate-500">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-pen-nib text-slate-300"></i> {{ $book->author->name ?? 'Anonim' }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                    <span>{{ $chapter->created_at->format('d M Y') }}</span>
                </div>
            </header>

            <div class="prose prose-slate prose-lg md:prose-xl mx-auto prose-p:leading-loose prose-p:text-slate-700">
                @if($contentData && is_array($contentData))
                @foreach($contentData as $index => $page)

                <div x-show="currentPage === {{ $index }}" @if($index> 0) style="display: none;" @endif
                    x-transition:enter="transition ease-out duration-500 delay-100"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="pb-8">

                    @if(!empty($page['image']))
                    <figure
                        class="mb-10 mt-4 relative group rounded-2xl overflow-hidden shadow-lg border border-slate-200/50">
                        <img src="{{ $page['image'] }}" alt="Ilustrasi Bab"
                            class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                    </figure>
                    @endif

                    @if(!empty($page['text']))
                    <div
                        class="text-[1.125rem] md:text-[1.25rem] leading-[2.2] font-medium text-slate-800 drop-cap-wrapper">
                        {!! nl2br(e($page['text'])) !!}
                    </div>
                    @endif

                </div>
                @endforeach
                @else
                <div class="text-center py-20">
                    <div
                        class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center text-slate-300 mb-4">
                        <i class="fa-regular fa-folder-open text-2xl"></i>
                    </div>
                    <p class="text-slate-500 font-sans">Konten bab tidak tersedia.</p>
                </div>
                @endif
            </div>

            <div x-show="currentPage === totalPages - 1" @if(count($contentData ?? [])> 1) style="display: none;" @endif
                x-transition:enter="transition ease-out duration-500"
                class="mt-16 pt-10 border-t border-slate-200/60 font-sans">
                <div
                    class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 justify-between border border-amber-100/60 shadow-sm">
                    <div class="text-center md:text-left flex-1">
                        <h4 class="font-black text-lg text-amber-950 mb-1">Menikmati ceritanya?</h4>
                        <p class="text-sm text-amber-800/80">Dukung <span class="font-bold">{{ $book->author->name ??
                                'Penulis' }}</span> agar cerita ini terus berlanjut.</p>
                    </div>
                    <button
                        class="bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold px-8 py-3 rounded-xl text-sm transition-all shadow-[0_4px_14px_0_rgba(245,158,11,0.39)] hover:shadow-[0_6px_20px_rgba(245,158,11,0.23)] hover:-translate-y-0.5 flex items-center justify-center gap-2 active:scale-95 shrink-0 w-full md:w-auto">
                        <i class="fa-solid fa-heart text-white"></i> Beri Dukungan
                    </button>
                </div>
            </div>

            <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-4 font-sans pb-12">

                <div class="w-full sm:w-1/2 flex justify-start">

                    <button @click="currentPage--; window.scrollTo({top: 0, behavior: 'smooth'})"
                        x-show="currentPage > 0"
                        class="w-full sm:w-auto px-6 py-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 flex items-center gap-4 group transition-all shadow-sm">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-slate-200 group-hover:text-slate-600 transition-colors">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="text-left hidden sm:block">
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Kembali ke
                            </p>
                            <p class="text-sm font-bold text-slate-700">Halaman Sebelumnya</p>
                        </div>
                        <span class="sm:hidden text-sm font-bold text-slate-700">Halaman Sebelumnya</span>
                    </button>

                    @if($prevChapter)
                    <a href="{{ route('books.read', ['book_slug' => $book->slug, 'chapter_number' => $prevChapter->chapter_number]) }}"
                        x-show="currentPage === 0"
                        class="w-full sm:w-auto px-6 py-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 flex items-center gap-4 group transition-all shadow-sm">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-slate-200 group-hover:text-slate-600 transition-colors">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="text-left hidden sm:block">
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Bab {{
                                $prevChapter->chapter_number }}</p>
                            <p class="text-sm font-bold text-slate-700 line-clamp-1 max-w-[150px]">{{
                                $prevChapter->title }}</p>
                        </div>
                        <span class="sm:hidden text-sm font-bold text-slate-700">Bab Sebelumnya</span>
                    </a>
                    @endif
                </div>

                <div class="w-full sm:w-1/2 flex justify-end">

                    <button @click="currentPage++; window.scrollTo({top: 0, behavior: 'smooth'})"
                        x-show="currentPage < totalPages - 1"
                        class="w-full sm:w-auto px-6 py-4 rounded-xl border border-amber-200 bg-amber-50 hover:bg-amber-100 flex items-center justify-end gap-4 group transition-all shadow-sm text-right">
                        <span class="sm:hidden text-sm font-bold text-amber-900">Halaman Selanjutnya</span>
                        <div class="text-right hidden sm:block">
                            <p class="text-[10px] font-black uppercase tracking-widest text-amber-600/70 mb-0.5">Lanjut
                                ke</p>
                            <p class="text-sm font-bold text-amber-900">Halaman <span x-text="currentPage + 2"></span>
                            </p>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-amber-200 flex items-center justify-center text-amber-700 group-hover:bg-amber-300 transition-colors">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </button>

                    <div x-show="currentPage === totalPages - 1" class="w-full sm:w-auto flex justify-end">
                        @if($nextChapter)
                        <a href="{{ route('books.read', ['book_slug' => $book->slug, 'chapter_number' => $nextChapter->chapter_number]) }}"
                            class="w-full sm:w-auto px-6 py-4 rounded-xl border border-amber-200 bg-amber-50 hover:bg-amber-100 flex items-center justify-end gap-4 group transition-all shadow-sm text-right">
                            <span class="sm:hidden text-sm font-bold text-amber-900">Bab Selanjutnya</span>
                            <div class="text-right hidden sm:block">
                                <p class="text-[10px] font-black uppercase tracking-widest text-amber-600/70 mb-0.5">Bab
                                    Selanjutnya</p>
                                <p class="text-sm font-bold text-amber-900 line-clamp-1 max-w-[150px]">{{
                                    $nextChapter->title }}</p>
                            </div>
                            <div
                                class="w-8 h-8 rounded-full bg-amber-500 flex items-center justify-center text-white group-hover:bg-amber-600 transition-colors shadow-md">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('books.story', $book->slug) }}"
                            class="w-full sm:w-auto px-8 py-4 rounded-xl border border-slate-800 bg-slate-900 hover:bg-slate-800 flex items-center justify-center gap-3 font-bold text-sm text-white transition-all shadow-md hover:-translate-y-0.5">
                            <i class="fa-solid fa-check-circle text-amber-400"></i> Selesai Membaca
                        </a>
                        @endif
                    </div>
                </div>

            </div>

        </article>
    </div>
</x-layouts.main>