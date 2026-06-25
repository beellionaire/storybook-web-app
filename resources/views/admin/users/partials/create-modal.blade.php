<div x-show="createModalOpen" style="display: none;" class="relative z-50" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div x-show="createModalOpen" x-transition.opacity
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

            <div x-show="createModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.away="createModalOpen = false"
                class="relative w-full max-w-lg transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all border border-slate-100">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="bg-white px-6 pb-6 pt-8 sm:px-8 sm:pt-8">
                        <div class="mb-6">
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight" id="modal-title">Tambah
                                Pengguna Baru</h3>
                            <p class="text-sm text-slate-500 mt-1 font-medium">Buat akun secara manual untuk pengguna
                                atau staf.</p>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Nama
                                    Lengkap</label>
                                <input type="text" name="name" required placeholder="Cth: Budi Santoso"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Email
                                    Akses</label>
                                <input type="email" name="email" required placeholder="budi@example.com"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Role
                                    (Hak Akses)</label>
                                <select name="role"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all font-medium appearance-none">
                                    <option value="user">User (Pembaca)</option>
                                    <option value="contributor">Contributor (Penulis)</option>
                                    <option value="admin">Admin (Pengelola)</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Password</label>
                                <input type="password" name="password" required placeholder="Minimal 8 karakter"
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all">
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-slate-50/50 px-6 py-4 flex flex-col sm:flex-row-reverse sm:px-8 border-t border-slate-100 gap-3 sm:gap-2">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-slate-900 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-slate-800 transition-all">
                            Simpan Data
                        </button>
                        <button type="button" @click="createModalOpen = false"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white px-6 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-all">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>