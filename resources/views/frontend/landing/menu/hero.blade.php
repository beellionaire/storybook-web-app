<section x-data="{
        mounted: false,
        init() { setTimeout(() => this.mounted = true, 150) }
    }"
    class="relative isolate overflow-hidden bg-[#fffdf8] pt-20 pb-28 sm:pt-24 lg:pt-32 lg:pb-32 font-sans selection:bg-amber-200 selection:text-amber-900">

    <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,rgba(251,191,36,0.1),transparent_70%)]"></div>

    <img src="{{ asset('images/left-cloud.png') }}" alt="Left Cloud"
        class="absolute hidden md:block top-32 lg:top-14 -left-12 w-32 sm:w-48 lg:w-[600px] -translate-x-1/4 -z-10 animate-pulse opacity-80"
        style="animation-delay: 200ms; animation-duration: 6s">

    <img src="{{ asset('images/right-cloud.png') }}" alt="Right Cloud"
        class="absolute hidden md:block top-20 lg:top-9 -right-12 w-32 sm:w-48 lg:w-[700px] translate-x-1/4 -z-10 animate-pulse opacity-80"
        style="animation-delay: 400ms; animation-duration: 8s">


    <div class="relative mx-auto max-w-[1500px] px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">

        <div class="relative max-w-[1000px] mx-auto">
            <h1 class="font-balsamiq max-w-[1500px] text-5xl font-bold leading-tight text-slate-900 sm:text-6xl lg:text-7xl transition-all duration-700 delay-100 ease-out drop-shadow-sm mx-auto"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                Mulai Petualangan Membaca <span class="text-amber-500">yang Menyenangkan!</span>
            </h1>
        </div>

        <p class="mt-6 max-w-2xl text-lg lg:text-xl font-medium leading-relaxed text-slate-600 transition-all duration-700 delay-200 ease-out"
            :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
            Jelajahi dunia tanpa batas melalui cerita seru. Baca buku favoritmu, dapatkan lencana, dan jadilah pahlawan
            di setiap petualangan!
        </p>

        <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center justify-center transition-all duration-700 delay-300 ease-out"
            :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
            <a href="/browse"
                class="font-balsamiq group relative inline-flex items-center justify-center overflow-hidden rounded-full bg-slate-900 px-10 py-4 text-lg font-bold text-white transition-all duration-300 hover:scale-105 hover:bg-slate-800 hover:shadow-xl hover:shadow-slate-900/20 active:scale-95">
                <span
                    class="absolute inset-0 h-full w-full rounded-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></span>
                <span class="relative flex items-center gap-2">
                    Mulai Eksplorasi
                    <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>
        </div>

        <div class="mt-0 relative w-full flex justify-center transition-all duration-1000 delay-500 ease-[cubic-bezier(0.23,1,0.32,1)]"
            :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-16 opacity-0'">

            <div class="relative w-full max-w-[1050px] px-4 lg:px-0">
                <img src="{{ asset('images/hero.png') }}" alt="Anak-anak belajar dan membaca"
                    class="w-full h-auto object-contain drop-shadow-[0_25px_25px_rgba(0,0,0,0.1)] hover:-translate-y-2 transition-transform duration-500">
            </div>

        </div>

    </div>

    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</section>
