<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-24 font-sans antialiased text-slate-800 selection:bg-amber-200 selection:text-amber-900"
        x-data="{ activeTab: 'summary' }">

        <div class="bg-white border-b border-slate-200/80 pt-8 sm:pt-12 pb-12 sm:pb-16">
            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">

                <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-8 sm:mb-12">
                    <a href="/" class="hover:text-slate-900 transition-colors">Beranda</a>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="/explore" class="hover:text-slate-900 transition-colors">Fiksi Ilmiah</a>
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-slate-900">Eko-Sistem: Batas Akhir</span>
                </nav>

                <div class="flex flex-col md:flex-row gap-8 lg:gap-14 items-center md:items-start">

                    <div class="shrink-0 group">
                        <div
                            class="w-[200px] sm:w-[240px] aspect-[2/3] rounded-2xl overflow-hidden shadow-[0_20px_40px_rgba(15,23,42,0.1)] ring-1 ring-slate-900/5 relative">
                            <img src="https://images.unsplash.com/photo-1519682337058-a94d519337bc?q=80&w=600&auto=format&fit=crop"
                                alt="Kover Cerita"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                            <div
                                class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-widest text-amber-600 shadow-sm">
                                Premium
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left w-full">

                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-4">
                            <span
                                class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">StoryHub
                                Originals</span>
                            <span
                                class="bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Tamat</span>
                        </div>

                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-[1.15] mb-5">
                            Eko-Sistem: Batas Akhir
                        </h1>

                        <div
                            class="flex items-center gap-3 mb-8 bg-slate-50 px-4 py-2 rounded-full border border-slate-100">
                            <img src="https://ui-avatars.com/api/?name=Nabil&background=0f172a&color=fff"
                                alt="Avatar Penulis" class="w-8 h-8 rounded-full shadow-sm">
                            <div class="text-left flex items-center gap-2">
                                <span class="text-sm font-bold text-slate-900">Nabil</span>
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-slate-300 mx-1">•</span>
                                <span class="text-xs font-medium text-slate-500">2 Des 2025</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-6 sm:gap-10 mb-8">
                            <div class="text-center md:text-left">
                                <div class="text-xl sm:text-2xl font-black text-slate-900">459<span
                                        class="text-slate-400">K</span></div>
                                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mt-1">Pembaca
                                </div>
                            </div>
                            <div class="w-px h-8 bg-slate-200"></div>
                            <div class="text-center md:text-left">
                                <div
                                    class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-1 justify-center md:justify-start">
                                    4.9 <svg class="w-5 h-5 text-amber-500 mb-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mt-1">Rating
                                </div>
                            </div>
                            <div class="w-px h-8 bg-slate-200"></div>
                            <div class="text-center md:text-left">
                                <div class="text-xl sm:text-2xl font-black text-slate-900">47</div>
                                <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mt-1">Bab
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto mt-auto">
                            <a href="/read/chapter-1"
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white px-8 py-3.5 rounded-xl font-bold text-sm transition-all shadow-md active:scale-95">
                                Mulai Membaca
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <button
                                class="w-full sm:w-auto inline-flex justify-center items-center gap-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 px-8 py-3.5 rounded-xl font-bold text-sm transition-all active:scale-95 shadow-sm">
                                <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah ke Pustaka
                            </button>
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
                            <span
                                class="bg-slate-200/70 text-slate-700 px-2 py-0.5 rounded text-[10px] leading-none">47</span>
                            <div x-show="activeTab === 'chapters'" x-transition
                                class="absolute bottom-[-1px] left-0 w-full h-[2px] bg-slate-900 rounded-t-full"></div>
                        </button>
                    </div>

                    <div x-show="activeTab === 'summary'" x-transition.opacity.duration.300ms>

                        <div class="flex flex-wrap gap-2 mb-8">
                            <span
                                class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-600 hover:border-slate-300 cursor-pointer transition-colors">Distopia</span>
                            <span
                                class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-600 hover:border-slate-300 cursor-pointer transition-colors">Fiksi
                                Ilmiah</span>
                            <span
                                class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-600 hover:border-slate-300 cursor-pointer transition-colors">Bertahan
                                Hidup</span>
                        </div>

                        <article
                            class="prose prose-slate prose-p:text-slate-600 prose-p:leading-[1.8] max-w-none mb-12">
                            <p
                                class="text-lg font-semibold text-slate-900 italic border-l-4 border-amber-400 pl-5 mb-8">
                                "Ketika bumi menolak untuk bernapas, satu-satunya jalan keluar adalah menciptakan
                                ekosistem baru di atas awan. Namun, harga yang harus dibayar terlalu mahal."
                            </p>
                            <p>Satu kota terapung menjadi harapan terakhir saat bumi berhenti bernapas. Mampukah mereka
                                bertahan ketika pemberontakan mulai membakar dari dalam? Kiana, seorang mekanik tingkat
                                bawah, secara tidak sengaja menemukan cetak biru inti reaktor yang seharusnya tidak
                                pernah ada.</p>
                            <p>Di dunia di mana oksigen dijatah dan cahaya matahari adalah kemewahan, Kiana harus
                                memilih: melindungi keluarganya, atau menyelamatkan puluhan ribu nyawa yang dijanjikan
                                kebebasan semu. Ini adalah kisah tentang batas akhir kemanusiaan.</p>
                        </article>

                        <div
                            class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div class="text-center sm:text-left flex-1">
                                <h4 class="text-lg font-black text-slate-900 mb-1">Dukung Karya Nabil</h4>
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
                        </div>
                    </div>

                    <div x-show="activeTab === 'chapters'" style="display: none;" x-transition.opacity.duration.300ms>
                        <div class="flex flex-col gap-3">

                            <a href="/read/chapter-1"
                                class="group flex items-center justify-between p-4 sm:p-5 bg-white border border-slate-200 rounded-2xl hover:border-amber-400 hover:shadow-md hover:shadow-amber-500/5 transition-all">
                                <div class="flex items-center gap-4 sm:gap-6">
                                    <div
                                        class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-slate-50 flex items-center justify-center font-black text-slate-300 group-hover:bg-amber-100 group-hover:text-amber-600 transition-colors">
                                        1
                                    </div>
                                    <div>
                                        <h4
                                            class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">
                                            Awal Mula</h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-1">
                                            <span>2 Des 2025</span>
                                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                            <span>15 mnt baca</span>
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

                            <a href="/read/chapter-2"
                                class="group flex items-center justify-between p-4 sm:p-5 bg-white border border-slate-200 rounded-2xl hover:border-amber-400 hover:shadow-md hover:shadow-amber-500/5 transition-all">
                                <div class="flex items-center gap-4 sm:gap-6">
                                    <div
                                        class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-slate-50 flex items-center justify-center font-black text-slate-300 group-hover:bg-amber-100 group-hover:text-amber-600 transition-colors">
                                        2
                                    </div>
                                    <div>
                                        <h4
                                            class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">
                                            Mekanik Bawah Tanah</h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-1">
                                            <span>4 Des 2025</span>
                                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                            <span>12 mnt baca</span>
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

                        </div>

                        <div class="mt-8 text-center">
                            <button
                                class="text-sm font-bold text-slate-500 hover:text-slate-900 transition-colors underline underline-offset-4 decoration-slate-300 hover:decoration-slate-900">
                                Tampilkan Semua 47 Bab
                            </button>
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
                            mempublikasikan ulang materi ini tanpa izin tertulis.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-5">Cerita Serupa</h3>
                        <div class="space-y-4">
                            <a href="#" class="flex gap-4 group">
                                <div class="w-14 aspect-[2/3] rounded-md overflow-hidden bg-slate-100 shrink-0">
                                    <img src="https://images.unsplash.com/photo-1605806616949-1e87b487cb2a?q=80&w=200&auto=format&fit=crop"
                                        alt="Cover"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-slate-900 group-hover:text-amber-600 line-clamp-2">
                                        Akademi Penyihir Menara Langit</h4>
                                    <p class="text-xs text-slate-500 mt-1">Oleh Raditya</p>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <div class="w-14 aspect-[2/3] rounded-md overflow-hidden bg-slate-100 shrink-0">
                                    <img src="https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=200&auto=format&fit=crop"
                                        alt="Cover"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-slate-900 group-hover:text-amber-600 line-clamp-2">
                                        Bayang Masa Lalu di Kota Mati</h4>
                                    <p class="text-xs text-slate-500 mt-1">Oleh Sarah M.</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
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
