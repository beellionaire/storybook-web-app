<x-layouts.main>
    <div class="min-h-screen bg-[#F8FAFC] pb-24 font-sans antialiased text-slate-800 selection:bg-amber-200 selection:text-amber-900"
        x-data="{ activeTab: 'summary' }">

        <div class="bg-white border-b border-slate-200/80 pt-8 sm:pt-12 pb-12 sm:pb-16">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">

                <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-8 sm:mb-12">
                    <a href="{{ route('explore.index') }}" class="hover:text-slate-900 transition-colors">Beranda</a>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="{{ url('/category/' . Str::slug($book->category->name ?? '')) }}"
                        class="hover:text-slate-900 transition-colors">{{ $book->category->name ?? 'Kategori' }}</a>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-slate-900 truncate max-w-[150px] sm:max-w-none">{{ $book->title }}</span>
                </nav>

                <div class="flex flex-col md:flex-row gap-8 lg:gap-14 items-center md:items-start">

                    <div class="shrink-0 group">
                        <div
                            class="w-[200px] sm:w-[240px] aspect-[2/3] rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(15,23,42,0.1)] ring-1 ring-slate-900/5 relative bg-slate-100">
                            @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Kover Cerita"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                <i class="fa-solid fa-book-open text-4xl"></i>
                            </div>
                            @endif

                            @if($book->is_mature)
                            <div
                                class="absolute top-3 right-3 bg-rose-500/90 backdrop-blur-sm px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-widest text-white shadow-sm">
                                18+ Dewasa
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left w-full">
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-[1.15] mb-5">
                            {{ $book->title }}
                        </h1>

                        <div
                            class="flex items-center gap-3 mb-8 bg-slate-50 px-4 py-2 rounded-full border border-slate-100">
                            <div
                                class="w-8 h-8 rounded-full shadow-sm bg-slate-900 text-white flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr($book->author->name ?? 'A', 0, 1) }}
                            </div>
                            <div class="text-left flex items-center gap-2">
                                <span class="text-sm font-bold text-slate-900">{{ $book->author->name ?? 'Anonim'
                                    }}</span>
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-slate-300 mx-1">•</span>
                                <span class="text-xs font-medium text-slate-500">{{ $book->created_at->format('d M Y')
                                    }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 sm:gap-10 mb-8">
                            <div class="text-center md:text-left">
                                <div class="text-xl sm:text-2xl font-black text-slate-900 flex items-baseline">
                                    {{ $book->views_count > 999 ? round($book->views_count/1000, 1) : $book->views_count
                                    }}
                                    @if($book->views_count > 999) <span class="text-sm text-slate-400 ml-0.5">K</span>
                                    @endif
                                </div>
                                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mt-1">Pembaca
                                </div>
                            </div>
                            <div class="w-px h-8 bg-slate-200"></div>
                            <div class="text-center md:text-left">
                                <div class="text-xl sm:text-2xl font-black text-slate-900">{{ $book->chapters->count()
                                    }}</div>
                                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mt-1">Bab
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto mt-auto">
                            @php $firstChapter = $book->chapters->first(); @endphp

                            @auth
                            @if($firstChapter)
                            <a href="{{ route('books.read', ['book_slug' => $book->slug, 'chapter_number' => $firstChapter->chapter_number]) }}"
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-8 py-3.5 rounded-xl font-bold text-sm transition-all shadow-md active:scale-95">
                                Mulai Membaca
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            @else
                            <button disabled
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-slate-200 text-slate-500 px-8 py-3.5 rounded-xl font-bold text-sm cursor-not-allowed">
                                Belum Ada Bab
                            </button>
                            @endif

                            <button
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 px-8 py-3.5 rounded-xl font-bold text-sm transition-all active:scale-95 shadow-sm">
                                <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Pustaka
                            </button>
                            @else
                            <a href="{{ route('login') }}"
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-8 py-3.5 rounded-xl font-bold text-sm transition-all shadow-md active:scale-95">
                                <i class="fa-solid fa-lock text-slate-400"></i> Login untuk Membaca
                            </a>

                            <a href="{{ route('login') }}"
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 px-8 py-3.5 rounded-xl font-bold text-sm transition-all shadow-sm">
                                <i class="fa-solid fa-bookmark text-slate-400"></i> Simpan Cerita
                            </a>
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">

                <div class="lg:col-span-8">
                    <div class="flex items-center gap-8 border-b border-slate-200 mb-8 overflow-x-auto no-scrollbar">
                        <button @click="activeTab = 'summary'"
                            class="pb-4 text-sm font-bold uppercase tracking-wider relative transition-colors whitespace-nowrap"
                            :class="activeTab === 'summary' ? 'text-slate-900' : 'text-slate-400 hover:text-slate-600'">
                            Sinopsis
                            <div x-show="activeTab === 'summary'" x-transition
                                class="absolute bottom-[-1px] left-0 w-full h-[2px] bg-slate-900 rounded-t-full"></div>
                        </button>
                        <button @click="activeTab = 'chapters'"
                            class="pb-4 text-sm font-bold uppercase tracking-wider relative transition-colors whitespace-nowrap flex items-center gap-2"
                            :class="activeTab === 'chapters' ? 'text-slate-900' : 'text-slate-400 hover:text-slate-600'">
                            Daftar Bab
                            <span class="bg-slate-200/70 text-slate-700 px-2 py-0.5 rounded text-[10px] leading-none">{{
                                $book->chapters->count() }}</span>
                            <div x-show="activeTab === 'chapters'" x-transition
                                class="absolute bottom-[-1px] left-0 w-full h-[2px] bg-slate-900 rounded-t-full"></div>
                        </button>
                    </div>

                    <div x-show="activeTab === 'summary'" x-transition.opacity.duration.300ms>
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($book->genres as $genre)
                            <a href="{{ url('/genre/' . $genre->slug) }}"
                                class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-600 hover:border-slate-300 transition-colors">
                                {{ $genre->name }}
                            </a>
                            @endforeach
                        </div>

                        <article
                            class="prose prose-slate prose-p:text-slate-600 prose-p:leading-[1.8] max-w-none mb-12 whitespace-pre-line">
                            {!! nl2br(e($book->description)) !!}
                        </article>

                        {{-- <div
                            class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div class="text-center sm:text-left flex-1">
                                <h4 class="text-lg font-black text-slate-900 mb-1">Dukung Karya {{ explode(' ',
                                    trim($book->author->name))[0] }}</h4>
                                <p class="text-sm text-slate-600 leading-relaxed">Berikan tip untuk mengapresiasi karya
                                    ini dan memotivasi penulis agar lebih cepat memperbarui bab selanjutnya.</p>
                            </div>
                            <button
                                class="shrink-0 w-full sm:w-auto bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold px-8 py-3.5 rounded-xl text-sm transition-all shadow-sm flex items-center justify-center gap-2 active:scale-95">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                                Beri Hadiah
                            </button>
                        </div> --}}
                    </div>

                    <div x-show="activeTab === 'chapters'" style="display: none;" x-transition.opacity.duration.300ms>
                        <div class="flex flex-col gap-3">
                            @forelse($book->chapters as $chapter)
                            @auth
                            <a href="{{ route('books.read', ['book_slug' => $book->slug, 'chapter_number' => $chapter->chapter_number]) }}"
                                class="group flex items-center justify-between p-4 sm:p-5 bg-white border border-slate-200 rounded-2xl hover:border-amber-400 hover:shadow-md hover:shadow-amber-500/5 transition-all">
                                <div class="flex items-center gap-4 sm:gap-6">
                                    <div
                                        class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-slate-50 flex items-center justify-center font-black text-slate-300 group-hover:bg-amber-100 group-hover:text-amber-600 transition-colors">
                                        {{ $chapter->chapter_number }}
                                    </div>
                                    <div>
                                        <h4
                                            class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">
                                            {{ $chapter->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-1">
                                            <span>{{ $chapter->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-300 group-hover:text-amber-500 group-hover:bg-amber-50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                            @else
                            <a href="{{ route('login') }}" title="Login untuk membaca bab ini"
                                class="group flex items-center justify-between p-4 sm:p-5 bg-slate-50 border border-slate-200/60 rounded-2xl hover:border-slate-300 transition-all cursor-pointer">
                                <div class="flex items-center gap-4 sm:gap-6 opacity-70">
                                    <div
                                        class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-white border border-slate-200 flex items-center justify-center font-black text-slate-400">
                                        {{ $chapter->chapter_number }}
                                    </div>
                                    <div>
                                        <h4 class="text-base sm:text-lg font-bold text-slate-600">
                                            {{ $chapter->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-400 mt-1">
                                            <span>{{ $chapter->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-400 bg-white border border-slate-200 group-hover:text-rose-500 group-hover:border-rose-200 transition-colors">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </div>
                            </a>
                            @endauth
                            @empty
                            <div
                                class="text-center py-10 text-slate-500 font-medium bg-white rounded-2xl border border-dashed border-slate-200">
                                Penulis belum mempublikasikan bab apapun.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-3 text-slate-900">
                            <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <h3 class="text-sm font-black">Hak Cipta Dilindungi</h3>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Karya ini dilindungi oleh undang-undang. Dilarang keras menyalin, mendistribusikan, atau
                            mempublikasikan ulang materi ini tanpa izin tertulis dari {{ $book->author->name ??
                            'penulis' }}.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-5">Cerita Serupa</h3>
                        <div class="space-y-4">
                            @forelse($similarBooks as $sim)
                            <a href="{{ route('books.story', $sim->slug) }}" class="flex gap-4 group">
                                <div class="w-14 aspect-[2/3] rounded-md overflow-hidden bg-slate-100 shrink-0">
                                    @if($sim->cover_image)
                                    <img src="{{ asset('storage/' . $sim->cover_image) }}" alt="Cover"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                    @else
                                    <div class="w-full h-full bg-slate-200"></div>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-slate-900 group-hover:text-amber-600 line-clamp-2">
                                        {{ $sim->title }}
                                    </h4>
                                    <p class="text-xs text-slate-500 mt-1">Oleh {{ $sim->author->name ?? 'Anonim' }}</p>
                                </div>
                            </a>
                            @empty
                            <p class="text-xs text-slate-400">Tidak ada cerita serupa.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>