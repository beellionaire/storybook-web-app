<div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-sm lg:hidden"
    @click="sidebarOpen = false" style="display: none;"></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-white/95 backdrop-blur-xl border-r border-slate-100 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 flex flex-col shadow-[10px_0_40px_rgba(0,0,0,0.03)]">

    <div class="flex items-center h-20 px-8 shrink-0 border-b border-slate-50 justify-center">
        <a href="/">
            <img src="{{ asset('images/logo-horizontal-2.png') }}" alt="logo" class="w-44">
        </a>
    </div>

    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5 custom-scrollbar">

        <div class="mb-6 px-4 flex items-center gap-3 opacity-70">
            <div class="h-px bg-slate-200 flex-1"></div>
            <span
                class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50 px-2 py-1 rounded-md">
                Panel {{ ucfirst(Auth::user()->role ?? 'User') }}
            </span>
            <div class="h-px bg-slate-200 flex-1"></div>
        </div>

        <a href="{{ route('dashboard') }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('dashboard', '*.dashboard') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-house w-5 text-center text-lg {{ request()->routeIs('dashboard', '*.dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Dashboard</span>
        </a>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="pt-6 pb-2 px-4">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Manajemen</p>
        </div>

        <a href="{{ route('admin.users.index', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('admin.users*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-users-gear w-5 text-center text-lg {{ request()->routeIs('admin.users*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Kelola Pengguna</span>
        </a>

        <a href="{{ route('admin.submissions.index', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('admin.submissions*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-user-shield w-5 text-center text-lg {{ request()->routeIs('admin.submissions*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Persetujuan Penulis</span>
        </a>

        <a href="{{ route('admin.categories.index', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('admin.categories*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-layer-group w-5 text-center text-lg {{ request()->routeIs('admin.categories*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Kategori & Genre</span>
        </a>

        <a href="{{ route('admin.books.index', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('admin.books*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-book-bookmark w-5 text-center text-lg {{ request()->routeIs('admin.books*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Kelola Karya</span>
        </a>
        @endif

        @if(Auth::check() && (Auth::user()->role === 'contributor' || Auth::user()->role === 'admin'))
        <div class="pt-6 pb-2 px-4">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kreator</p>
        </div>

        <a href="{{ route('contributor.stories.index', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('contributor.stories.*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-pen-nib w-5 text-center text-lg {{ request()->routeIs('contributor.stories.index*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Karya Saya</span>
        </a>
        @endif

        @if(Auth::check() && Auth::user()->role === 'user')
        <div class="pt-6 pb-2 px-4">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Aktivitas</p>
        </div>

        {{-- <a href="{{ route('user.history', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('user.history*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-clock-rotate-left w-5 text-center text-lg {{ request()->routeIs('user.history*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Riwayat Membaca</span>
        </a>

        <a href="{{ route('user.rewards', [], false) ?? '#' }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 ease-out {{ request()->routeIs('user.rewards*') ? 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-[0_8px_20px_rgb(249,115,22,0.3)] font-bold translate-x-1' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 hover:translate-x-1 font-medium' }}">
            <i
                class="fa-solid fa-medal w-5 text-center text-lg {{ request()->routeIs('user.rewards*') ? 'text-white' : 'text-slate-400 group-hover:text-orange-500 transition-colors' }}"></i>
            <span>Lencana & Hadiah</span>
        </a> --}}
        @endif

    </div>

    <div class="p-4 border-t border-slate-100 bg-slate-50/80 backdrop-blur-md">
        <a href="{{ route('home') }}"
            class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 text-slate-500 hover:bg-white hover:shadow-md hover:shadow-slate-200/50 hover:text-orange-600 font-bold border border-transparent hover:border-slate-200 hover:-translate-y-1">
            <i
                class="fa-solid fa-arrow-right-from-bracket w-5 text-center text-lg text-slate-400 group-hover:text-orange-500 transition-colors"></i>
            <span>Halaman Utama</span>
        </a>
    </div>

</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
        background: #94a3b8;
    }
</style>