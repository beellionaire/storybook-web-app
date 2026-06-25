<section class="pt-20 pb-0 bg-[#fffdf8] font-sans relative overflow-hidden text-center">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="absolute top-1/2 left-4 md:left-10 text-amber-300 animate-pulse hidden sm:block">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z" />
            </svg>
        </div>
        <div
            class="absolute top-1/3 right-4 md:right-10 text-blue-300 animate-[pulse_3s_ease-in-out_infinite] hidden sm:block">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z" />
            </svg>
        </div>

        <h2 class="font-balsamiq text-2xl sm:text-3xl md:text-4xl font-bold text-slate-800 mb-4 leading-tight">
            Dipercaya oleh ribuan penulis <br class="hidden sm:block" /> & pembaca cilik
        </h2>

        <div class="flex justify-center gap-1.5 mb-16">
            @for ($i = 0; $i < 5; $i++) <svg
                class="w-8 h-8 sm:w-10 sm:h-10 text-amber-400 drop-shadow-sm hover:scale-110 transition-transform cursor-pointer"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                @endfor
        </div>

    </div>

    <div class="w-full max-w-1500px mx-auto px-4 mt-8 flex justify-center items-end">
        <img src="{{ asset('images/landscapebook.png') }}" alt="Ilustrasi Dunia Membaca"
            class="w-full h-auto object-contain max-h-[300px]">
    </div>

</section>
