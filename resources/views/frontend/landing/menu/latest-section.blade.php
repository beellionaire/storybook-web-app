<section x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 200)"
    class="py-24 bg-white relative overflow-hidden">
    <div
        class="absolute left-0 top-1/2 -translate-y-1/2 w-72 h-72 bg-amber-400/5 rounded-full blur-[80px] pointer-events-none">
    </div>

    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="relative flex h-2.5 w-2.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span class="text-sm font-bold text-emerald-600 uppercase tracking-widest">Pembaruan Langsung</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                    Baru Saja <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-500">Rilis</span>
                </h2>
            </div>

            <a href="/latest"
                class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 hover:text-amber-500 transition-colors group px-4 py-2 rounded-full hover:bg-slate-50">
                Lihat Semua Update
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <a href="/story/1"
                class="group relative flex flex-col sm:flex-row gap-5 p-4 sm:p-5 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 100ms;">
                <div
                    class="relative w-full sm:w-36 h-48 sm:h-auto shrink-0 rounded-[1.25rem] overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1629196914275-f1545bb8ba68?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                        alt="Cover">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>

                <div class="flex flex-col flex-1 justify-center py-1">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bab 42</span>
                        <span class="text-[11px] font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">2
                            menit yang lalu</span>
                    </div>

                    <h3
                        class="text-xl font-bold text-slate-900 mb-1 leading-tight group-hover:text-amber-500 transition-colors">
                        Arsitektur Bintang</h3>
                    <p class="text-sm font-medium text-slate-500 mb-3">Oleh <span class="text-slate-800">Kenza</span>
                    </p>

                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        "Kita tidak bisa membiarkan inti reaktor itu mati," seru Elara sambil menatap layar holografik
                        yang mulai berkedip merah. Di luar angkasa sana, armada musuh...
                    </p>

                    <div class="mt-auto flex items-center justify-between">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-600 bg-white border border-slate-200 px-2.5 py-1 rounded-lg">Fiksi
                                Ilmiah</span>
                            <span
                                class="text-[10px] font-bold text-slate-600 bg-white border border-slate-200 px-2.5 py-1 rounded-lg hidden sm:inline-block">Aksi</span>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center group-hover:bg-amber-500 group-hover:-translate-y-1 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/2"
                class="group relative flex flex-col sm:flex-row gap-5 p-4 sm:p-5 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 200ms;">
                <div
                    class="relative w-full sm:w-36 h-48 sm:h-auto shrink-0 rounded-[1.25rem] overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1518621736915-f3b1c41bfd00?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                        alt="Cover">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>
                <div class="flex flex-col flex-1 justify-center py-1">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bab 12</span>
                        <span class="text-[11px] font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">15
                            menit yang lalu</span>
                    </div>
                    <h3
                        class="text-xl font-bold text-slate-900 mb-1 leading-tight group-hover:text-amber-500 transition-colors">
                        Senja di Kopi Kita</h3>
                    <p class="text-sm font-medium text-slate-500 mb-3">Oleh <span class="text-slate-800">Alya R.</span>
                    </p>
                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Aroma espresso menyapanya seketika ia mendorong pintu kaca itu. Di sudut yang sama, laki-laki
                        berkemeja flanel itu masih duduk dengan buku sketsanya.
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-600 bg-white border border-slate-200 px-2.5 py-1 rounded-lg">Romansa</span>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center group-hover:bg-amber-500 group-hover:-translate-y-1 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/3"
                class="group relative flex flex-col sm:flex-row gap-5 p-4 sm:p-5 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 300ms;">
                <div
                    class="relative w-full sm:w-36 h-48 sm:h-auto shrink-0 rounded-[1.25rem] overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                        alt="Cover">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>
                <div class="flex flex-col flex-1 justify-center py-1">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Epilog</span>
                        <span
                            class="text-[11px] font-semibold text-slate-600 bg-slate-200/50 px-2.5 py-1 rounded-full">1
                            jam yang lalu</span>
                    </div>
                    <h3
                        class="text-xl font-bold text-slate-900 mb-1 leading-tight group-hover:text-amber-500 transition-colors">
                        Bayang Masa Lalu</h3>
                    <p class="text-sm font-medium text-slate-500 mb-3">Oleh <span class="text-slate-800">Sarah M.</span>
                    </p>
                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Pintu itu tertutup untuk terakhir kalinya. Semua rahasia yang terkubur di rumah tua itu akhirnya
                        terungkap, menyisakan keheningan yang...
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-600 bg-white border border-slate-200 px-2.5 py-1 rounded-lg">Misteri</span>
                            <span
                                class="text-[10px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-lg">Tamat</span>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center group-hover:bg-amber-500 group-hover:-translate-y-1 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/4"
                class="group relative flex flex-col sm:flex-row gap-5 p-4 sm:p-5 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 400ms;">
                <div
                    class="relative w-full sm:w-36 h-48 sm:h-auto shrink-0 rounded-[1.25rem] overflow-hidden shadow-sm">
                    <img src="https://images.unsplash.com/photo-1605806616949-1e87b487cb2a?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                        alt="Cover">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>
                <div class="flex flex-col flex-1 justify-center py-1">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bab 1</span>
                        <span
                            class="text-[11px] font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full uppercase tracking-wider">Cerita
                            Baru</span>
                    </div>
                    <h3
                        class="text-xl font-bold text-slate-900 mb-1 leading-tight group-hover:text-amber-500 transition-colors">
                        Akademi Penyihir</h3>
                    <p class="text-sm font-medium text-slate-500 mb-3">Oleh <span class="text-slate-800">Raditya</span>
                    </p>
                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Hari pertama di akademi tidak berjalan sesuai rencana. Bukannya mendapat tongkat sihir, aku
                        malah diserahkan seekor naga kecil yang terus menyemburkan asap.
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-600 bg-white border border-slate-200 px-2.5 py-1 rounded-lg">Fantasi</span>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center group-hover:bg-amber-500 group-hover:-translate-y-1 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>
