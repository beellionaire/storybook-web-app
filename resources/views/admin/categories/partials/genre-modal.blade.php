<div x-show="genreModal" style="display: none;" class="relative z-50">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" @click="genreModal = false"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto flex items-center justify-center p-4">
        <form action="{{ route('admin.genres.store') }}" method="POST"
            class="relative w-full max-w-sm bg-white rounded-[2rem] shadow-2xl p-8 border border-slate-100 text-left">
            @csrf
            <h3 class="text-2xl font-black text-slate-900 mb-6">Tambah Genre</h3>
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1.5">Nama Genre</label>
                <input type="text" name="name" required placeholder="Cth: Fantasy"
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all">
            </div>
            <div class="mt-8 flex gap-3">
                <button type="submit"
                    class="flex-1 bg-amber-500 text-white py-2.5 rounded-xl font-bold text-sm hover:bg-amber-600 transition-colors">Simpan</button>
                <button type="button" @click="genreModal = false"
                    class="flex-1 bg-white border border-slate-200 text-slate-700 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-50 transition-colors">Batal</button>
            </div>
        </form>
    </div>
</div>