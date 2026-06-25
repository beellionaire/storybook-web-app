<div x-show="detailModalOpen" style="display: none;" class="relative z-50">
    <div x-show="detailModalOpen" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm">
    </div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="detailModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" @click.away="detailModalOpen = false"
                class="relative w-full max-w-lg bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden text-left">

                <div class="p-6 sm:p-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-1">Detail Berkas Penulis
                    </h3>
                    <p class="text-sm text-slate-500 font-medium mb-6">Tinjau informasi lengkap sebelum
                        melakukan verifikasi.</p>

                    <div class="space-y-4 border-t border-b border-slate-100 py-4 my-4 text-sm">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Nama
                                Sesuai KTP</p>
                            <p class="font-bold text-slate-800" x-text="selectedSubmission?.name"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">
                                Email Akun</p>
                            <p class="font-medium text-slate-600" x-text="selectedSubmission?.email"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">
                                Nomor Telepon / WA</p>
                            <p class="font-medium text-slate-600" x-text="selectedSubmission?.phone"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">
                                Alamat Tempat Tinggal</p>
                            <p class="font-medium text-slate-600 leading-relaxed" x-text="selectedSubmission?.address">
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Link
                                Portofolio / Karya</p>
                            <a :href="selectedSubmission?.portfolio" target="_blank"
                                class="inline-flex items-center gap-1.5 text-blue-600 font-bold hover:underline">
                                <span x-text="selectedSubmission?.portfolio"></span>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <template x-if="selectedSubmission?.status === 'pending'">
                        <div class="flex flex-col sm:flex-row-reverse gap-3 mt-6">
                            <form :action="`{{ url('/admin/submissions') }}/${selectedSubmission?.id}/approve`"
                                method="POST" class="w-full sm:w-auto">
                                @csrf
                                <button type="submit"
                                    class="w-full justify-center inline-flex rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-slate-800 transition-all">
                                    Setujui Pendaftaran
                                </button>
                            </form>
                            <button type="button" @click="detailModalOpen = false; openReject(selectedSubmission)"
                                class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-rose-50 border border-rose-200 px-5 py-2.5 text-sm font-bold text-rose-600 hover:bg-rose-100 transition-all">
                                Tolak
                            </button>
                        </div>
                    </template>

                    <template x-if="selectedSubmission?.status !== 'pending'">
                        <div class="mt-6 text-right">
                            <button type="button" @click="detailModalOpen = false"
                                class="inline-flex justify-center rounded-xl bg-white border border-slate-200 px-5 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50 transition-all">
                                Tutup
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>