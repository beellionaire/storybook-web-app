<x-app-layout>
    <div class="w-full">

        <!-- Breadcrumb & Header -->
        <div class="mb-3">
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Upload Naskah Cerita</h1>
            <p class="text-slate-500 font-medium">Upload sampul dan naskah cerita Anda dengan mudah</p>
        </div>

        @if(session('success'))
        <div
            class="mb-8 bg-emerald-50 border border-emerald-200 p-4 rounded-2xl flex items-start gap-4 shadow-sm animate-fade-in-down">
            <div
                class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center shrink-0">
                <i class="fa-solid fa-circle-check text-xl"></i>
            </div>
            <div class="mt-2.5">
                <h3 class="text-sm font-black text-emerald-800 tracking-tight">Berhasil!</h3>
                <p class="text-xs font-medium text-emerald-600 mt-1">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if($errors->any())
        <div
            class="mb-8 bg-rose-50 border border-rose-200 p-4 rounded-2xl flex items-start gap-4 shadow-sm animate-fade-in-down">
            <div class="w-10 h-10 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center shrink-0">
                <i class="fa-solid fa-triangle-exclamation text-xl"></i>
            </div>
            <div class="mt-1">
                <h3 class="text-sm font-black text-rose-800 tracking-tight mb-1">Gagal Mengunggah Naskah!</h3>
                <ul class="list-disc list-inside text-xs font-medium text-rose-600 space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="{{ route('contributor.stories.storeUpload') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-6 lg:gap-8">
            @csrf

            <!-- BUNGKUSAN GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

                <!-- ==========================================
                     KOLOM KIRI: SAMPUL & NASKAH PDF
                     ========================================== -->
                <div class="lg:col-span-4 flex flex-col gap-6 lg:gap-8">

                    <!-- Card Upload Sampul Buku (PREVIEW GAMBAR LIVE) -->
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm shrink-0">
                        <h3
                            class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-image text-amber-500 text-sm"></i> Sampul Buku <span
                                class="text-rose-500">*</span>
                        </h3>

                        <!-- PERBAIKAN: Menggunakan style="height: 320px;" agar tinggi kotak terkunci tanpa perlu npm run build -->
                        <div id="coverPreview" style="height: 320px;"
                            class="relative border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 hover:bg-slate-100 hover:border-amber-300 transition-all flex flex-col items-center justify-center text-center group cursor-pointer overflow-hidden bg-cover bg-center">

                            <!-- Input File Image -->
                            <input type="file" name="cover_image" id="cover_image"
                                accept="image/png, image/jpeg, image/jpg" required
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('coverPreview').style.backgroundImage = 'url(' + e.target.result + ')';
                        document.getElementById('coverPlaceholder').style.display = 'none';
                        document.getElementById('coverOverlay').classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            ">

                            <!-- Placeholder Content (Ikon & Teks) -->
                            <div id="coverPlaceholder"
                                class="flex flex-col items-center justify-center p-6 pointer-events-none z-10 w-full h-full">
                                <div
                                    class="w-16 h-16 bg-white shadow-sm border border-slate-100 rounded-full flex items-center justify-center mb-4 group-hover:-translate-y-1 transition-transform">
                                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-amber-500"></i>
                                </div>
                                <span class="text-sm font-bold text-slate-700 mb-2 px-2 w-full leading-tight">Pilih
                                    Sampul</span>
                                <span
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-wider bg-white px-3 py-1 rounded-full shadow-sm border border-slate-100">JPEG,
                                    PNG, JPG</span>
                            </div>

                            <!-- Overlay Gelap (Muncul saat di-hover setelah ada gambar) -->
                            <div id="coverOverlay"
                                class="hidden absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none z-10">
                                <div
                                    class="bg-white/90 backdrop-blur-sm text-slate-800 text-xs font-bold px-4 py-2 rounded-full flex items-center gap-2">
                                    <i class="fa-solid fa-camera"></i> Ganti Sampul
                                </div>
                            </div>
                        </div>
                        @error('cover_image') <p class="text-rose-500 text-xs font-semibold mt-3 text-center">{{
                            $message }}</p> @enderror
                    </div>

                    <!-- Card Upload Dokumen PDF Pendukung & Ketentuan -->
                    <div
                        class="bg-slate-50/50 border border-slate-200 rounded-[2rem] p-6 lg:p-8 shadow-sm flex-1 flex flex-col">

                        <!-- Area Upload PDF -->
                        <div class="mb-8">
                            <h3
                                class="text-[11px] font-black text-slate-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-rose-500 text-sm"></i> Naskah Cerita (PDF) <span
                                    class="text-rose-500">*</span>
                            </h3>

                            <div
                                class="relative border-2 border-dashed border-slate-300 rounded-2xl bg-white hover:bg-rose-50/30 hover:border-rose-300 transition-all p-6 flex flex-col items-center justify-center text-center group cursor-pointer overflow-hidden">
                                <!-- Input File Transparan KHUSUS PDF -->
                                <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="
                                        document.getElementById('pdfName').textContent = this.files[0]?.name || 'Pilih File PDF';
                                        document.getElementById('pdfIcon').className = 'fa-solid fa-file-circle-check text-3xl text-emerald-500 mb-3';
                                    ">

                                <div
                                    class="w-12 h-12 bg-rose-50 shadow-sm border border-rose-100 rounded-full flex items-center justify-center mb-3 group-hover:-translate-y-1 transition-transform">
                                    <i id="pdfIcon" class="fa-solid fa-file-pdf text-2xl text-rose-500"></i>
                                </div>
                                <span id="pdfName"
                                    class="text-sm font-bold text-slate-700 mb-1 px-2 line-clamp-2 w-full leading-tight">
                                    Pilih Naskah PDF
                                </span>
                                <span
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-wider bg-slate-100 px-3 py-1 rounded-full shadow-sm border border-slate-200 mt-2">
                                    Hanya .PDF
                                </span>
                            </div>
                            @error('pdf_file') <p class="text-rose-500 text-xs font-semibold mt-3 text-center">{{
                                $message }}</p> @enderror
                        </div>

                        <!-- Area Ketentuan -->
                        <div class="pt-6 border-t border-slate-200 mt-auto">
                            <h4 class="text-sm font-black text-slate-700 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-list-check text-amber-500"></i> Ketentuan Teks
                            </h4>
                            <ul class="space-y-3 text-xs text-slate-600 font-medium">
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-emerald-500 mt-0.5 text-sm"></i>
                                    <span>Font <strong class="text-slate-800">Times New Roman 12pt</strong>.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-emerald-500 mt-0.5 text-sm"></i>
                                    <span>Jarak baris <strong class="text-slate-800">1.5 Lines</strong>.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-emerald-500 mt-0.5 text-sm"></i>
                                    <span>Kertas A4, Margin Normal (2.54cm).</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-check text-emerald-500 mt-0.5 text-sm"></i>
                                    <span>Seluruh bab digabung dalam 1 file.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                     KOLOM KANAN: FORMULIR INPUT
                     ========================================== -->
                <div class="lg:col-span-8 flex flex-col gap-6 lg:gap-8">

                    <!-- Card Informasi Utama -->
                    <div class="bg-white p-6 lg:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                        <h2 class="text-lg font-black text-slate-800 mb-6 pb-4 border-b border-slate-50">Informasi Utama
                        </h2>

                        <div class="space-y-6">
                            <!-- Judul Cerita -->
                            <div>
                                <label for="title"
                                    class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Judul
                                    Cerita <span class="text-rose-500">*</span></label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                    placeholder="Masukkan judul cerita..."
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 placeholder:text-slate-400 placeholder:font-medium focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm">
                                @error('title') <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sinopsis / Deskripsi -->
                            <div>
                                <label for="description"
                                    class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Sinopsis
                                    / Deskripsi <span class="text-rose-500">*</span></label>
                                <textarea name="description" id="description" rows="4" required
                                    placeholder="Ceritakan secara singkat tentang apa buku ini..."
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 placeholder:text-slate-400 placeholder:font-medium focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm resize-none">{{
                                    old('description') }}</textarea>
                                @error('description') <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message }}
                                </p> @enderror
                            </div>

                            <!-- Kategori & Bahasa -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="category_id"
                                        class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Kategori
                                        Utama <span class="text-rose-500">*</span></label>
                                    <select name="category_id" id="category_id" required
                                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm cursor-pointer">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id')==$cat->id ? 'selected' : ''
                                            }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-rose-500 text-xs font-semibold mt-1">{{
                                        $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="language"
                                        class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Bahasa
                                        Penulisan <span class="text-rose-500">*</span></label>
                                    <select name="language" id="language" required
                                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm cursor-pointer">
                                        <option value="Indonesia" {{ old('language')=='Indonesia' ? 'selected' : '' }}>
                                            Indonesia</option>
                                        <option value="Inggris" {{ old('language')=='Inggris' ? 'selected' : '' }}>
                                            Inggris</option>
                                    </select>
                                    @error('language') <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message
                                        }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Tagar & Klasifikasi -->
                    <div class="bg-white p-6 lg:p-8 rounded-[2rem] border border-slate-100 shadow-sm flex-1">
                        <h2 class="text-lg font-black text-slate-800 mb-6 pb-4 border-b border-slate-50">Tagar &
                            Klasifikasi</h2>

                        <div class="space-y-6">
                            <!-- Genre Terkait (Tagar) -->
                            <div>
                                <label for="tags"
                                    class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Genre
                                    Terkait / Tagar</label>
                                <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                                    placeholder="Contoh: fantasy, romance, magic (pisahkan dengan koma)"
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 placeholder:text-slate-400 placeholder:font-medium focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm">
                                @error('tags') <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Target Pembaca & Alert -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                                <!-- Target Pembaca -->
                                <div>
                                    <label
                                        class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-2">Target
                                        Pembaca <span class="text-rose-500">*</span></label>
                                    <select name="is_mature" id="is_mature" required
                                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm cursor-pointer">
                                        <option value="0" {{ old('is_mature', '0' )=='0' ? 'selected' : '' }}>Semua Umur
                                            (SU)</option>
                                        <option value="1" {{ old('is_mature')=='1' ? 'selected' : '' }}>Dewasa (18+)
                                        </option>
                                    </select>
                                    @error('is_mature') <p class="text-rose-500 text-xs font-semibold mt-1">{{ $message
                                        }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ==========================================
                 AKSI TOMBOL
                 ========================================== -->
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('contributor.stories.index') }}"
                    class="w-full sm:w-auto text-center px-8 py-3.5 rounded-xl text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-colors shadow-sm">
                    Batal
                </a>
                <button type="submit"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-10 py-3.5 rounded-xl text-sm font-bold text-white bg-amber-500 hover:bg-amber-600 shadow-md shadow-amber-500/20 transition-all hover:-translate-y-0.5">
                    Unggah Naskah <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

        </form>
    </div>
</x-app-layout>