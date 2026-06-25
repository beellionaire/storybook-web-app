<section class="relative overflow-hidden bg-[#fffdf8] py-24 lg:py-9 font-sans">

    <div class="absolute left-4 top-1/2 -translate-y-1/2 lg:left-10 -z-10 hidden md:block">
        <svg width="60" height="100" viewBox="0 0 60 100" fill="none" class="text-blue-400">
            <path d="M50 10 C 20 20, 10 40, 30 50 C 50 60, 50 80, 20 90" stroke="currentColor" stroke-width="4"
                stroke-linecap="round" fill="none" />
            <circle cx="15" cy="5" r="3" fill="#fbbf24" />
        </svg>
    </div>

    <div class="absolute right-4 top-1/3 -translate-y-1/2 lg:right-10 -z-10 hidden md:block">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="text-amber-400">
            <path d="M20 60 Q 40 20, 70 40" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                stroke-dasharray="8 8" fill="none" />
            <path d="M60 10 L 65 25 L 80 30 L 65 35 L 60 50 L 55 35 L 40 30 L 55 25 Z" fill="currentColor" />
        </svg>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-4xl text-center">
            <h2
                class="font-balsamiq text-3xl sm:text-4xl lg:text-5xl font-bold leading-relaxed text-slate-800 drop-shadow-sm">
                Tentang <span class="font-sans">Kita<span class="text-amber-500">Baca.</span></span>
            </h2>
            <p class="mt-6 mx-auto max-w-3xl text-lg lg:text-xl font-medium leading-relaxed text-slate-600 transition-all duration-700 delay-200 ease-out"
                :class="mounted ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">
                Kami membuat kegiatan membaca jadi seru 📘 dan mengasyikkan ✨ untuk anak dengan cerita interaktif, kuis
                🎮 dan hadiah 🏆 yang membangun imajinasi.
            </p>
        </div>

        <div class="mt-48 grid grid-cols-1 gap-16 md:grid-cols-3 md:gap-8 lg:gap-12">

            <div class="relative group mt-8 md:mt-0">
                <div
                    class="absolute -top-32 left-1/2 w-96 -translate-x-1/2 drop-shadow-xl transition-transform duration-500 group-hover:-translate-y-3 z-10">
                    <img src="{{ asset('images/magicbook.png') }}" alt="Roket"
                        class="w-full h-auto animate-[float_4s_ease-in-out_infinite]">
                </div>
                <div
                    class="h-full rounded-3xl bg-[#7b61ff] border-b-8 border-[#5a42d1] px-6 pb-10 pt-20 text-center shadow-lg transition-transform duration-300 group-hover:-translate-y-2">
                    <h3 class="font-balsamiq mb-3 text-2xl font-bold text-white">Cerita Interaktif</h3>
                    <p class="text-md font-medium leading-relaxed text-white/90">
                        Temukan ribuan cerita ajaib yang dilengkapi dengan gambar menarik dan aktivitas yang disukai
                        anak-anak.
                    </p>
                </div>
            </div>

            <div class="relative group mt-12 md:mt-0 lg:-mt-8">
                <div
                    class="absolute -top-32 left-1/2 w-96 -translate-x-1/2 drop-shadow-xl transition-transform duration-500 group-hover:-translate-y-3 z-10">
                    <img src="{{ asset('images/trophy.png') }}" alt="Piala"
                        class="w-full h-auto animate-[float_5s_ease-in-out_infinite]">
                </div>
                <div
                    class="h-full rounded-3xl bg-[#ffb800] border-b-8 border-[#d99c00] px-6 pb-10 pt-20 text-center shadow-lg transition-transform duration-300 group-hover:-translate-y-2">
                    <h3 class="font-balsamiq mb-3 text-2xl font-bold text-white">Kumpulkan Lencana</h3>
                    <p class="text-md font-medium leading-relaxed text-white/90">
                        Selesaikan bacaan harianmu, jawab kuis dengan benar, dan jadilah juara dengan koleksi piala
                        terbanyak!
                    </p>
                </div>
            </div>

            <div class="relative group mt-12 md:mt-0">
                <div
                    class="absolute -top-32 left-1/2 w-96 -translate-x-1/2 drop-shadow-xl transition-transform duration-500 group-hover:-translate-y-3 z-10">
                    <img src="{{ asset('images/giftbox.png') }}" alt="Kado"
                        class="w-full h-auto animate-[float_4.5s_ease-in-out_infinite]">
                </div>
                <div
                    class="h-full rounded-3xl bg-[#f43f5e] border-b-8 border-[#be123c] px-6 pb-10 pt-20 text-center shadow-lg transition-transform duration-300 group-hover:-translate-y-2">
                    <h3 class="font-balsamiq mb-3 text-2xl font-bold text-white">Hadiah Menarik</h3>
                    <p class="text-md font-medium leading-relaxed text-white/90">
                        Tukarkan koin yang kamu kumpulkan dari membaca untuk mendapatkan avatar premium dan stiker lucu.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
