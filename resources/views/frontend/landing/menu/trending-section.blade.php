<section class="py-20 bg-slate-50 relative overflow-hidden">
    <div
        class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-amber-500/5 blur-[100px] pointer-events-none">
    </div>

    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="flex h-2 w-2 relative">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                    </span>
                    <span class="text-sm font-bold text-amber-600 uppercase tracking-wider">Paling Banyak Dibaca</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Trending <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-600">Minggu
                        Ini</span>
                </h2>
            </div>

            <a href="/trending"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-amber-600 transition-colors group">
                Lihat Peringkat Lengkap
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="group cursor-pointer relative">
                <div
                    class="absolute -inset-2 bg-gradient-to-b from-amber-400/20 to-orange-500/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                    class="relative bg-white rounded-2xl p-3 shadow-xl shadow-slate-200/50 group-hover:-translate-y-2 transition-transform duration-500 border border-slate-100">

                    <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out"
                            alt="Cover Buku">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <div
                            class="absolute bottom-4 left-0 right-0 flex justify-center translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <a href="{{ route('books.detail') }}">
                                <button
                                    class="bg-amber-500 text-white text-xs font-bold px-4 py-2 rounded-full hover:bg-amber-600 shadow-lg">Baca
                                    Sekarang</button>
                            </a>
                        </div>

                        <div
                            class="absolute top-3 left-3 bg-white/20 backdrop-blur-md border border-white/40 text-white font-black text-lg w-10 h-10 flex items-center justify-center rounded-full shadow-lg">
                            1
                        </div>
                    </div>

                    <div class="px-2 pb-2">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-amber-600 transition-colors">
                            Eko-Sistem: Batas Akhir</h3>
                        <p class="text-xs text-slate-500 mb-3">Ditulis oleh <span
                                class="font-semibold text-slate-800">Nabil</span></p>

                        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                            <div class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-700">4.9</span>
                            </div>
                            <div class="flex items-center gap-1 text-slate-400 text-xs font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                124K
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer relative">
                <div
                    class="absolute -inset-2 bg-gradient-to-b from-slate-300/20 to-slate-400/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative bg-white rounded-2xl p-3 shadow-xl shadow-slate-200/50 group-hover:-translate-y-2 transition-transform duration-500 border border-slate-100">
                    <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out"
                            alt="Cover Buku">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <div
                            class="absolute bottom-4 left-0 right-0 flex justify-center translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <button
                                class="bg-amber-500 text-white text-xs font-bold px-4 py-2 rounded-full hover:bg-amber-600 shadow-lg">Baca
                                Sekarang</button>
                        </div>
                        <div
                            class="absolute top-3 left-3 bg-white/20 backdrop-blur-md border border-white/40 text-white font-black text-lg w-10 h-10 flex items-center justify-center rounded-full shadow-lg">
                            2
                        </div>
                    </div>
                    <div class="px-2 pb-2">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-amber-600 transition-colors">
                            Sirkuit Hati</h3>
                        <p class="text-xs text-slate-500 mb-3">Ditulis oleh <span
                                class="font-semibold text-slate-800">Raditya</span></p>
                        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                            <div class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-700">4.8</span>
                            </div>
                            <div class="flex items-center gap-1 text-slate-400 text-xs font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                98K
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer relative">
                <div
                    class="absolute -inset-2 bg-gradient-to-b from-orange-300/20 to-rose-400/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative bg-white rounded-2xl p-3 shadow-xl shadow-slate-200/50 group-hover:-translate-y-2 transition-transform duration-500 border border-slate-100">
                    <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1614531341773-3bff8b7cb3fc?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out"
                            alt="Cover Buku">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <div
                            class="absolute bottom-4 left-0 right-0 flex justify-center translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <button
                                class="bg-amber-500 text-white text-xs font-bold px-4 py-2 rounded-full hover:bg-amber-600 shadow-lg">Baca
                                Sekarang</button>
                        </div>
                        <div
                            class="absolute top-3 left-3 bg-white/20 backdrop-blur-md border border-white/40 text-white font-black text-lg w-10 h-10 flex items-center justify-center rounded-full shadow-lg">
                            3
                        </div>
                    </div>
                    <div class="px-2 pb-2">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-amber-600 transition-colors">
                            Bayang Masa Lalu</h3>
                        <p class="text-xs text-slate-500 mb-3">Ditulis oleh <span
                                class="font-semibold text-slate-800">Sarah M.</span></p>
                        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                            <div class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-700">4.7</span>
                            </div>
                            <div class="flex items-center gap-1 text-slate-400 text-xs font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                85K
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer relative hidden lg:block">
                <div
                    class="absolute -inset-2 bg-gradient-to-b from-blue-300/20 to-cyan-400/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative bg-white rounded-2xl p-3 shadow-xl shadow-slate-200/50 group-hover:-translate-y-2 transition-transform duration-500 border border-slate-100">
                    <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out"
                            alt="Cover Buku">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <div
                            class="absolute bottom-4 left-0 right-0 flex justify-center translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <button
                                class="bg-amber-500 text-white text-xs font-bold px-4 py-2 rounded-full hover:bg-amber-600 shadow-lg">Baca
                                Sekarang</button>
                        </div>
                        <div
                            class="absolute top-3 left-3 bg-slate-900/40 backdrop-blur-md border border-white/20 text-white font-bold text-sm w-8 h-8 flex items-center justify-center rounded-full shadow-lg">
                            4
                        </div>
                    </div>
                    <div class="px-2 pb-2">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-amber-600 transition-colors">
                            Dimensi Paralel</h3>
                        <p class="text-xs text-slate-500 mb-3">Ditulis oleh <span
                                class="font-semibold text-slate-800">Ken</span></p>
                        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                            <div class="flex items-center gap-1.5 bg-slate-50 px-2 py-1 rounded-md">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-xs font-bold text-slate-700">4.6</span>
                            </div>
                            <div class="flex items-center gap-1 text-slate-400 text-xs font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                62K
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
