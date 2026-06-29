<section class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-lg font-bold text-red-600 tracking-tight flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i> {{ __('Hapus Akun Permanen') }}
            </h2>
            <p class="mt-2 text-sm text-slate-500 max-w-xl leading-relaxed">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Pastikan Anda
                telah mengunduh data yang ingin disimpan.') }}
            </p>
        </div>

        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="shrink-0 bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 font-bold px-6 py-3 rounded-xl transition-all text-sm">
            {{ __('Hapus Akun') }}
        </button>
    </header>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
            class="p-8 bg-white rounded-3xl relative overflow-hidden">
            <div
                class="absolute -top-24 -right-24 w-48 h-48 bg-red-50 rounded-full blur-3xl opacity-50 pointer-events-none">
            </div>

            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-900 tracking-tight mb-2">
                {{ __('Apakah Anda yakin?') }}
            </h2>

            <p class="text-sm text-slate-500 leading-relaxed mb-6">
                {{ __('Tindakan ini tidak dapat dibatalkan. Masukkan kata sandi Anda untuk mengonfirmasi penghapusan
                permanen akun ini.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Sandi') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="block w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white focus:border-red-400 focus:ring-red-400 shadow-sm px-4 py-3"
                    placeholder="{{ __('Masukkan kata sandi Anda...') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')"
                    class="px-6 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition-colors text-sm">
                    {{ __('Batal') }}
                </button>
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-3 rounded-xl shadow-md hover:shadow-lg transition-all text-sm active:scale-95">
                    {{ __('Ya, Hapus Permanen') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>