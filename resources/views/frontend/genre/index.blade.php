<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-24 font-sans antialiased text-slate-800" x-data="{
             searchQuery: '',
             genres: [
                 { name: 'Fiksi Ilmiah', desc: 'Masa depan, teknologi, dan luar angkasa.', count: '12.4K', color: 'bg-blue-500', iconBg: 'bg-blue-50 text-blue-600', icon: 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z' },
                 { name: 'Fantasi', desc: 'Sihir, naga, dan dunia yang tak terbayangkan.', count: '28.1K', color: 'bg-purple-500', iconBg: 'bg-purple-50 text-purple-600', icon: 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z' },
                 { name: 'Romansa', desc: 'Kisah cinta yang menggetarkan hati.', count: '45.9K', color: 'bg-rose-500', iconBg: 'bg-rose-50 text-rose-600', icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z' },
                 { name: 'Misteri', desc: 'Teka-teki dan plot twist yang tak terduga.', count: '15.2K', color: 'bg-slate-800', iconBg: 'bg-slate-100 text-slate-800', icon: 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z' },
                 { name: 'Distopia', desc: 'Kehancuran dunia dan perlawanan terakhir.', count: '8.3K', color: 'bg-amber-600', iconBg: 'bg-amber-50 text-amber-600', icon: 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z' },
                 { name: 'Horor', desc: 'Kisah mencekam yang menghantui tidurmu.', count: '10.5K', color: 'bg-red-700', iconBg: 'bg-red-50 text-red-700', icon: 'M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z' },
                 { name: 'Komedi', desc: 'Humor segar penghilang penat harian.', count: '19.8K', color: 'bg-yellow-500', iconBg: 'bg-yellow-50 text-yellow-600', icon: 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' },
                 { name: 'Petualangan', desc: 'Perjalanan panjang menemukan jati diri.', count: '22.4K', color: 'bg-emerald-500', iconBg: 'bg-emerald-50 text-emerald-600', icon: 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }
             ],
             get filteredGenres() {
                 if (this.searchQuery === '') return this.genres;
                 return this.genres.filter(g => g.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
             }
         }">

        <header class="bg-white border-b border-slate-200/80 pt-12 sm:pt-16 pb-12">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 text-center">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-4">
                    Eksplorasi Dunia Baru
                </h1>
                <p class="text-base text-slate-500 max-w-2xl mx-auto mb-10">
                    Pilih genre favoritmu dan temukan jutaan cerita orisinal yang ditulis oleh komunitas kami. Mulai
                    dari petualangan sihir hingga romansa di kota metropolitan.
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
                        placeholder="Cari genre spesifik (contoh: Horor, Distopia)..."
                        class="w-full pl-12 pr-4 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm">
                </div>

            </div>
        </header>

        <section class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-12" x-show="searchQuery === ''" x-transition>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-black text-slate-900 tracking-tight">Kategori Terpopuler</h2>
                <a href="#"
                    class="text-sm font-bold text-amber-600 hover:text-amber-700 transition-colors flex items-center gap-1">
                    Lihat Peringkat <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <a href="/explore?genre=romansa"
                    class="relative overflow-hidden rounded-2xl p-6 h-40 flex flex-col justify-end group shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-rose-400 to-rose-600 opacity-90 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute -right-6 -top-6 text-white/20 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="relative z-10 text-white">
                        <h3 class="text-2xl font-black mb-1">Romansa</h3>
                        <p class="text-sm font-medium text-rose-100">45.9K Cerita Menanti</p>
                    </div>
                </a>

                <a href="/explore?genre=fantasi"
                    class="relative overflow-hidden rounded-2xl p-6 h-40 flex flex-col justify-end group shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-200">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500 to-indigo-600 opacity-90 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute -right-6 -top-6 text-white/20 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-32 h-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div class="relative z-10 text-white">
                        <h3 class="text-2xl font-black mb-1">Fantasi</h3>
                        <p class="text-sm font-medium text-purple-100">28.1K Petualangan Ajaib</p>
                    </div>
                </a>

                <a href="/explore?genre=petualangan"
                    class="relative overflow-hidden rounded-2xl p-6 h-40 flex flex-col justify-end group shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-200 md:hidden lg:flex">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-emerald-600 opacity-90 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute -right-6 -top-6 text-white/20 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-32 h-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="relative z-10 text-white">
                        <h3 class="text-2xl font-black mb-1">Petualangan</h3>
                        <p class="text-sm font-medium text-emerald-100">22.4K Penjelajahan Baru</p>
                    </div>
                </a>

            </div>
        </section>

        <section class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-16">
            <h2 class="text-lg font-black text-slate-900 tracking-tight mb-6">
                <span x-show="searchQuery === ''">Semua Genre</span>
                <span x-show="searchQuery !== ''" x-text="`Hasil Pencarian untuk: '${searchQuery}'`"
                    style="display: none;"></span>
            </h2>

            <div x-show="filteredGenres.length === 0" style="display: none;"
                class="py-12 text-center bg-white rounded-2xl border border-slate-200 border-dashed">
                <p class="text-slate-500 font-medium">Hmm, kami tidak menemukan genre tersebut.</p>
                <button @click="searchQuery = ''"
                    class="mt-4 text-sm font-bold text-amber-600 hover:text-amber-700 underline underline-offset-4">Tampilkan
                    Semua Genre</button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">

                <template x-for="genre in filteredGenres" :key="genre.name">
                    <a :href="`/explore?genre=${genre.name.toLowerCase().replace(' ', '-')}`"
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
</x-app-layout>
