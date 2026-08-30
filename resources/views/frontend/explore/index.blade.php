<x-layouts.main>
    <div class="min-h-screen bg-[#fffdf8] pb-24 font-sans antialiased text-slate-800" x-data="{
             searchQuery: '',

             // MENGAMBIL TEMA WARNA SEPERTI DI LANDING PAGE
             themes: [
                 {
                     wrapper: 'bg-blue-100 border-blue-200 hover:bg-blue-200 hover:border-blue-400 hover:shadow-[0_10px_30px_rgba(59,130,246,0.3)]',
                     icon_box: 'border-blue-100 group-hover:-rotate-6',
                     title: 'group-hover:text-blue-700',
                     count: 'text-blue-600',
                 },
                 {
                     wrapper: 'bg-purple-100 border-purple-200 hover:bg-purple-200 hover:border-purple-400 hover:shadow-[0_10px_30px_rgba(168,85,247,0.3)]',
                     icon_box: 'border-purple-100 group-hover:rotate-6',
                     title: 'group-hover:text-purple-700',
                     count: 'text-purple-600',
                 },
                 {
                     wrapper: 'bg-yellow-100 border-yellow-200 hover:bg-yellow-200 hover:border-yellow-400 hover:shadow-[0_10px_30px_rgba(234,179,8,0.3)]',
                     icon_box: 'border-yellow-100 group-hover:-rotate-6',
                     title: 'group-hover:text-yellow-700',
                     count: 'text-yellow-600',
                 },
                 {
                     wrapper: 'bg-pink-100 border-pink-200 hover:bg-pink-200 hover:border-pink-400 hover:shadow-[0_10px_30px_rgba(236,72,153,0.3)]',
                     icon_box: 'border-pink-100 group-hover:rotate-6',
                     title: 'group-hover:text-pink-700',
                     count: 'text-pink-600',
                 },
                 {
                     wrapper: 'bg-emerald-100 border-emerald-200 hover:bg-emerald-200 hover:border-emerald-400 hover:shadow-[0_10px_30px_rgba(16,185,129,0.3)]',
                     icon_box: 'border-emerald-100 group-hover:-rotate-6',
                     title: 'group-hover:text-emerald-700',
                     count: 'text-emerald-600',
                 },
                 {
                     wrapper: 'bg-orange-100 border-orange-200 hover:bg-orange-200 hover:border-orange-400 hover:shadow-[0_10px_30px_rgba(249,115,22,0.3)]',
                     icon_box: 'border-orange-100 group-hover:rotate-6',
                     title: 'group-hover:text-orange-700',
                     count: 'text-orange-600',
                 },
                 {
                     wrapper: 'bg-rose-100 border-rose-200 hover:bg-rose-200 hover:border-rose-400 hover:shadow-[0_10px_30px_rgba(244,63,94,0.3)]',
                     icon_box: 'border-rose-100 group-hover:-rotate-6',
                     title: 'group-hover:text-rose-700',
                     count: 'text-rose-600',
                 }
             ],

             categories: @js( ($categories ?? $topCategories)->map(function($c) {
                 return [
                     'name' => $c->name,
                     'slug' => Str::slug($c->name),
                     'count' => $c->books_count > 999 ? round($c->books_count/1000, 1) . 'K' : $c->books_count,
                     'icon' => $c->icon,
                 ];
             })->values()),

             genres: @js($genres->map(function($g) {
                 return [
                     'name' => $g->name,
                     'slug' => Str::slug($g->name),
                     'desc' => 'Jelajahi kisah menarik di genre ' . $g->name . '.',
                     'count' => $g->books_count > 999 ? round($g->books_count/1000, 1) . 'K' : $g->books_count,
                     'iconBg' => 'bg-amber-50 text-amber-600',
                     'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'
                 ];
             })->values()),

             get filteredCategories() {
                 if (this.searchQuery === '') return this.categories;
                 return this.categories.filter(c => c.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
             },

             get filteredGenres() {
                 if (this.searchQuery === '') return this.genres;
                 return this.genres.filter(g =>
                     g.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                     g.desc.toLowerCase().includes(this.searchQuery.toLowerCase())
                 );
             }
         }">

        <header class="bg-[#fffbf2] border-b border-slate-200/80 pt-12 sm:pt-16 pb-12">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-4">
                    Eksplorasi Dunia Baru
                </h1>
                <p class="text-base text-slate-500 max-w-2xl mx-auto mb-10">
                    Pilih genre favoritmu dan temukan jutaan cerita orisinal yang ditulis oleh komunitas kami.
                </p>

                <div class="max-w-lg mx-auto relative group">
                    <form action="{{ route('books.index') }}" method="GET" class="w-full">
                        <div
                            class="absolute inset-y-0 left-4 top-4 flex items-start pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="search" x-model="searchQuery"
                            placeholder="Cari genre, kategori, atau judul cerita..."
                            class="w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm">

                        <div
                            class="absolute -bottom-6 left-0 w-full text-left pl-3 text-[11px] font-medium text-slate-400">
                            <i class="fa-solid fa-turn-up fa-rotate-90 mr-1"></i> Tekan <strong>Enter</strong> untuk
                            mencari ke seluruh daftar buku.
                        </div>
                    </form>
                </div>
            </div>
        </header>

        <section class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-12" x-show="filteredCategories.length > 0"
            x-transition>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-black text-slate-900 tracking-tight">
                    <span x-show="searchQuery === ''">Semua Kategori</span>
                    <span x-show="searchQuery !== ''">Kategori yang Cocok</span>
                </h2>
            </div>

            <!-- DESAIN KOTAK SAMA PERSIS DENGAN LANDING PAGE -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">

                <template x-for="(cat, index) in filteredCategories" :key="cat.name">
                    <a :href="'/category/' + cat.slug"
                        class="group p-6 sm:p-8 rounded-3xl border-2 hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center"
                        :class="themes[index % themes.length].wrapper">

                        <!-- Lingkaran Putih Penampung Logo -->
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition-transform duration-300 border p-3.5 sm:p-4"
                            :class="themes[index % themes.length].icon_box">

                            <!-- Render Ikon FontAwesome (Jika Ada di Database) -->
                            <template x-if="cat.icon">
                                <i :class="cat.icon + ' ' + themes[index % themes.length].count"
                                    class="text-3xl sm:text-4xl group-hover:scale-110 transition-transform"></i>
                            </template>

                            <!-- Render Fallback Ikon (Jika Kosong di Database) -->
                            <template x-if="!cat.icon">
                                <i class="fa-solid fa-book text-3xl sm:text-4xl group-hover:scale-110 transition-transform"
                                    :class="themes[index % themes.length].count"></i>
                            </template>

                        </div>

                        <!-- Teks -->
                        <h3 class="font-balsamiq text-lg sm:text-xl font-bold text-slate-800 mb-1 transition-colors"
                            :class="themes[index % themes.length].title" x-text="cat.name"></h3>
                        <p class="text-xs font-bold uppercase tracking-widest"
                            :class="themes[index % themes.length].count">
                            <span x-text="cat.count"></span> Cerita
                        </p>
                    </a>
                </template>

            </div>
        </section>

        <section class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-16">
            <h2 class="text-lg font-black text-slate-900 tracking-tight mb-6">
                <span x-show="searchQuery === ''">Semua Genre</span>
                <span x-show="searchQuery !== ''" x-text="`Hasil Pencarian Genre untuk: '${searchQuery}'`"
                    style="display: none;"></span>
            </h2>

            <div x-show="filteredGenres.length === 0 && filteredCategories.length === 0" style="display: none;"
                class="py-12 text-center bg-white rounded-2xl border border-slate-200 border-dashed">
                <p class="text-slate-500 font-medium">Hmm, kami tidak menemukan genre atau kategori tersebut.</p>
                <button @click="searchQuery = ''"
                    class="mt-4 text-sm font-bold text-amber-600 hover:text-amber-700 underline underline-offset-4">
                    Tampilkan Semua Data
                </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6"
                x-show="filteredGenres.length > 0">
                <template x-for="genre in filteredGenres" :key="genre.name">
                    <a :href="'/genre/' + genre.slug"
                        class="group block p-5 bg-white rounded-2xl border border-slate-200/80 hover:border-slate-300 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">

                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110"
                                :class="genre.iconBg">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        :d="genre.icon" />
                                </svg>
                            </div>
                            <div
                                class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-900 text-lg mb-1 group-hover:text-amber-600 transition-colors"
                                x-text="genre.name"></h3>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4 hidden sm:block line-clamp-2"
                                x-text="genre.desc"></p>
                            <div
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-50 rounded-md text-[10px] font-bold text-slate-500 uppercase tracking-widest border border-slate-100 group-hover:bg-amber-50 group-hover:text-amber-600 group-hover:border-amber-100 transition-colors">
                                <span x-text="genre.count"></span> Cerita
                            </div>
                        </div>
                    </a>
                </template>
            </div>
        </section>

    </div>
</x-layouts.main>