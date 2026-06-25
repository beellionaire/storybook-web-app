<div x-show="rejectModalOpen" style="display: none;" class="relative z-50">
    <div x-show="rejectModalOpen" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm">
    </div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="rejectModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" @click.away="rejectModalOpen = false"
                class="relative w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden text-left">

                <form :action="`{{ url('/admin/submissions') }}/${selectedSubmission?.id}/reject`" method="POST">
                    @csrf
                    <div class="p-6 sm:p-8">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight mb-1">Tolak Pendaftaran</h3>
                        <p class="text-sm text-slate-500 font-medium mb-4">Berikan alasan penolakan kepada
                            <strong class="text-slate-800" x-text="selectedSubmission?.name"></strong>.
                        </p>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Catatan
                                / Alasan Penolakan</label>
                            <textarea name="admin_notes" rows="4" required
                                placeholder="Cth: Portofolio Anda belum sesuai dengan standar bacaan ramah anak atau link tidak dapat diakses."
                                class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 focus:bg-white transition-all resize-none"></textarea>
                        </div>
                    </div>

                    <div
                        class="bg-slate-50/50 px-6 py-4 flex flex-col sm:flex-row-reverse sm:px-8 border-t border-slate-100 gap-3 sm:gap-2">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-red-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-700 transition-all">
                            Kirim & Tolak
                        </button>
                        <button type="button" @click="rejectModalOpen = false"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-all">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>