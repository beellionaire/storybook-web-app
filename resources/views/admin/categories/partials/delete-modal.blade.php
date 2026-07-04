<!-- MODAL KONFIRMASI HAPUS (GLOBAL ALPINE JS) -->
<div x-show="deleteModal" style="display: none;" class="relative z-50">
    <!-- Backdrop Blur -->
    <div x-show="deleteModal" x-transition.opacity class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal Panel -->
            <div x-show="deleteModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" @click.away="deleteModal = false"
                class="relative w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden text-left p-6 sm:p-8">

                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">Konfirmasi Hapus</h3>
                    </div>
                </div>

                <!-- Pesan dinamis dari Alpine JS -->
                <p class="text-sm text-slate-500 mb-8 font-medium leading-relaxed" x-text="deleteMessage"></p>

                <div class="flex flex-col sm:flex-row-reverse gap-3">
                    <!-- Form penghapusan yang action-nya dinamis mengikuti var deleteUrl -->
                    <form :action="deleteUrl" method="POST" class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full justify-center inline-flex rounded-xl bg-rose-500 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-rose-600 active:scale-95 transition-all">
                            Ya, Hapus
                        </button>
                    </form>
                    <button type="button" @click="deleteModal = false"
                        class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-200 active:scale-95 transition-all">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL HAPUS -->