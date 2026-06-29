<section>
    <header class="mb-8 flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600">
            <i class="fa-regular fa-user text-xl"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                {{ __('Informasi Profil') }}
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                {{ __("Perbarui nama dan alamat email akun Anda.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')"
                    class="text-slate-700 font-bold text-xs uppercase tracking-wider mb-2" />
                <x-text-input id="name" name="name" type="text"
                    class="block w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 shadow-sm transition-all duration-300 px-4 py-3"
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Alamat Email')"
                    class="text-slate-700 font-bold text-xs uppercase tracking-wider mb-2" />
                <x-text-input id="email" name="email" type="email"
                    class="block w-full rounded-2xl border-slate-200 bg-slate-50/50 focus:bg-white focus:border-amber-500 focus:ring-amber-500 shadow-sm transition-all duration-300 px-4 py-3"
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="mt-4 p-4 bg-amber-50/80 rounded-2xl border border-amber-200/60 flex items-center justify-between">
            <p class="text-sm text-amber-800">
                {{ __('Email Anda belum diverifikasi.') }}
            </p>
            <button form="send-verification"
                class="text-sm font-bold text-amber-600 hover:text-amber-800 transition-colors">
                {{ __('Kirim Ulang Verifikasi') }}
            </button>
            @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600 absolute">
                {{ __('Link baru telah dikirim.') }}
            </p>
            @endif
        </div>
        @endif

        <div class="flex items-center gap-4 pt-6 mt-6 border-t border-slate-100">
            <button
                class="bg-slate-900 hover:bg-slate-800 text-white font-semibold px-8 py-3 rounded-xl transition-all shadow-[0_4px_14px_0_rgba(15,23,42,0.39)] hover:shadow-[0_6px_20px_rgba(15,23,42,0.23)] hover:-translate-y-0.5 active:scale-95">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition.duration.500ms
                x-init="setTimeout(() => show = false, 3000)"
                class="text-sm font-bold text-emerald-600 flex items-center gap-2">
                <i class="fa-solid fa-check-circle"></i> {{ __('Berhasil Disimpan.') }}
            </p>
            @endif
        </div>
    </form>
</section>