<div x-show="rejectModalOpen" style="display: none;" class="relative z-50">
    <div x-show="rejectModalOpen" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="rejectModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" @click.away="rejectModalOpen = false"
                class="relative w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden text-left">

                <div class="p-6 sm:p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">Tolak Pendaftaran</h3>
                            <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Konfirmasi Penolakan
                            </p>
                        </div>
                    </div>

                    <p class="text-sm text-slate-600 mt-4 leading-relaxed">
                        Apakah Anda yakin ingin menolak pengajuan kontributor dari <span
                            class="font-bold text-slate-900" x-text="selectedSubmission?.name"></span>?
                        Status pendaftarannya akan langsung diubah menjadi ditolak.
                    </p>

                    <div class="flex flex-col sm:flex-row-reverse gap-3 mt-8 pt-6 border-t border-slate-100">
                        <form :action="`{{ url('/admin/submissions') }}/${selectedSubmission?.id}/reject`" method="POST"
                            class="w-full sm:w-auto">
                            @csrf
                            <button type="submit"
                                class="w-full justify-center inline-flex rounded-xl bg-rose-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-rose-700 transition-all active:scale-95">
                                Ya, Tolak
                            </button>
                        </form>
                        <button type="button" @click="rejectModalOpen = false"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white border border-slate-200 px-5 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50 transition-all">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
