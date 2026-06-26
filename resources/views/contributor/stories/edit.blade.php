<x-app-layout>
    <div class="w-full pb-12 relative">

        <div class="mb-8">
            <div class="flex items-center gap-2 text-sm font-bold text-slate-400 mb-2">
                <a href="{{ route('contributor.stories.index') }}" class="hover:text-orange-500 transition-colors">Karya
                    Saya</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <a href="{{ route('contributor.stories.show', $book->id) }}"
                    class="hover:text-orange-500 transition-colors">Kelola Bab</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-slate-600">Edit Info Buku</span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">Edit: {{ $book->title }}</h1>
        </div>

        <form action="{{ route('contributor.stories.update', $book->id) }}" method="POST" enctype="multipart/form-data"
            x-data="{
                  imageUrl: '{{ $book->cover_image ? asset('storage/' . $book->cover_image) : '' }}',
                  fileChosen(event) {
                      const file = event.target.files[0];
                      if(!file) return;
                      const reader = new FileReader();
                      reader.readAsDataURL(file);
                      reader.onload = e => this.imageUrl = e.target.result;
                  }
              }">
            @csrf
            @method('PUT') <div class="flex flex-col lg:flex-row gap-8">

                <div class="w-full lg:w-1/3 xl:w-1/4">
                    <div class="bg-white rounded-[2rem] p-6 border border-slate-100 shadow-sm sticky top-28">
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Ganti Sampul</p>

                        <div
                            class="aspect-[2/3] w-full rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 overflow-hidden relative group mb-4 transition-all hover:border-orange-400">

                            <template x-if="imageUrl">
                                <img :src="imageUrl" class="w-full h-full object-cover shadow-inner">
                            </template>

                            <template x-if="imageUrl">
                                <div
                                    class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span
                                        class="bg-white/90 backdrop-blur px-4 py-2 rounded-xl text-xs font-bold text-slate-700 shadow-sm pointer-events-none">Ubah
                                        Gambar</span>
                                </div>
                            </template>

                            <input type="file" name="cover_image" accept="image/png, image/jpeg, image/jpg, image/webp"
                                @change="fileChosen"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        </div>
                        <p class="text-[10px] text-slate-400 text-center">Biarkan kosong jika tidak ingin mengubah
                            sampul saat ini.</p>
                        @error('cover_image') <p class="text-red-500 text-xs font-bold text-center mt-1">{{ $message }}
                        </p> @enderror
                    </div>
                </div>

                <div class="w-full lg:w-2/3 xl:w-3/4 space-y-6">
                    <div class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-sm">
                        <h3 class="text-lg font-black text-slate-900 mb-6 border-b border-slate-100 pb-4">Informasi
                            Utama</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Judul
                                    Cerita <span class="text-red-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $book->title) }}" required
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-base font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all">
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Sinopsis
                                    / Deskripsi <span class="text-red-500">*</span></label>
                                <textarea name="description" rows="6" required
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 focus:bg-white transition-all">{{
                                    old('description', $book->description) }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Kategori
                                        Utama</label>
                                    <select name="category_id" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) ==
                                            $category->id ? 'selected' : '' }}>{{ $category->icon }} {{ $category->name
                                            }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Bahasa
                                        Penulisan</label>
                                    <select name="language" required
                                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500">
                                        <option value="indonesia" {{ old('language', $book->language) == 'indonesia' ?
                                            'selected' : '' }}>Indonesia</option>
                                        <option value="inggris" {{ old('language', $book->language) == 'inggris' ?
                                            'selected' : '' }}>Inggris</option>
                                        <option value="daerah" {{ old('language', $book->language) == 'daerah' ?
                                            'selected' : '' }}>Bahasa Daerah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-100 shadow-sm">
                        <div class="mb-6">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-3">Genre
                                Terkait</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                @php $bookGenres = $book->genres->pluck('id')->toArray(); @endphp
                                @foreach($genres as $genre)
                                <label class="relative flex items-center justify-center cursor-pointer group">
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="peer sr-only"
                                        {{ in_array($genre->id, old('genres', $bookGenres)) ? 'checked' : '' }}>
                                    <div
                                        class="w-full text-center px-3 py-2 text-xs font-bold text-slate-500 bg-slate-50 border border-slate-200 rounded-xl peer-checked:bg-orange-50 peer-checked:border-orange-500 peer-checked:text-orange-600 hover:bg-slate-100">
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
                                    Pembaca</label>
                                <select name="target_audience" required
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 text-sm font-bold focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500">
                                    <option value="semua umur" {{ old('target_audience', $book->target_audience) ==
                                        'semua umur' ? 'selected' : '' }}>Semua Umur</option>
                                    <option value="remaja" {{ old('target_audience', $book->target_audience) == 'remaja'
                                        ? 'selected' : '' }}>Remaja (13+)</option>
                                    <option value="dewasa" {{ old('target_audience', $book->target_audience) == 'dewasa'
                                        ? 'selected' : '' }}>Dewasa (18+)</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-2">Konten
                                    Dewasa (18+)</label>
                                <label
                                    class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl bg-slate-50 cursor-pointer hover:bg-slate-100">
                                    <input type="checkbox" name="is_mature" value="1"
                                        class="w-5 h-5 text-orange-500 border-slate-300 rounded" {{ old('is_mature',
                                        $book->is_mature) ? 'checked' : '' }}>
                                    <p class="text-sm font-bold text-slate-800">Ya, mengandung unsur dewasa</p>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-4">
                        <a href="{{ route('contributor.stories.show', $book->id) }}"
                            class="px-6 py-3 rounded-xl text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50">Batal</a>
                        <button type="submit"
                            class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-tr from-amber-500 to-orange-500 shadow-md hover:-translate-y-0.5 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>