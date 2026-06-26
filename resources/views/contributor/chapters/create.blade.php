<x-app-layout>
    <div class="w-full pb-12">

        <div
            class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-4 lg:px-8 rounded-2xl shadow-sm border border-slate-100">
            <div>
                <p class="text-[10px] font-black text-orange-500 uppercase tracking-widest mb-0.5">Buku: {{ $book->title
                    }}</p>
                <h1 class="text-xl font-black text-slate-900 tracking-tight">Tulis Bab <span x-text="chapterNum"></span>
                </h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('contributor.stories.show', $book->id) }}"
                    class="text-sm font-bold text-slate-500 hover:text-slate-800 transition-colors px-3 py-2">Batal</a>
            </div>
        </div>

        <form action="{{ route('contributor.chapters.store', $book->id) }}" method="POST" enctype="multipart/form-data"
            id="chapterForm" x-data="{
                chapterNum: {{ old('chapter_number', $nextChapterNumber) }},
                pages: [ { text: '', imagePreview: null } ],
                addPage() {
                    this.pages.push({ text: '', imagePreview: null });
                    setTimeout(() => { window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' }) }, 100);
                },
                removePage(index) {
                    if(this.pages.length > 1) {
                        if(confirm('Hapus halaman ini beserta gambar dan isinya?')) {
                            this.pages.splice(index, 1);
                        }
                    }
                },
                fileChosen(event, index) {
                    const file = event.target.files[0];
                    if(!file) return;
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = e => this.pages[index].imagePreview = e.target.result;
                }
            }">
            @csrf

            <div class="max-w-4xl mx-auto space-y-6">

                <div
                    class="bg-white rounded-[2rem] shadow-[0_8px_40px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden p-6 md:p-10 lg:px-16 flex flex-col md:flex-row gap-6 items-end">

                    <div class="w-full md:w-32 shrink-0">
                        <label
                            class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 text-center md:text-left">Nomor
                            Bab</label>
                        <input type="number" name="chapter_number" x-model="chapterNum" required min="1"
                            class="w-full bg-slate-50 border-0 border-b-2 border-slate-200 focus:border-orange-500 text-3xl font-black text-slate-900 px-0 py-3 focus:ring-0 transition-colors text-center">
                        @error('chapter_number') <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex-1 w-full">
                        <label
                            class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 text-center md:text-left">Judul
                            Bab</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            placeholder="Ketik Judul Bab di sini..."
                            class="w-full bg-transparent border-0 border-b-2 border-slate-100 focus:border-orange-500 text-3xl font-black text-slate-900 placeholder:text-slate-300 px-0 py-3 focus:ring-0 transition-colors text-center md:text-left">
                        @error('title') <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p> @enderror
                    </div>

                </div>

                <template x-for="(page, index) in pages" :key="index">
                    <div
                        class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden relative group">

                        <div
                            class="bg-slate-50 border-b border-slate-100 px-8 py-3 flex items-center justify-between z-20 relative">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Lembar <span
                                    x-text="index + 1"></span></span>

                            <button type="button" @click="removePage(index)" x-show="pages.length > 1"
                                class="text-rose-400 hover:text-rose-600 p-1.5 rounded-lg hover:bg-rose-50 transition-colors opacity-0 group-hover:opacity-100 flex items-center gap-2">
                                <i class="fa-solid fa-trash-can text-sm"></i> <span class="text-xs font-bold">Hapus
                                    Lembar</span>
                            </button>
                        </div>

                        <div class="w-full bg-[#f8fafc] border-b border-slate-100 relative group/img transition-all"
                            :class="page.imagePreview ? 'h-64 sm:h-96' : 'h-32 hover:bg-slate-100'">

                            <template x-if="page.imagePreview">
                                <img :src="page.imagePreview" class="w-full h-full object-cover">
                            </template>

                            <template x-if="!page.imagePreview">
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                    <i
                                        class="fa-regular fa-image text-2xl mb-2 text-slate-300 group-hover/img:text-orange-400 transition-colors"></i>
                                    <span
                                        class="text-xs font-bold text-slate-500 group-hover/img:text-orange-600 transition-colors">Tambahkan
                                        Ilustrasi Halaman <span x-text="index + 1"></span> (Opsional)</span>
                                </div>
                            </template>

                            <template x-if="page.imagePreview">
                                <div
                                    class="absolute inset-0 bg-slate-900/30 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center">
                                    <span
                                        class="bg-white/90 backdrop-blur px-4 py-2 rounded-xl text-xs font-bold text-slate-700 shadow-sm pointer-events-none">Klik
                                        untuk mengganti ilustrasi</span>
                                </div>
                            </template>

                            <input type="file" :name="'pages[' + index + '][image]'" accept="image/*"
                                @change="fileChosen($event, index)"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        </div>

                        <div class="p-6 md:p-12 lg:px-16">
                            <textarea :name="'pages[' + index + '][text]'" x-model="page.text" required
                                :placeholder="'Mulai tulis ceritamu di lembar ' + (index + 1) + '...'" rows="12"
                                class="w-full bg-transparent border-0 text-lg font-serif text-slate-700 placeholder:text-slate-300 px-0 py-2 focus:ring-0 resize-y leading-loose tracking-wide"></textarea>
                        </div>
                    </div>
                </template>
                @error('pages.*.text') <p class="text-red-500 text-xs font-bold text-center mt-2">Semua lembar yang
                    ditambahkan wajib diisi teks.</p> @enderror

                <div class="flex justify-center py-6">
                    <button type="button" @click="addPage()"
                        class="group flex flex-col items-center gap-2 text-slate-400 hover:text-orange-500 transition-colors outline-none focus:outline-none">
                        <div
                            class="w-14 h-14 rounded-full border-2 border-dashed border-slate-300 group-hover:border-orange-500 flex items-center justify-center bg-slate-50 group-hover:bg-orange-50 transition-colors shadow-sm">
                            <i class="fa-solid fa-plus text-xl"></i>
                        </div>
                        <span
                            class="text-xs font-bold uppercase tracking-widest bg-white px-3 py-1 rounded-full border border-slate-100 shadow-sm">Tambah
                            Halaman Baru</span>
                    </button>
                </div>

                <div
                    class="px-6 md:px-12 lg:px-16 py-6 bg-white rounded-t-[2rem] border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4 sticky bottom-0 z-20 shadow-[0_-10px_40px_rgb(0,0,0,0.03)]">
                    <p class="text-xs font-bold text-slate-400 hidden lg:block"><i
                            class="fa-solid fa-layer-group mr-1"></i> Total <span x-text="pages.length"></span> Lembar
                    </p>

                    <div class="flex flex-wrap justify-center md:justify-end gap-3 w-full lg:w-auto">
                        <button type="submit" name="action" value="draft"
                            class="flex-1 md:flex-none bg-white border border-slate-200 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-50 transition-colors shadow-sm">
                            Simpan Draft
                        </button>

                        <button type="submit" name="action" value="publish"
                            class="flex-1 md:flex-none bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-800 transition-colors shadow-sm">
                            Publikasikan
                        </button>

                        <button type="submit" name="action" value="publish_and_next"
                            class="w-full md:w-auto bg-gradient-to-tr from-amber-500 to-orange-500 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:-translate-y-0.5 transition-all shadow-[0_8px_20px_rgb(249,115,22,0.3)] flex items-center justify-center gap-2">
                            Terbitkan & Lanjut Bab <span x-text="Number(chapterNum) + 1"></span> <i
                                class="fa-solid fa-forward-step ml-1"></i>
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </div>
</x-app-layout>