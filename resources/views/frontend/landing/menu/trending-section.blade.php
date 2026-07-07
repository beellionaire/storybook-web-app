<section class="py-20 lg:py-28 bg-[#fffdf8] relative overflow-hidden font-sans">

    <div
        class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-amber-400/10 blur-[80px] pointer-events-none">
    </div>
    <div
        class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-blue-400/10 blur-[80px] pointer-events-none">
    </div>

    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
            <div class="text-left max-w-2xl">
                <h2 class="font-balsamiq text-4xl md:text-5xl font-bold text-slate-800 drop-shadow-sm mb-3">
                    Cerita Populer <span class="text-amber-500">Minggu Ini</span>
                </h2>
                <p class="text-slate-500 text-lg font-medium leading-relaxed">
                    Dari petualangan di luar angkasa hingga misteri di sekolah sihir, temukan cerita favoritmu hari ini!
                </p>
            </div>

            <a href="/trending"
                class="inline-flex shrink-0 items-center gap-2 px-6 py-3 bg-white border-2 border-slate-200 rounded-full text-sm font-bold text-slate-700 hover:border-amber-400 hover:text-amber-600 transition-colors shadow-sm group">
                Lihat Semua
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6 mt-8">
            @forelse($popularBooks as $index => $book)
            <div
                class="group cursor-pointer relative bg-white rounded-3xl p-3.5 shadow-sm border-2 border-slate-100 hover:border-amber-400 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="absolute -top-4 -left-4 bg-yellow-400 text-yellow-900 border-4 border-white font-balsamiq text-xl w-14 h-14 flex items-center justify-center rounded-full shadow-md z-20">
                    {{ $index + 1 }}
                </div>

                <div class="relative aspect-[2/3] rounded-2xl overflow-hidden mb-4 bg-slate-100">
                    @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" width="160" height="40"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="Cover Buku">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-200"><i
                            class="fa-solid fa-image text-slate-400"></i></div>
                    @endif

                    <div
                        class="absolute inset-0 bg-amber-500/20 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ route('books.story', $book->slug) }}"
                            class="font-balsamiq bg-white text-amber-600 text-sm font-bold px-6 py-2.5 rounded-full shadow-lg scale-90 group-hover:scale-100 transition-transform">
                            Baca Cerita
                        </a>
                    </div>
                </div>

                <div class="px-2 pb-2 text-center">
                    <h3 class="font-balsamiq text-lg font-bold text-slate-800 mb-1 truncate group-hover:text-amber-500 transition-colors"
                        title="{{ $book->title }}">
                        {{ $book->title }}
                    </h3>
                    <p class="text-xs font-medium text-slate-500 mb-3">Oleh <span class="font-bold text-slate-700">{{
                            $book->author->name ?? 'Anonim' }}</span></p>

                    <div class="flex items-center justify-center gap-4 pt-3 border-t border-slate-100">
                        <div class="flex items-center gap-1 text-slate-600 font-bold text-xs">
                            <span class="text-amber-400 text-sm">★</span> {{ $book->rating ?? '4.9' }}
                        </div>
                        <div class="w-1 h-1 bg-slate-300 rounded-full"></div>
                        <div class="flex items-center gap-1 text-slate-500 font-bold text-xs">
                            👁️ {{ $book->views_count > 999 ? round($book->views_count/1000, 1) . 'K' :
                            $book->views_count }}
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-full py-12 text-center text-slate-500 font-bold">
                Belum ada cerita populer minggu ini.
            </div>
            @endforelse
        </div>

    </div>
</section>