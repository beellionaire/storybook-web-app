<x-layouts.main>
    <div class="min-h-screen bg-white pb-24 font-sans antialiased text-slate-800" x-data="{ activeTab: 'current' }">

        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 pt-12 md:pt-16">

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Pustaka</h1>
                <div class="text-sm text-slate-400 flex items-center gap-2">
                    <i class="fa-solid fa-lock text-xs"></i> Privat
                </div>
            </div>

            <div class="flex items-center gap-6 border-b border-slate-200 overflow-x-auto no-scrollbar mb-10">
                <button @click="activeTab = 'current'"
                    class="pb-4 text-base font-bold whitespace-nowrap border-b-2 transition-colors duration-300"
                    :class="activeTab === 'current' ? 'border-amber-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-800'">
                    Sedang Dibaca
                </button>
                <button @click="activeTab = 'watchlist'"
                    class="pb-4 text-base font-bold whitespace-nowrap border-b-2 transition-colors duration-300"
                    :class="activeTab === 'watchlist' ? 'border-amber-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-800'">
                    Daftar Simpanan
                </button>
                <button @click="activeTab = 'history'"
                    class="pb-4 text-base font-bold whitespace-nowrap border-b-2 transition-colors duration-300"
                    :class="activeTab === 'history' ? 'border-amber-500 text-slate-900' : 'border-transparent text-slate-500 hover:text-slate-800'">
                    Riwayat Baca
                </button>
            </div>

            <div x-show="activeTab === 'current'">
                @if(count($progresses) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($progresses as $progres)
                    @php
                    // Hitung persentase progres membaca
                    $totalChapters = $progres->book->chapters->count();
                    $percentage = $totalChapters > 0 ? round(($progres->chapter->chapter_number / $totalChapters) * 100)
                    : 0;
                    @endphp
                    <div
                        class="flex gap-4 p-4 border border-slate-200 rounded-2xl hover:bg-slate-50 transition-colors group">

                        <a href="{{ route('books.story', $progres->book->slug) }}"
                            class="w-24 aspect-[2/3] shrink-0 rounded-xl overflow-hidden bg-slate-100 shadow-sm relative">
                            @if($progres->book->cover_image)
                            <img src="{{ asset('storage/' . $progres->book->cover_image) }}" alt="Cover"
                                class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300"><i
                                    class="fa-solid fa-book-open"></i></div>
                            @endif
                        </a>

                        <div class="flex flex-col flex-1 py-1">
                            <a href="{{ route('books.story', $progres->book->slug) }}"
                                class="font-bold text-slate-900 text-lg line-clamp-1 group-hover:text-amber-600 transition-colors">
                                {{ $progres->book->title }}
                            </a>

                            <a href="{{ route('books.read', ['book_slug' => $progres->book->slug, 'chapter_number' => $progres->chapter->chapter_number]) }}"
                                class="text-xs font-medium text-amber-600 hover:text-amber-700 mt-1 inline-block">
                                Lanjut Baca Bab {{ $progres->chapter->chapter_number }} <i
                                    class="fa-solid fa-arrow-right text-[10px] ml-1"></i>
                            </a>

                            <div class="mt-auto pt-4">
                                <div
                                    class="flex items-center justify-between text-[10px] font-bold text-slate-400 mb-1.5 uppercase tracking-widest">
                                    <span>Progres</span>
                                    <span>{{ $percentage }}%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-amber-500 h-1.5 rounded-full" style="width: {{ $percentage }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div
                    class="py-12 text-center text-slate-500 text-sm border-2 border-dashed border-slate-100 rounded-2xl">
                    Tidak ada cerita yang sedang dibaca.
                </div>
                @endif
            </div>

            <div x-show="activeTab === 'watchlist'" style="display: none;">
                @if(count($watchlists) > 0)
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 sm:gap-6">
                    @foreach($watchlists as $item)
                    <div class="group relative flex flex-col">
                        <a href="{{ route('books.story', $item->book->slug) }}"
                            class="block aspect-[2/3] rounded-xl overflow-hidden bg-slate-100 shadow-sm border border-slate-200/60 mb-2">
                            @if($item->book->cover_image)
                            <img src="{{ asset('storage/' . $item->book->cover_image) }}" alt="Cover"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300"><i
                                    class="fa-solid fa-book-open"></i></div>
                            @endif
                        </a>
                        <a href="{{ route('books.story', $item->book->slug) }}"
                            class="font-bold text-slate-800 text-sm line-clamp-1 group-hover:text-amber-600">
                            {{ $item->book->title }}
                        </a>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">Disimpan {{
                            $item->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <div
                    class="py-12 text-center text-slate-500 text-sm border-2 border-dashed border-slate-100 rounded-2xl">
                    Daftar simpanan Anda masih kosong. Cari cerita menarik dan tambahkan ke pustaka.
                </div>
                @endif
            </div>

            <div x-show="activeTab === 'history'" style="display: none;">
                @if(count($progresses) > 0)
                <div class="space-y-4">
                    @foreach($progresses as $progres)
                    <a href="{{ route('books.read', ['book_slug' => $progres->book->slug, 'chapter_number' => $progres->chapter->chapter_number]) }}"
                        class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">

                        <div class="w-12 aspect-[2/3] shrink-0 rounded-md overflow-hidden bg-slate-100">
                            @if($progres->book->cover_image)
                            <img src="{{ asset('storage/' . $progres->book->cover_image) }}" alt="Cover"
                                class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300 text-xs"><i
                                    class="fa-solid fa-book-open"></i></div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <h3 class="font-bold text-slate-900 text-base line-clamp-1">{{ $progres->book->title }}</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Oleh {{ $progres->book->author->name ?? 'Anonim' }}
                                • <span class="text-amber-600 font-medium">Terakhir di Bab {{
                                    $progres->chapter->chapter_number }}</span></p>
                        </div>

                        <div class="text-right shrink-0">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Terakhir Dibaca
                            </p>
                            <p class="text-xs text-slate-600 font-medium">{{ $progres->updated_at->format('d M Y') }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div
                    class="py-12 text-center text-slate-500 text-sm border-2 border-dashed border-slate-100 rounded-2xl">
                    Belum ada riwayat bacaan.
                </div>
                @endif
            </div>

        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-layouts.main>