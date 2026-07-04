<x-layouts.main>
    <div class="min-h-screen bg-[#fffdf8] pb-24 font-sans antialiased text-slate-800" x-data="{
             searchQuery: '',

             // 1. GRADIENT WARNA UNTUK KATEGORI
             gradients: ['from-rose-400 to-rose-600', 'from-purple-500 to-indigo-600', 'from-emerald-400 to-emerald-600'],

             // 2. MENGAMBIL DATA KATEGORI KE ALPINE
             categories: @js($topCategories->map(function($c) {
                 return [
                     'name' => $c->name,
                     'slug' => Str::slug($c->name),
                     'count' => $c->books_count > 999 ? round($c->books_count/1000, 1) . 'K' : $c->books_count,
                 ];
             })->values()),

             // 3. MENGAMBIL DATA GENRE KE ALPINE
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

             // FILTER LIVE KATEGORI
             get filteredCategories() {
                 if (this.searchQuery === '') return this.categories;
                 return this.categories.filter(c => c.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
             },

             // FILTER LIVE GENRE (Bisa mencari berdasarkan Nama ATAU Deskripsi)
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
                    <div
                        class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" x-model="searchQuery"
                        placeholder="Cari genre, kategori, atau deskripsi cerita..."
                        class="w-full pl-12 pr-4 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm">
                </div>
            </div>
        </header>

        <section class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-12" x-show="filteredCategories.length > 0"
            x-transition>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-black text-slate-900 tracking-tight">
                    <span x-show="searchQuery === ''">Kategori Terpopuler</span>
                    <span x-show="searchQuery !== ''">Kategori yang Cocok</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <template x-for="(cat, index) in filteredCategories" :key="cat.name">
                    <a :href="'/category/' + cat.slug"
                        class="relative overflow-hidden rounded-2xl p-6 h-40 flex flex-col justify-end group shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-200"
                        :class="index == 2 ? 'md:hidden lg:flex' : ''">

                        <div class="absolute inset-0 bg-gradient-to-br opacity-90 group-hover:opacity-100 transition-opacity"
                            :class="gradients[index % 3]">
                        </div>

                        <div
                            class="absolute -right-6 -top-6 text-white/20 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>

                        <div class="relative z-10 text-white">
                            <h3 class="text-2xl font-black mb-1" x-text="cat.name"></h3>
                            <p class="text-sm font-medium text-white/80"><span x-text="cat.count"></span> Cerita</p>
                        </div>
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
