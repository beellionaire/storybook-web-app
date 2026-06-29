<x-layouts.main>
    <div class="min-h-screen bg-[#F8FAFC] py-12 md:py-20 font-sans antialiased text-slate-800">
        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-6">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-4">
                    Mulai Perjalanan Menulismu
                </h1>
                <p class="text-slate-500 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                    Bergabunglah menjadi kontributor di KitaBaca. Jangkau ribuan pembaca, bangun komunitasmu, dan
                    bagikan dunia yang ada di kepalamu.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12">

                <div class="md:col-span-5 space-y-8">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm">
                        <h3 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-rocket text-amber-500"></i> Keuntungan Kontributor
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-sm text-slate-600">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5"></i>
                                <span>Akses penuh ke Dasbor Penulis (Manajemen Cerita & Bab).</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-slate-600">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5"></i>
                                <span>Fitur statistik dan analitik pembaca secara *real-time*.</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-slate-600">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5"></i>
                                <span>Kesempatan mendapatkan dukungan/hadiah dari pembaca.</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-slate-600">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5"></i>
                                <span>Bergabung dengan komunitas penulis eksklusif.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="md:col-span-7">
                    <div class="bg-white rounded-[2rem] p-6 sm:p-8 md:p-10 border border-slate-200/60 shadow-sm">
                        <h2 class="text-xl font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">
                            Formulir Pendaftaran
                        </h2>

                        @if(session('success'))
                        <div
                            class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 flex gap-3 text-emerald-700">
                            <i class="fa-solid fa-circle-check mt-0.5"></i>
                            <div>
                                <h4 class="text-sm font-bold">Berhasil Dikirim!</h4>
                                <p class="text-xs mt-1">{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif

                        <form action="{{ route('contributor.apply.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Nama
                                    Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    placeholder="Masukkan nama lengkap Anda"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm">
                                @error('name') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Usia
                                    <span class="text-red-500">*</span></label>
                                <input type="number" name="age" value="{{ old('age') }}" required min="13"
                                    placeholder="Contoh: 18"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm">
                                @error('age') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Alamat
                                    Domisili <span class="text-red-500">*</span></label>
                                <textarea name="address" rows="3" required
                                    placeholder="Masukkan alamat lengkap Anda saat ini..."
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm resize-none">{{
                                    old('address') }}</textarea>
                                @error('address') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Mengapa
                                    kamu ingin menulis di KitaBaca? <span class="text-red-500">*</span></label>
                                <textarea name="reason" rows="4" required
                                    placeholder="Ceritakan sedikit tentang antusiasmemu..."
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all shadow-sm resize-none">{{
                                    old('reason') }}</textarea>
                                @error('reason') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <div class="relative flex items-center mt-0.5">
                                        <input type="checkbox" name="terms" required
                                            class="w-5 h-5 text-amber-500 border-slate-300 rounded focus:ring-amber-500 cursor-pointer">
                                    </div>
                                    <p
                                        class="text-xs text-slate-500 leading-relaxed group-hover:text-slate-700 transition-colors">
                                        Saya setuju dengan <a href="#"
                                            class="text-amber-600 font-bold hover:underline">Syarat & Ketentuan</a>
                                        Kontributor, serta berjanji tidak akan mengunggah karya plagiat atau melanggar
                                        hak cipta.
                                    </p>
                                </label>
                                @error('terms') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-6 border-t border-slate-100">
                                <button type="submit"
                                    class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95 flex items-center justify-center gap-2">
                                    Kirim Pengajuan <i class="fa-solid fa-paper-plane"></i>
                                </button>
                                <p class="text-center text-[10px] text-slate-400 mt-4">
                                    Tim kami akan meninjau pengajuanmu dalam waktu 1x24 jam kerja.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
