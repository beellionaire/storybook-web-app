<x-layouts.main>
    <div class="min-h-screen bg-[#F8FAFC] py-12 md:py-16 font-sans antialiased text-slate-800"
        x-data="{ isLoaded: false }" x-init="setTimeout(() => isLoaded = true, 300)">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center max-w-2xl mx-auto mb-12">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-amber-50 text-amber-500 mb-6 shadow-sm border border-amber-100/60">
                    <i class="fa-regular fa-compass text-2xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight mb-4">
                    Ruang Kosong Tanpa Batas
                </h1>
                <p class="text-slate-500 text-sm md:text-base leading-relaxed">
                    Rancang halaman web impian Anda dengan mudah menggunakan desain modular premium dan interaksi
                    Alpine.js yang mulus.
                </p>
            </div>

            <div x-show="isLoaded" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="bg-white rounded-[2.5rem] p-8 sm:p-12 md:p-16 border border-slate-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.02)] max-w-4xl mx-auto min-h-[400px] flex flex-col items-center justify-center text-center relative">

                <div class="w-16 h-16 rounded-2xl bg-slate-100/80 text-slate-400 flex items-center justify-center mb-5">
                    <i class="fa-solid fa-wand-magic-sparkles text-2xl"></i>
                </div>
                <h2 class="text-xl font-black text-slate-900 mb-2 tracking-tight">Halaman Baru Siap Dibuat</h2>
                <p class="text-xs text-slate-400 max-w-md leading-relaxed mb-8">
                    Gunakan area ini untuk menampilkan konten kustom, list produk, atau informasi pendukung lainnya.
                </p>

                <a href="#"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold px-7 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95">
                    Mulai Integrasikan <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

        </div>
    </div>
</x-layouts.main>