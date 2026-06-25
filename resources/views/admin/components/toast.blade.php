@if (session()->has('success') || session()->has('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:translate-x-8"
    x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 sm:translate-x-0"
    x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:translate-x-8"
    class="fixed bottom-4 right-4 sm:bottom-8 sm:right-8 z-[100] flex items-center gap-3 px-6 py-4 rounded-2xl shadow-2xl border {{ session()->has('success') ? 'bg-slate-900 border-slate-800 text-white' : 'bg-red-50 border-red-200 text-red-800' }}"
    style="display: none;">

    @if(session()->has('success'))
    <svg class="w-6 h-6 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <p class="text-sm font-bold tracking-wide">{{ session('success') }}</p>
    @endif

    @if(session()->has('error'))
    <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <p class="text-sm font-bold tracking-wide">{{ session('error') }}</p>
    @endif

    <button @click="show = false" class="ml-2 opacity-60 hover:opacity-100 transition-opacity focus:outline-none">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif