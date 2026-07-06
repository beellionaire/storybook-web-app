<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<section class="py-20 lg:py-28 bg-[#fff] relative font-sans overflow-hidden isolate">

    <img src="{{ asset('images/left-genre-deco.webp') }}" alt="Dekorasi Kiri" loading="lazy"
        class="hidden md:block absolute -left-[370px] top-[410px] w-[500px] sm:w-48 lg:w-[800px] -translate-x-1/4 -z-10 pointer-events-none opacity-70 lg:opacity-100 animate-[float_6s_ease-in-out_infinite]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="font-balsamiq text-4xl md:text-5xl font-bold text-slate-800 tracking-tight mb-4 drop-shadow-sm">
                Jelajahi <span class="text-amber-500">Ribuan Dunia</span>
            </h2>
            <p class="text-slate-500 text-lg font-medium leading-relaxed">
                Dari petualangan di luar angkasa hingga misteri di sekolah sihir, temukan cerita favoritmu hari ini!
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">

            @php
            // Mapping Warna persis seperti desain asli (tanpa ikon karena ikon dari DB)
            $themes = [
            [
            'wrapper' => 'bg-blue-100 border-blue-200 hover:bg-blue-200 hover:border-blue-400
            hover:shadow-[0_10px_30px_rgba(59,130,246,0.3)]',
            'icon_box' => 'border-blue-100 group-hover:-rotate-6',
            'title' => 'group-hover:text-blue-700',
            'count' => 'text-blue-600',
            ],
            [
            'wrapper' => 'bg-purple-100 border-purple-200 hover:bg-purple-200 hover:border-purple-400
            hover:shadow-[0_10px_30px_rgba(168,85,247,0.3)]',
            'icon_box' => 'border-purple-100 group-hover:rotate-6',
            'title' => 'group-hover:text-purple-700',
            'count' => 'text-purple-600',
            ],
            [
            'wrapper' => 'bg-yellow-100 border-yellow-200 hover:bg-yellow-200 hover:border-yellow-400
            hover:shadow-[0_10px_30px_rgba(234,179,8,0.3)]',
            'icon_box' => 'border-yellow-100 group-hover:-rotate-6',
            'title' => 'group-hover:text-yellow-700',
            'count' => 'text-yellow-600',
            ],
            [
            'wrapper' => 'bg-pink-100 border-pink-200 hover:bg-pink-200 hover:border-pink-400
            hover:shadow-[0_10px_30px_rgba(236,72,153,0.3)]',
            'icon_box' => 'border-pink-100 group-hover:rotate-6',
            'title' => 'group-hover:text-pink-700',
            'count' => 'text-pink-600',
            ],
            [
            'wrapper' => 'bg-emerald-100 border-emerald-200 hover:bg-emerald-200 hover:border-emerald-400
            hover:shadow-[0_10px_30px_rgba(16,185,129,0.3)]',
            'icon_box' => 'border-emerald-100 group-hover:-rotate-6',
            'title' => 'group-hover:text-emerald-700',
            'count' => 'text-emerald-600',
            ],
            [
            'wrapper' => 'bg-orange-100 border-orange-200 hover:bg-orange-200 hover:border-orange-400
            hover:shadow-[0_10px_30px_rgba(249,115,22,0.3)]',
            'icon_box' => 'border-orange-100 group-hover:rotate-6',
            'title' => 'group-hover:text-orange-700',
            'count' => 'text-orange-600',
            ],
            [
            'wrapper' => 'bg-rose-100 border-rose-200 hover:bg-rose-200 hover:border-rose-400
            hover:shadow-[0_10px_30px_rgba(244,63,94,0.3)]',
            'icon_box' => 'border-rose-100 group-hover:-rotate-6',
            'title' => 'group-hover:text-rose-700',
            'count' => 'text-rose-600',
            ]
            ];
            @endphp

            @foreach($categories->take(7) as $index => $category)
            @php
            // Terapkan tema warna bergiliran sesuai urutan index
            $theme = $themes[$index % count($themes)];
            @endphp

            <a href="{{ url('/category/' . Str::slug($category->name)) }}"
                class="group p-6 sm:p-8 rounded-3xl border-2 hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center {{ $theme['wrapper'] }}">

                <div
                    class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition-transform duration-300 border p-3.5 sm:p-4 {{ $theme['icon_box'] }}">

                    @php
                    // Memastikan tidak ada spasi kosong, jika ya gunakan ikon buku default
                    $iconClass = !empty(trim($category->icon)) ? trim($category->icon) : 'fa-solid fa-book';
                    @endphp

                    <i
                        class="{{ $iconClass }} text-3xl sm:text-4xl {{ $theme['count'] }} group-hover:scale-110 transition-transform"></i>

                </div>

                <h3
                    class="font-balsamiq text-lg sm:text-xl font-bold text-slate-800 mb-1 transition-colors {{ $theme['title'] }}">
                    {{ $category->name }}
                </h3>

                <p class="text-xs font-bold uppercase tracking-widest {{ $theme['count'] }}">
                    {{ $category->books_count > 999 ? round($category->books_count/1000, 1) . 'K' :
                    ($category->books_count ?? 0) }} Cerita
                </p>
            </a>
            @endforeach

            <a href="{{ route('explore.index') }}"
                class="group p-6 sm:p-8 bg-slate-800 rounded-3xl border-2 border-slate-800 hover:bg-slate-900 hover:shadow-[0_10px_30px_rgba(15,23,42,0.3)] hover:-translate-y-2 transition-all duration-300 flex flex-col items-center justify-center text-center">
                <div
                    class="w-16 h-16 sm:w-20 sm:h-20 bg-white/10 rounded-full flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform duration-300 border border-white/20 p-3.5 sm:p-4">
                    <svg class="w-full h-full p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </div>
                <h3 class="font-balsamiq text-lg sm:text-xl font-bold text-white mb-1">
                    Lihat Semua
                </h3>
                <p class="text-xs font-bold text-slate-300 uppercase tracking-widest">{{ count($categories) }}+ Kategori
                </p>
            </a>

        </div>
    </div>
</section>