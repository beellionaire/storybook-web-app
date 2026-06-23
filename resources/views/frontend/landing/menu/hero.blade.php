<section x-data="{
        mounted: false,
        init() { setTimeout(() => this.mounted = true, 150) }
    }"
    class="relative isolate overflow-hidden bg-slate-50 pt-20 pb-28 sm:pt-24 lg:pt-32 lg:pb-40 font-sans selection:bg-amber-200 selection:text-amber-900">

    <div
        class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,rgba(251,191,36,0.08),transparent_50%),radial-gradient(circle_at_bottom_right,rgba(15,23,42,0.05),transparent_50%)]">
    </div>
    <div class="absolute top-0 right-1/4 -z-10 h-[500px] w-[500px] rounded-full bg-amber-400/10 blur-[100px] mix-blend-multiply animate-pulse"
        style="animation-duration: 8s;"></div>
    <div
        class="absolute -bottom-32 -left-32 -z-10 h-[600px] w-[600px] rounded-full bg-blue-400/5 blur-[120px] mix-blend-multiply">
    </div>

    <div class="relative mx-auto max-w-[1500px] px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-[1fr_1.1fr] lg:gap-16">

            <div class="text-left">
                <div class="mb-8 inline-flex items-center gap-3 rounded-full bg-white/60 backdrop-blur-md px-3 py-2 text-xs font-bold uppercase tracking-wider text-slate-800 shadow-sm ring-1 ring-slate-200/50 transition-all duration-700 ease-out"
                    :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                    <span class="relative flex h-6 w-6 items-center justify-center rounded-full bg-amber-400">
                        <span
                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-40"></span>
                        <svg class="h-3 w-3 text-amber-950" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </span>
                    Era Baru Platform Literasi
                </div>

                <h1 class="max-w-3xl text-5xl font-black leading-[1.05] tracking-tight text-slate-900 sm:text-6xl lg:text-7xl transition-all duration-700 delay-100 ease-out"
                    :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                    Cerita yang terasa hidup sejak <span
                        class="relative whitespace-nowrap text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-600">halaman
                        pertama</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-600 transition-all duration-700 delay-200 ease-out"
                    :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                    Temukan jutaan karya orisinal, ikuti pembaruan bab secara <i>real-time</i>, dan jadilah bagian dari
                    komunitas penulis dan pembaca paling interaktif di dunia
                </p>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center transition-all duration-700 delay-300 ease-out"
                    :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                    <a href="/browse"
                        class="group relative inline-flex items-center justify-center overflow-hidden rounded-full bg-slate-950 px-8 py-4 font-semibold text-white transition-all duration-300 hover:scale-105 hover:shadow-[0_20px_40px_rgba(15,23,42,0.3)] active:scale-95">
                        <span
                            class="absolute inset-0 h-full w-full rounded-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></span>
                        <span class="relative flex items-center gap-3">
                            Mulai Membaca
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </a>

                    <a href="/write"
                        class="group inline-flex items-center justify-center rounded-full bg-white px-8 py-4 font-semibold text-slate-700 ring-1 ring-slate-200/80 transition-all duration-300 hover:bg-slate-50 hover:text-amber-600 hover:shadow-lg active:scale-95">
                        Tulis Karyamu
                    </a>
                </div>

                <div class="mt-14 grid max-w-xl grid-cols-3 gap-6 border-t border-slate-200/60 pt-10 transition-all duration-700 delay-400 ease-out"
                    :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                    <div>
                        <p class="text-3xl font-black text-slate-900">2M<span class="text-amber-500">+</span></p>
                        <p class="mt-1 text-sm font-medium text-slate-500">Pembaca Aktif</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-slate-900">50K<span class="text-amber-500">+</span></p>
                        <p class="mt-1 text-sm font-medium text-slate-500">Cerita Terbit</p>
                    </div>
                    <div>
                        <div class="flex items-center gap-1">
                            <p class="text-3xl font-black text-slate-900">4.9</p>
                            <svg class="h-5 w-5 text-amber-500 mb-1" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="mt-1 text-sm font-medium text-slate-500">Rating Rata-rata</p>
                    </div>
                </div>
            </div>

            <div class="relative hidden lg:flex w-full h-[400px] sm:h-[500px] lg:h-[600px] items-center justify-center lg:justify-end transition-all duration-1000 delay-300 ease-[cubic-bezier(0.23,1,0.32,1)]"
                :class="mounted ? 'translate-x-0 opacity-100 blur-0' : 'translate-x-16 opacity-0 blur-md'">

                <div class="absolute right-[10%] top-1/2 -z-10 h-[500px] w-[500px] -translate-y-1/2 animate-pulse bg-gradient-to-tr from-amber-400/20 to-yellow-200/10 blur-[80px] pointer-events-none"
                    style="animation-duration: 4s;"></div>

                <div
                    class="relative z-10 w-full max-w-[500px] lg:max-w-[700px] flex justify-center animate-[float_6s_ease-in-out_infinite]">
                    <img src="/images/3d-book.png" alt="3D Book Cover"
                        class="w-full h-auto object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.25)] scale-110 sm:scale-125 lg:scale-[1.4] origin-center transition-transform duration-700 hover:scale-[1.45]">
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Animasi kilauan pada tombol */
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        /* Animasi melayang pada buku (Float) */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</section>
