{{-- resources/views/books/explore.blade.php --}}

<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-24 font-sans antialiased text-slate-800 selection:bg-amber-200 selection:text-amber-900"
        x-data="{
            selectedGenre: 'semua',
            selectedStatus: 'semua',
            sortBy: 'populer',
            searchQuery: '',
            mobileFilterOpen: false
         }">

        <header class="bg-white border-b border-slate-200/80 pt-12 pb-10">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 text-center lg:text-left">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mb-2">
                            Eksplorasi Cerita
                        </h1>
                        <p class="text-sm text-slate-500">
                            Temukan jutaan petualangan, romansa, dan fantasi dari penulis berbakat.
                        </p>
                    </div>

                    <div class="w-full lg:max-w-md relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" x-model="searchQuery" placeholder="Cari judul cerita atau nama penulis..."
                            class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:outline-none focus:border-slate-400 focus:bg-white transition-all shadow-sm">
                    </div>
                </div>
            </div>
        </header>

        <div class="bg-white border-b border-slate-200/60 py-4 shadow-sm relative z-20">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 sm:pb-0">
                    <template
                        x-for="genre in ['semua', 'fiksi-ilmiah', 'distopia', 'fantasi', 'romansa', 'misteri', 'petualangan']">
                        <button @click="selectedGenre = genre"
                            class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider border whitespace-nowrap transition-all"
                            :class="selectedGenre === genre
                                    ? 'bg-slate-900 border-slate-900 text-white shadow-md shadow-slate-900/10'
                                    : 'bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100 hover:text-slate-900'">
                            <span x-text="genre.replace('-', ' ')"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>

        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-8 sm:mt-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                <aside
                    class="hidden lg:block lg:col-span-3 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-8">
                    <div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Status Cerita</h3>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700 cursor-pointer">
                                <input type="radio" name="status" value="semua" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300 focus:ring-slate-900">
                                <span>Semua Status</span>
                            </label>
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700 cursor-pointer">
                                <input type="radio" name="status" value="ongoing" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300 focus:ring-slate-900">
                                <span>Berjalan (Ongoing)</span>
                            </label>
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700 cursor-pointer">
                                <input type="radio" name="status" value="tamat" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300 focus:ring-slate-900">
                                <span>Tamat (Completed)</span>
                            </label>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6">
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Urutkan Berdasarkan
                        </h3>
                        <select x-model="sortBy"
                            class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 focus:outline-none focus:border-slate-400 transition-colors">
                            <option value="populer">Paling Populer</option>
                            <option value="terbaru">Pembaruan Terbaru</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                </aside>

                <main class="lg:col-span-9">

                    <div class="flex lg:hidden items-center justify-between mb-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Menampilkan
                            Cerita</span>
                        <button @click="mobileFilterOpen = true"
                            class="inline-flex items-center gap-2 bg-white border border-slate-200 px-4 py-2 rounded-xl text-xs font-bold text-slate-700 shadow-sm active:bg-slate-50">
                            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter & Urutkan
                        </button>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-8 sm:gap-6">

                        @for ($i = 1; $i <= 8; $i++) <article class="group flex flex-col cursor-pointer">
                            <div
                                class="w-full aspect-[2/3] rounded-xl overflow-hidden bg-slate-100 shadow-sm border border-slate-200/60 relative mb-3">
                                <img src="https://images.unsplash.com/photo-1519682337058-a94d519337bc?q=80&w=400&auto=format&fit=crop"
                                    alt="Cover Buku"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                <div class="absolute bottom-2 left-2 flex gap-1">
                                    <span
                                        class="bg-slate-900/80 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded">
                                        Original
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-col flex-1">
                                <h3
                                    class="font-bold text-slate-900 text-sm sm:text-base line-clamp-1 leading-snug group-hover:text-amber-600 transition-colors">
                                    Eko-Sistem: Batas Akhir #{{ $i }}
                                </h3>
                                <p class="text-xs text-slate-500 font-medium mt-1">
                                    Oleh Nabil
                                </p>

                                <div
                                    class="flex items-center gap-3 text-[11px] text-slate-400 font-bold uppercase tracking-wider mt-2 pt-2 border-t border-slate-100">
                                    <span class="flex items-center gap-1">
                                        <span class="text-slate-700">459K</span> Baca
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span class="flex items-center gap-0.5 text-amber-600">
                                        4.9 ★
                                    </span>
                                </div>
                            </div>
                            </article>
                            @endfor

                    </div>

                    <div class="mt-16 flex items-center justify-center gap-2">
                        <button
                            class="w-10 h-10 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <span class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold shadow-sm">1</span>
                        <button
                            class="w-10 h-10 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors">2</button>
                        <button
                            class="w-10 h-10 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors">3</button>
                        <button
                            class="w-10 h-10 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                </main>
            </div>
        </div>

        <div class="fixed inset-0 z-50 lg:hidden" x-show="mobileFilterOpen" style="display: none;" role="dialog"
            aria-modal="true">

            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" x-show="mobileFilterOpen"
                x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                @click="mobileFilterOpen = false"></div>

            <div class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-2xl p-6 flex flex-col justify-between"
                x-show="mobileFilterOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

                <div class="space-y-8">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h2 class="text-base font-black text-slate-900 uppercase tracking-wide">Filter Cerita</h2>
                        <button @click="mobileFilterOpen = false" class="text-slate-400 hover:text-slate-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Status Cerita</h3>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                                <input type="radio" name="mobile-status" value="semua" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300">
                                <span>Semua Status</span>
                            </label>
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                                <input type="radio" name="mobile-status" value="ongoing" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300">
                                <span>Berjalan</span>
                            </label>
                            <label class="flex items-center gap-3 text-sm font-medium text-slate-700">
                                <input type="radio" name="mobile-status" value="tamat" x-model="selectedStatus"
                                    class="w-4 h-4 text-slate-900 border-slate-300">
                                <span>Tamat</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Urutkan Berdasarkan
                        </h3>
                        <select x-model="sortBy"
                            class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700">
                            <option value="populer">Paling Populer</option>
                            <option value="terbaru">Pembaruan Terbaru</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                </div>

                <button @click="mobileFilterOpen = false"
                    class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold text-sm uppercase tracking-wider shadow-md active:bg-slate-800">
                    Terapkan Filter
                </button>
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
</x-app-layout>
