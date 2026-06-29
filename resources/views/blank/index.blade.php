<x-app-layout>
    <div x-data="{
            isLoading: true,
            init() {
                // Simulasi loading halaman premium
                setTimeout(() => this.isLoading = false, 500);
            }
        }" class="w-full pb-8">

        <div x-show="isLoading" style="display: none;" class="flex items-center justify-center min-h-[400px]">
            <div class="w-8 h-8 border-4 border-amber-500/20 border-t-amber-500 rounded-full animate-spin"></div>
        </div>

        <div x-show="!isLoading" style="display: none;" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

            <div
                class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Halaman Kosong</h1>
                    <p class="text-slate-500 font-medium"> Mulai kreasikan modul atau fitur baru Anda di sini.</p>
                </div>

                <button
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold px-6 py-3 rounded-xl text-sm transition-all shadow-md active:scale-95">
                    <i class="fa-solid fa-plus"></i> Tambah Baru
                </button>
            </div>

            <div
                class="bg-white rounded-[2rem] p-12 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.03)] flex flex-col items-center justify-center min-h-[450px] text-center relative overflow-hidden">
                <div
                    class="w-20 h-20 rounded-2xl bg-slate-50 text-slate-300 border border-dashed border-slate-200 flex items-center justify-center mb-6">
                    <i class="fa-regular fa-folder-open text-3xl"></i>
                </div>
                <h3 class="text-lg font-black text-slate-800 mb-2">Belum ada konten</h3>
                <p class="text-sm text-slate-400 max-w-sm leading-relaxed mb-6">Silakan tambahkan komponen, tabel, atau
                    formulir untuk membangun halaman ini.</p>

                <div
                    class="absolute inset-0 pointer-events-none rounded-[2rem] bg-gradient-to-tr from-amber-50/20 via-transparent to-transparent">
                </div>
            </div>

        </div>
    </div>
</x-app-layout>