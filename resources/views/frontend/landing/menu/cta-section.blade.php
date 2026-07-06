<section class="py-12 bg-[#fff] font-sans px-4 sm:px-6 lg:px-8">
    <div class="max-w-[1500px] mx-auto">
        <div
            class="relative bg-[#fff8e8] rounded-[2.5rem] p-8 md:p-12 overflow-hidden flex flex-col md:flex-row items-center justify-between">

            <div class="absolute top-8 right-1/2 md:right-1/3 -translate-x-1/2 pointer-events-none hidden sm:block">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" class="text-rose-400">
                    <path d="M20 0 L24 16 L40 20 L24 24 L20 40 L16 24 L0 20 L16 16 Z" fill="currentColor" />
                </svg>
            </div>

            <div class="absolute bottom-12 right-12 pointer-events-none hidden sm:block">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" class="text-amber-400">
                    <path d="M15 0 L18 12 L30 15 L18 18 L15 30 L12 18 L0 15 L12 12 Z" fill="currentColor" />
                </svg>
            </div>

            <div class="absolute top-1/2 right-4 -translate-y-1/2 pointer-events-none hidden sm:block">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" class="text-orange-400 opacity-60">
                    <path d="M10 30 Q 20 10, 30 30 T 50 30" stroke="currentColor" stroke-width="4" fill="none"
                        stroke-linecap="round" />
                </svg>
            </div>

            <div class="w-full md:w-3/5 text-center md:text-left relative z-10">
                <div
                    class="inline-flex items-center text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-4">
                    Tawaran Spesial Penulis
                </div>

                <h2
                    class="font-balsamiq text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-800 leading-tight mb-4 drop-shadow-sm">
                    Siap menerbitkan karyamu hari ini?
                </h2>

                <p class="text-sm sm:text-base font-medium text-slate-600 mb-8 max-w-md mx-auto md:mx-0">
                    Bergabunglah dengan ribuan penulis yang telah menemukan pembaca setia mereka. Jadilah inspirasi!
                </p>

                <a href="{{ (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'contributor'))
                    ? route('contributor.stories.index')
                    : route('contributor.apply.create') }}"
                    class="inline-block bg-slate-800 hover:bg-slate-900 text-white font-bold py-3.5 px-8 rounded-2xl text-sm transition-all shadow-md active:scale-95">
                    Mulai Menulis Sekarang
                </a>
            </div>

            <div class="w-full md:w-2/5 mt-16 md:mt-0 flex justify-center md:justify-end relative z-10">
                <div
                    class="w-72 sm:w-80 md:w-96 lg:w-[48rem] relative right-0 lg:-right-8 animate-[float_4s_ease-in-out_infinite] scale-125 lg:scale-150 origin-center md:origin-right">
                    <img src="{{ asset('/images/childpencil.webp') }}" alt="Penulis Cilik" loading="lazy"
                        class="w-full h-auto object-contain drop-shadow-2xl">
                </div>
            </div>

        </div>
    </div>
</section>
