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
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-1">Detail Berkas Penulis</h3>
                    <p class="text-sm text-slate-500 font-medium mb-6">Tinjau informasi lengkap sebelum melakukan
                        verifikasi.</p>

                    <div class="space-y-4 border-t border-b border-slate-100 py-4 my-4 text-sm">

                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Nama Lengkap
                            </p>
                            <p class="font-bold text-slate-800" x-text="selectedSubmission?.name"></p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Email
                                    Akun</p>
                                <p class="font-medium text-slate-600" x-text="selectedSubmission?.email"></p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Usia</p>
                                <p class="font-medium text-slate-600"><span x-text="selectedSubmission?.age"></span>
                                    Tahun</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Alamat
                                Domisili</p>
                            <p class="font-medium text-slate-600 leading-relaxed whitespace-pre-line"
                                x-text="selectedSubmission?.address"></p>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Alasan Ingin
                                Menulis</p>
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 mt-1">
                                <p class="font-medium text-slate-600 leading-relaxed whitespace-pre-line text-xs"
                                    x-text="selectedSubmission?.reason"></p>
                            </div>
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