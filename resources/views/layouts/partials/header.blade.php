<header
    class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100/50 flex items-center justify-between px-4 sm:px-8 z-20 shrink-0 sticky top-0 transition-all">

    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true"
            class="lg:hidden p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition-colors">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

    </div>

    <div class="flex items-center gap-4">

        <button
            class="relative p-2.5 rounded-full text-slate-400 hover:text-amber-500 hover:bg-amber-50 transition-colors focus:outline-none hidden sm:block">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute top-2 right-2.5 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
        </button>

        <div class="w-px h-8 bg-slate-200 hidden sm:block"></div>

        <div class="relative">
            <button @click="profileDropdownOpen = !profileDropdownOpen" @click.away="profileDropdownOpen = false"
                class="flex items-center gap-3 p-1 pr-3 rounded-full hover:bg-slate-50 transition-colors focus:outline-none border border-transparent hover:border-slate-200">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-400 to-orange-400 p-0.5 shadow-sm">
                    <div
                        class="w-full h-full rounded-full bg-white flex items-center justify-center text-amber-600 font-bold text-lg">
                        {{ substr(Auth::user()->name ?? 'G', 0, 1) }}
                    </div>
                </div>
                <div class="text-left hidden sm:block">
                    <p class="text-sm font-bold text-slate-800 leading-tight">{{ Auth::user()->name ?? 'Guest' }}</p>
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">{{ Auth::user()->role
                        ?? '' }}</p>
                </div>
                <svg class="w-4 h-4 text-slate-400 hidden sm:block" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="profileDropdownOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                style="display: none;"
                class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-slate-100 py-2 z-50 overflow-hidden">

                <div class="px-4 py-3 border-b border-slate-100 sm:hidden">
                    <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name ?? 'Guest' }}</p>
                    <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">{{ Auth::user()->role
                        ?? '' }}</p>
                </div>

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Pengaturan Profil
                </a>

                <div class="border-t border-slate-100 my-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-rose-600 hover:bg-rose-50 transition-colors">
                        <svg class="w-4 h-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
