<section class="flex flex-col h-full">
    <header class="mb-6">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight flex items-center gap-2">
            <i class="fa-solid fa-lock text-slate-400"></i> {{ __('Keamanan Sandi') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="flex-1 flex flex-col justify-between space-y-6">
        @csrf
        @method('put')

        <div class="space-y-5">
            <div>
                <x-input-label for="update_password_current_password" :value="__('Sandi Saat Ini')"
                    class="text-slate-500 font-bold text-[10px] uppercase tracking-wider mb-1" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="block w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-400 focus:ring-0 shadow-none px-4 py-2.5 text-sm"
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-xs" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('Sandi Baru')"
                    class="text-slate-500 font-bold text-[10px] uppercase tracking-wider mb-1" />
                <x-text-input id="update_password_password" name="password" type="password"
                    class="block w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-400 focus:ring-0 shadow-none px-4 py-2.5 text-sm"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-xs" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Sandi')"
                    class="text-slate-500 font-bold text-[10px] uppercase tracking-wider mb-1" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="block w-full rounded-xl border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-400 focus:ring-0 shadow-none px-4 py-2.5 text-sm"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-xs" />
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <button
                class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold px-6 py-2.5 rounded-xl transition-all text-sm w-full">
                {{ __('Perbarui') }}
            </button>

            @if (session('status') === 'password-updated')
            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                class="text-xs font-bold text-emerald-500 ml-3 shrink-0">
                {{ __('Diperbarui!') }}
            </span>
            @endif
        </div>
    </form>
</section>