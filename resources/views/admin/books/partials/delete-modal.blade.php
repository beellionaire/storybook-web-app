<div x-show="deleteModalOpen" style="display: none;" class="relative z-50">
    <div x-show="deleteModalOpen" x-transition.opacity
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="deleteModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.away="deleteModalOpen = false"
                class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-slate-100">

                <form x-bind:action="`{{ url('/admin/books') }}/${selectedBook?.id}`" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="bg-white px-6 pb-6 pt-8 sm:px-8 sm:pt-8">
                        <div
                            class="sm:flex sm:items-start flex-col sm:flex-row items-center sm:items-start text-center sm:text-left">
                            <div
                                class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-12 sm:w-12 mb-4 sm:mb-0">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="sm:ml-4">
                                <h3 class="text-xl font-black text-slate-900 tracking-tight" id="modal-title">
                                    Hapus Karya</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-slate-500 font-medium leading-relaxed">
                                        Apakah Anda yakin ingin menghapus buku <strong class="text-slate-800"
                                            x-text="selectedBook?.title"></strong> secara permanen? Semua bab,
                                        gambar, dan statistik pembaca akan terhapus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-slate-50/50 px-6 py-4 flex flex-col sm:flex-row-reverse sm:px-8 border-t border-slate-100 gap-3 sm:gap-2">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-red-600 px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-700 transition-all">
                            Hapus Permanen
                        </button>
                        <button type="button" @click="deleteModalOpen = false"
                            class="w-full sm:w-auto inline-flex justify-center rounded-xl bg-white px-6 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-200 hover:bg-slate-50 transition-all">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>