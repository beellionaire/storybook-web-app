<section x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 200)"
    class="py-9 lg:py-28 bg-[#f8fafc] relative overflow-hidden font-sans">

    <div class="absolute top-10 left-10 text-emerald-300 animate-bounce" style="animation-duration: 3s;">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z" />
        </svg>
    </div>

    <div class="absolute bottom-10 right-10 text-amber-300 animate-bounce" style="animation-duration: 4s;">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
            <div>
                <h2 class="font-balsamiq text-4xl md:text-5xl font-bold text-slate-800 drop-shadow-sm">
                    Baru Saja <span class="text-emerald-500">Rilis!</span>
                </h2>
            </div>

            <a href="/latest"
                class="inline-flex items-center gap-2 px-6 py-3 bg-white border-2 border-slate-200 rounded-full text-sm font-bold text-slate-700 hover:border-emerald-400 hover:text-emerald-600 transition-colors shadow-sm group">
                Lihat Semua
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">

            <a href="/story/1"
                class="group relative flex flex-col sm:flex-row gap-5 p-5 bg-white rounded-3xl border-2 border-slate-100 hover:border-emerald-400 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 100ms;">

                <div
                    class="relative w-full sm:w-40 h-56 sm:h-auto shrink-0 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1629196914275-f1545bb8ba68?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="Cover">
                </div>

                <div class="flex flex-col flex-1 py-1">
                    <div class="flex items-center justify-between mb-3">
                        <span
                            class="text-xs font-bold text-blue-700 bg-blue-100 px-3 py-1 rounded-full border border-blue-200">Bab
                            42</span>
                        <span class="text-xs font-bold text-emerald-600">2 menit lalu</span>
                    </div>

                    <h3
                        class="font-balsamiq text-2xl font-bold text-slate-800 mb-1 leading-tight group-hover:text-emerald-500 transition-colors">
                        Robot Penjaga Galaksi
                    </h3>
                    <p class="text-xs font-medium text-slate-500 mb-3">Oleh <span
                            class="font-bold text-slate-700">Kenza</span></p>

                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        "Kita tidak bisa membiarkan inti reaktor itu mati!" seru Elara. Ia memerintahkan robot
                        peliharaannya untuk menyambungkan kabel tenaga cadangan...
                    </p>

                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-md uppercase tracking-wider">Fiksi
                                Ilmiah</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/2"
                class="group relative flex flex-col sm:flex-row gap-5 p-5 bg-white rounded-3xl border-2 border-slate-100 hover:border-amber-400 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 200ms;">

                <div
                    class="relative w-full sm:w-40 h-56 sm:h-auto shrink-0 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1518621736915-f3b1c41bfd00?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="Cover">
                </div>

                <div class="flex flex-col flex-1 py-1">
                    <div class="flex items-center justify-between mb-3">
                        <span
                            class="text-xs font-bold text-amber-700 bg-amber-100 px-3 py-1 rounded-full border border-amber-200">Bab
                            12</span>
                        <span class="text-xs font-bold text-emerald-600">15 menit lalu</span>
                    </div>

                    <h3
                        class="font-balsamiq text-2xl font-bold text-slate-800 mb-1 leading-tight group-hover:text-amber-500 transition-colors">
                        Misteri Peta Kuno
                    </h3>
                    <p class="text-xs font-medium text-slate-500 mb-3">Oleh <span class="font-bold text-slate-700">Alya
                            R.</span></p>

                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Di balik lukisan tua kakek, Dika menemukan gulungan perkamen. Saat dibuka, peta itu menunjukkan
                        rute rahasia menuju hutan terlarang.
                    </p>

                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-md uppercase tracking-wider">Petualangan</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/3"
                class="group relative flex flex-col sm:flex-row gap-5 p-5 bg-white rounded-3xl border-2 border-slate-100 hover:border-purple-400 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 300ms;">

                <div
                    class="relative w-full sm:w-40 h-56 sm:h-auto shrink-0 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="Cover">
                </div>

                <div class="flex flex-col flex-1 py-1">
                    <div class="flex items-center justify-between mb-3">
                        <span
                            class="text-xs font-bold text-purple-700 bg-purple-100 px-3 py-1 rounded-full border border-purple-200">Epilog</span>
                        <span class="text-xs font-bold text-emerald-600">1 jam lalu</span>
                    </div>

                    <h3
                        class="font-balsamiq text-2xl font-bold text-slate-800 mb-1 leading-tight group-hover:text-purple-500 transition-colors">
                        Detektif Cilik & Loker Kaca
                    </h3>
                    <p class="text-xs font-medium text-slate-500 mb-3">Oleh <span class="font-bold text-slate-700">Sarah
                            M.</span></p>

                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Pintu loker bernomor 404 itu akhirnya terbuka. Semua rahasia hilangnya kapur ajaib terungkap,
                        menyisakan kejutan yang tak disangka!
                    </p>

                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-md uppercase tracking-wider">Misteri</span>
                            <span
                                class="text-[10px] font-bold text-purple-700 bg-purple-100 px-2.5 py-1 rounded-md uppercase tracking-wider">Tamat</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-colors shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/story/4"
                class="group relative flex flex-col sm:flex-row gap-5 p-5 bg-white rounded-3xl border-2 border-slate-100 hover:border-pink-400 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'"
                style="transition-delay: 400ms;">

                <div
                    class="relative w-full sm:w-40 h-56 sm:h-auto shrink-0 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1605806616949-1e87b487cb2a?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        alt="Cover">
                </div>

                <div class="flex flex-col flex-1 py-1">
                    <div class="flex items-center justify-between mb-3">
                        <span
                            class="text-xs font-bold text-pink-700 bg-pink-100 px-3 py-1 rounded-full border border-pink-200">Bab
                            1</span>
                        <span
                            class="text-xs font-bold text-rose-500 bg-rose-50 px-2.5 py-1 rounded-full border border-rose-100">Baru!</span>
                    </div>

                    <h3
                        class="font-balsamiq text-2xl font-bold text-slate-800 mb-1 leading-tight group-hover:text-pink-500 transition-colors">
                        Akademi Penyihir Awan
                    </h3>
                    <p class="text-xs font-medium text-slate-500 mb-3">Oleh <span
                            class="font-bold text-slate-700">Raditya</span></p>

                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                        Hari pertama di akademi tidak berjalan sesuai rencana. Bukannya mendapat sapu terbang, aku malah
                        diserahkan seekor naga kecil pemarah!
                    </p>

                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex gap-2">
                            <span
                                class="text-[10px] font-bold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-md uppercase tracking-wider">Fantasi</span>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-colors shadow-sm">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
