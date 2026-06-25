<div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-sm lg:hidden"
    @click="sidebarOpen = false" style="display: none;"></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-white/95 backdrop-blur-xl border-r border-slate-100/80 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.02)]">

    <div class="flex items-center h-20 px-8 shrink-0">
        <a href="/" class="text-2xl font-black text-slate-900 tracking-tight font-sans flex items-center gap-2">
            <div class="w-8 h-8 bg-amber-400 rounded-xl flex items-center justify-center text-white shadow-sm rotate-3">
                <svg class="w-5 h-5 -rotate-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            Kita<span class="text-amber-500">Baca</span>
        </a>
    </div>

    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1 custom-scrollbar">

        <div class="mb-5 px-4 flex items-center gap-3">
            <div class="h-px bg-slate-200 flex-1"></div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                Panel {{ ucfirst(Auth::user()->role ?? 'User') }}
            </span>
            <div class="h-px bg-slate-200 flex-1"></div>
        </div>

        <a href="{{ route('dashboard') }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('dashboard', '*.dashboard') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('dashboard', '*.dashboard') ? 'text-amber-400' : 'text-slate-400 group-hover:text-amber-500 transition-colors' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="{{ request()->routeIs('dashboard', '*.dashboard') ? 'font-semibold' : '' }}">Dashboard</span>
        </a>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="pt-4 pb-1 px-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Manajemen</p>
        </div>
        <a href="{{ route('admin.users', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.users*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('admin.users*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-blue-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="{{ request()->routeIs('admin.users*') ? 'font-semibold' : '' }}">Kelola Pengguna</span>
        </a>
        {{-- <a href="{{ route('admin.submissions', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.submissions*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('admin.submissions*') ? 'text-emerald-400' : 'text-slate-400 group-hover:text-emerald-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="{{ request()->routeIs('admin.submissions*') ? 'font-semibold' : '' }}">Persetujuan
                Penulis</span>
        </a>
        <a href="{{ route('admin.categories', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.categories*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('admin.categories*') ? 'text-purple-400' : 'text-slate-400 group-hover:text-purple-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="{{ request()->routeIs('admin.categories*') ? 'font-semibold' : '' }}">Kategori & Genre</span>
        </a> --}}
        @endif

        @if(Auth::check() && (Auth::user()->role === 'contributor' || Auth::user()->role === 'admin'))
        <div class="pt-4 pb-1 px-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kreator</p>
        </div>
        <a href="{{ route('contributor.submit.index', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('contributor.stories.index*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('contributor.stories.index*') ? 'text-rose-400' : 'text-slate-400 group-hover:text-rose-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="{{ request()->routeIs('contributor.stories.index*') ? 'font-semibold' : '' }}">Karya
                Saya</span>
        </a>
        {{-- <a href="{{ route('contributor.stories.create', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('contributor.stories.create') ? 'bg-amber-100 text-amber-800 shadow-sm font-bold' : 'bg-amber-50 text-amber-700 hover:bg-amber-100 hover:shadow-sm font-semibold' }}">
            <div class="w-6 h-6 bg-amber-400 text-white rounded-full flex items-center justify-center shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            Tulis Cerita Baru
        </a> --}}
        @endif

        @if(Auth::check() && Auth::user()->role === 'user')
        <div class="pt-4 pb-1 px-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Aktivitas</p>
        </div>
        {{-- <a href="{{ route('user.history', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('user.history*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('user.history*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-blue-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="{{ request()->routeIs('user.history*') ? 'font-semibold' : '' }}">Riwayat Membaca</span>
        </a>
        <a href="{{ route('user.rewards', [], false) ?? '#' }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 {{ request()->routeIs('user.rewards*') ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->routeIs('user.rewards*') ? 'text-amber-400' : 'text-slate-400 group-hover:text-amber-500' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
            <span class="{{ request()->routeIs('user.rewards*') ? 'font-semibold' : '' }}">Lencana & Hadiah</span>
        </a> --}}
        @endif

    </div>

    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
        <a href="{{ route('home') }}"
            class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-200 text-slate-500 hover:bg-white hover:shadow-sm hover:text-slate-900 font-medium border border-transparent hover:border-slate-200">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>

</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
        background: #cbd5e1;
    }
</style>
