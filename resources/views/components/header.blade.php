<header x-data="{ mobileMenuOpen: false, profileOpen: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 10)"
    :class="{ 'bg-white/80 backdrop-blur-md shadow-sm border-gray-200': scrolled, 'bg-transparent border-transparent': !scrolled }"
    class="fixed top-0 left-0 w-full z-50 border-b transition-all duration-300">
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 transition-all duration-300" :class="{ 'h-16': scrolled }">

            <div class="flex items-center gap-8">
                <a href="/">
                    <img src="{{ asset('images/logo-horizontal-2.png') }}" alt="logo" class="w-40 relative z-50">
                </a>

                <nav class="hidden lg:flex items-center gap-6">
                    <a href="{{ route('books.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-amber-500 transition-colors">Eksplorasi</a>
                    <a href="{{ route('explore.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-amber-500 transition-colors">Genre</a>
                </nav>
            </div>

            <div class="hidden md:flex flex-1 max-w-md px-8">
                <form action="{{ route('explore.index') }}" method="GET" class="relative w-full group">

                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-400 group-focus-within:text-amber-500 transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Temukan cerita atau penulis..."
                        class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-full leading-5 bg-slate-50 text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all sm:text-sm">

                </form>
            </div>

            <div class="hidden md:flex items-center gap-5">
                <a href="{{ route('contributor.apply.create') }}"
                    class="hidden lg:flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-amber-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Mulai Menulis
                </a>

                <div class="w-px h-6 bg-slate-200"></div>

                @auth
                <a href="{{ route('library.index') }}"
                    class="relative p-2 text-slate-500 hover:text-slate-900 transition-colors rounded-full hover:bg-slate-100">
                    <i class="fa-regular fa-bookmark"></i>
                </a>

                <div class="relative">
                    <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false"
                        class="flex items-center focus:outline-none overflow-hidden rounded-full ring-2 ring-transparent hover:ring-amber-500/50 transition-all">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=f59e0b&color=fff"
                            class="w-9 h-9 object-cover" alt="User">
                    </button>

                    <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50"
                        style="display: none;">
                        <div class="px-4 py-3 border-b border-slate-50 mb-2">
                            <p class="text-sm font-semibold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
                        </div>

                        <!-- Tombol Dashboard (Desktop) -->
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:text-amber-600 transition-colors">
                            Dashboard
                        </a>

                        <a href="/profile"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-amber-600 transition-colors">Profil
                            Saya</a>
                        <a href="{{ route('library.index') }}"
                            class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-amber-600 transition-colors">Perpustakaan</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block mt-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">Keluar</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="/login"
                    class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Masuk</a>
                <a href="/register"
                    class="text-sm font-medium bg-slate-900 text-white px-5 py-2.5 rounded-full hover:bg-slate-800 shadow-md shadow-slate-900/10 transition-all hover:-translate-y-0.5">Daftar
                    Gratis</a>
                @endauth
            </div>

            <button @click="mobileMenuOpen = true"
                class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Area Menu Mobile -->
    <template x-teleport="body">
        <div>
            <!-- Layer Gelap (Z-Index Ditinggikan agar menutupi Header) -->
            <div x-show="mobileMenuOpen" x-transition.opacity
                class="fixed inset-0 bg-slate-900/40 z-[100] md:hidden backdrop-blur-sm" @click="mobileMenuOpen = false"
                style="display: none;">
            </div>

            <!-- Panel Sidebar Mobile (Z-Index Ditinggikan menjadi 110) -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 z-[110] w-full max-w-xs bg-white shadow-2xl flex flex-col md:hidden"
                style="display: none;">

                <div class="px-6 py-5 flex items-center justify-between border-b border-slate-100">
                    <span class="text-xl font-bold text-slate-900">Menu Utama</span>
                    <button @click="mobileMenuOpen = false"
                        class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-full transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="px-6 py-6 overflow-y-auto flex-1 flex flex-col gap-6">
                    <div class="relative">
                        <input type="text" placeholder="Cari..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500">
                    </div>

                    <nav class="flex flex-col gap-4">
                        <a href="{{ route('explore.index') }}"
                            class="text-base font-medium text-slate-600 hover:text-amber-500 flex items-center justify-between">Eksplorasi
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg></a>
                        <a href="{{ route('contributor.stories.create') }}"
                            class="text-base font-medium text-slate-600 hover:text-amber-500 flex items-center justify-between">Mulai
                            Menulis <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg></a>
                    </nav>
                </div>

                <div class="p-6 border-t border-slate-100 bg-slate-50">
                    @auth
                    <a href="/profile" class="flex items-center gap-3 mb-6">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=f59e0b&color=fff"
                            class="w-10 h-10 rounded-full" alt="User">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-slate-500">Lihat Profil</p>
                        </div>
                    </a>

                    <!-- Tombol Dashboard (Mobile) -->
                    <a href="{{ route('dashboard') }}"
                        class="block w-full py-3 px-4 mb-3 bg-amber-500 text-white text-center rounded-xl text-sm font-semibold hover:bg-amber-600 shadow-md shadow-amber-500/20 transition-all">
                        Masuk Dashboard
                    </a>

                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="w-full py-3 px-4 bg-white border border-slate-200 text-slate-600 rounded-xl text-sm font-medium hover:bg-slate-50 transition-colors">Keluar</button>
                    </form>
                    @else
                    <div class="grid grid-cols-2 gap-3">
                        <a href="/login"
                            class="py-3 px-4 bg-white border border-slate-200 text-center text-slate-600 rounded-xl text-sm font-medium hover:bg-slate-50 transition-colors">Masuk</a>
                        <a href="/register"
                            class="py-3 px-4 bg-slate-900 text-center text-white rounded-xl text-sm font-medium hover:bg-slate-800 transition-colors">Daftar</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </template>
</header>
