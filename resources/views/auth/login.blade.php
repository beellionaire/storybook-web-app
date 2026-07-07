<x-guest-layout>
    <div
        class="fixed inset-0 z-50 flex flex-col lg:flex-row bg-white font-sans text-slate-800 selection:bg-amber-200 selection:text-amber-900">

        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <img src="{{ asset('images/bg-auth.webp') }}" alt="Membaca Novel"
                class="absolute inset-0 w-full h-full object-cover  hover:scale-105 transition-transform duration-[20s] ease-out">

            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>

            <div class="relative z-10 p-12 lg:p-16 flex flex-col justify-between h-full w-full">
                <div>
                    <a href="/">
                        <img src="{{ asset('images/logo-horizontal-2.webp') }}" alt="logo" class="w-40">
                    </a>
                </div>

                <div class="max-w-md">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] font-bold uppercase tracking-widest mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        Platform Literasi Generasi Baru
                    </div>
                    <h2 class="text-4xl font-black text-white leading-tight mb-5 drop-shadow-md">
                        Cerita yang terasa hidup sejak halaman pertama.
                    </h2>
                    <p class="text-slate-300 text-sm leading-relaxed font-medium">
                        Bergabunglah dengan jutaan pembaca dan penulis. Temukan petualangan baru, simpan karya
                        favoritmu, dan dukung penulis kesayanganmu langsung dari sini.
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-20 overflow-y-auto bg-white">
            <div class="w-full max-w-sm">

                <div class="lg:hidden mb-12 text-center flex justify-center">
                    <a href="/">
                        <img src="{{ asset('images/logo-horizontal-2.webp') }}" alt="logo" class="w-40">
                    </a>
                </div>

                <div class="mb-10 text-center lg:text-left">
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Selamat Datang</h1>
                    <p class="text-sm text-slate-500 font-medium">Silakan masuk ke akun Anda untuk melanjutkan.</p>
                </div>

                <x-auth-session-status
                    class="mb-6 rounded-lg bg-emerald-50 p-4 text-sm font-bold text-emerald-600 border border-emerald-200"
                    :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-bold text-slate-700">{{ __('Alamat Email')
                            }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username"
                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm placeholder:text-slate-400"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="text-xs font-bold text-red-500 mt-1" />
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-bold text-slate-700">{{ __('Kata Sandi')
                                }}</label>
                            @if (Route::has('password.request'))
                            <a tabindex="-1" href="{{ route('password.request') }}"
                                class="text-xs font-bold text-amber-600 hover:text-amber-700 transition-colors">
                                {{ __('Lupa sandi?') }}
                            </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all shadow-sm"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')"
                            class="text-xs font-bold text-red-500 mt-1" />
                    </div>

                    <div class="flex items-center pt-2">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900 bg-slate-50 cursor-pointer">
                        <label for="remember_me"
                            class="ml-3 text-sm font-semibold text-slate-600 cursor-pointer select-none">
                            {{ __('Ingat sesi saya') }}
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 rounded-xl text-sm transition-all shadow-lg shadow-slate-900/20 active:scale-[0.98] mt-4">
                        {{ __('Masuk ke Akun') }}
                    </button>

                    <div class="text-center mt-8 pt-6 border-t border-slate-100">
                        <p class="text-sm font-medium text-slate-500">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="font-bold text-amber-600 hover:text-amber-700 transition-colors ml-1">
                                Daftar Gratis
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-guest-layout>