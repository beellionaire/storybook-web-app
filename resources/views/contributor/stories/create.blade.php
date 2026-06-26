<x-app-layout>
    <div class="w-full pb-8 relative">

        <div class="mb-0">
            <div class="flex items-center gap-2 text-sm font-bold text-slate-400 mb-2">
                <a href="{{ route('contributor.stories.index') }}" class="hover:text-orange-500 transition-colors">Karya
                    Saya</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-slate-600">Tulis Cerita Baru</span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">Detail Cerita Baru</h1>
        </div>

        <form action="{{ route('contributor.stories.store') }}" method="POST" enctype="multipart/form-data" x-data="{
                  imageUrl: null,
                  fileChosen(event) {
                      const file = event.target.files[0];
                      if(!file) return;
                      const reader = new FileReader();
                      reader.readAsDataURL(file);
                      reader.onload = e => this.imageUrl = e.target.result;
                  }
              }">
            @csrf

            <div class="flex flex-col lg:flex-row gap-8">

                <div class="w-full lg:w-1/3 xl:w-1/4">
                    <div
                        class="bg-white rounded-[2rem] p-6 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] sticky top-28">
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Sampul Buku</p>

                        <div
                            class="aspect-[2/3] w-full rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 overflow-hidden relative group mb-4 transition-all hover:border-orange-400 hover:bg-orange-50/50">

                            <template x-if="imageUrl">
                                <img :src="imageUrl" class="w-full h-full object-cover shadow-inner">
                            </template>
                            <template x-if="!imageUrl">
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center text-slate-400 p-4 text-center">
                                    <i
                                        class="fa-solid fa-cloud-arrow-up text-4xl mb-3 text-slate-300 group-hover:text-orange-400 transition-colors"></i>
                                    <span class="text-sm font-bold text-slate-600 group-hover:text-orange-600">Pilih
                                        Sampul</span>
                                    <span class="text-[10px] mt-1 text-slate-400">JPEG, PNG, JPG (Maks 2MB)</span>
                                    <span class="text-[10px] mt-1 text-slate-400">Rasio ideal 2:3</span>
                                </div>
                            </template>

                            <input type="file" name="cover_image" accept="image/png, image/jpeg, image/jpg, image/webp"
                                @change="fileChosen"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        </div>
                        @error('cover_image')
                        <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full lg:w-2/3 xl:w-3/4 space-y-6">
                    <div
                        class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                        <h3 class="text-lg font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Informasi
                            Utama</h3>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Judul
                                    Cerita <span class="text-red-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" required
                                    placeholder="Masukkan judul yang menarik..."
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-base font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all shadow-sm">
                                @error('title') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Sinopsis
                                    / Deskripsi <span class="text-red-500">*</span></label>
                                <textarea name="description" rows="6" required
                                    placeholder="Ceritakan secara singkat tentang apa buku ini..."
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all shadow-sm resize-y">{{
                                    old('description') }}</textarea>
                                @error('description') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Kategori
                                        Utama <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="category_id" required
                                            class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl pl-4 pr-10 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all shadow-sm appearance-none cursor-pointer">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?
                                                'selected' : '' }}>{{ $category->icon }} {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                            <i class="fa-solid fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                    @error('category_id') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}
                                    </p> @enderror
                                </div>

                                <div>
                                    <label
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Bahasa
                                        Penulisan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select name="language" required
                                            class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl pl-4 pr-10 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all shadow-sm appearance-none cursor-pointer">
                                            <option value="indonesia" {{ old('language')=='indonesia' ? 'selected' : ''
                                                }}>Indonesia</option>
                                            <option value="inggris" {{ old('language')=='inggris' ? 'selected' : '' }}>
                                                Inggris</option>
                                            <option value="daerah" {{ old('language')=='daerah' ? 'selected' : '' }}>
                                                Bahasa Daerah</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                            <i class="fa-solid fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                    @error('language') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                        <h3 class="text-lg font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Tagar &
                            Klasifikasi</h3>

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Genre
                                Terkait (Bisa pilih lebih dari satu)</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                @foreach($genres as $genre)
                                <label class="relative flex items-center justify-center cursor-pointer group">
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="peer sr-only"
                                        {{ (is_array(old('genres')) && in_array($genre->id, old('genres'))) ? 'checked'
                                    : '' }}>
                                    <div
                                        class="w-full text-center px-3 py-2 text-xs font-bold text-slate-500 bg-slate-50 border border-slate-200 rounded-xl peer-checked:bg-orange-50 peer-checked:border-orange-500 peer-checked:text-orange-600 transition-all hover:bg-slate-100 peer-focus:ring-2 peer-focus:ring-orange-500/20">
                                        {{ $genre->name }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Target
                                    Pembaca <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="target_audience" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl pl-4 pr-10 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all shadow-sm appearance-none cursor-pointer">
                                        <option value="semua umur" {{ old('target_audience')=='semua umur' ? 'selected'
                                            : '' }}>Semua Umur</option>
                                        <option value="remaja" {{ old('target_audience')=='remaja' ? 'selected' : '' }}>
                                            Remaja (13+)</option>
                                        <option value="dewasa" {{ old('target_audience')=='dewasa' ? 'selected' : '' }}>
                                            Dewasa (18+)</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Peringatan
                                    Konten</label>
                                <label
                                    class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl bg-slate-50 cursor-pointer hover:bg-slate-100 transition-colors">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" name="is_mature" value="1"
                                            class="w-5 h-5 text-orange-500 border-slate-300 rounded focus:ring-orange-500"
                                            {{ old('is_mature') ? 'checked' : '' }}>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-slate-800">Cerita ini mengandung unsur dewasa
                                            (18+)</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-4">
                        <a href="{{ route('contributor.stories.index') }}"
                            class="px-6 py-3 rounded-xl text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition-colors shadow-sm">Batal</a>

                        <button type="submit"
                            class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-tr from-amber-500 to-orange-500 shadow-[0_8px_20px_rgb(249,115,22,0.3)] hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            Lanjut Tulis Bab Pertama <i class="fa-solid fa-arrow-right ml-1"></i>
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </div>
</x-app-layout>
