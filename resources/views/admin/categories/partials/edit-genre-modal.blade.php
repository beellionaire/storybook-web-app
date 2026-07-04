<div x-show="editGenreModal" style="display: none;" class="relative z-50">
    <div x-show="editGenreModal" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="editGenreModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" @click.away="editGenreModal = false"
                class="relative w-full max-w-lg bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden text-left p-6 sm:p-8">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Edit Genre</h3>
                        <p class="text-sm text-slate-500 font-medium">Perbarui nama genre cerita.</p>
                    </div>
                    <button @click="editGenreModal = false"
                        class="text-slate-400 hover:text-slate-600 bg-slate-50 hover:bg-slate-100 p-2 rounded-xl transition-all">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <form :action="`{{ url('/admin/genres') }}/${editData?.id}`" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama
                            Genre</label>
                        <input type="text" name="name" :value="editData?.name" required
                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all shadow-sm">
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full justify-center inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm hover:bg-blue-700 active:scale-95 transition-all">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>