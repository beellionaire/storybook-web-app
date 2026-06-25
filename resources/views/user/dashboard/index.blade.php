<x-app-layout>
    <div class="max-w-6xl mx-auto">

        <div
            class="bg-gradient-to-r from-blue-400 to-cyan-400 rounded-3xl p-8 mb-8 text-white shadow-lg relative overflow-hidden">
            <div class="absolute -right-10 -top-10 opacity-20 rotate-12">
                <svg width="200" height="200" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L15 9L22 12L15 15L12 22L9 15L2 12L9 9L12 2Z" />
                </svg>
            </div>
            <div class="relative z-10">
                <h1 class="font-balsamiq text-3xl md:text-4xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 🚀</h1>
                <p class="text-blue-50 font-medium text-lg">Siap untuk petualangan seru hari ini? Mari kita lanjutkan
                    membacamu!</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white rounded-3xl p-6 border-2 border-slate-100 shadow-sm flex items-center gap-5 hover:-translate-y-1 transition-transform">
                <div
                    class="w-16 h-16 bg-amber-100 text-3xl flex items-center justify-center rounded-full shadow-inner border border-amber-200">
                    📚</div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Buku Dibaca</p>
                    <h3 class="font-balsamiq text-3xl font-bold text-slate-800">12</h3>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl p-6 border-2 border-slate-100 shadow-sm flex items-center gap-5 hover:-translate-y-1 transition-transform">
                <div
                    class="w-16 h-16 bg-purple-100 text-3xl flex items-center justify-center rounded-full shadow-inner border border-purple-200">
                    🏆</div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Lencana</p>
                    <h3 class="font-balsamiq text-3xl font-bold text-slate-800">5</h3>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl p-6 border-2 border-slate-100 shadow-sm flex items-center gap-5 hover:-translate-y-1 transition-transform">
                <div
                    class="w-16 h-16 bg-emerald-100 text-3xl flex items-center justify-center rounded-full shadow-inner border border-emerald-200">
                    🪙</div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Koin Cerita</p>
                    <h3 class="font-balsamiq text-3xl font-bold text-slate-800">450</h3>
                </div>
            </div>
        </div>

        <h2 class="font-balsamiq text-2xl font-bold text-slate-800 mb-4 flex items-center gap-2">
            <span>🔖</span> Lanjutkan Membaca
        </h2>
        <div
            class="bg-white p-5 rounded-[2rem] border-2 border-slate-100 shadow-sm flex flex-col md:flex-row gap-6 items-center">
            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=200&auto=format&fit=crop"
                class="w-32 h-32 object-cover rounded-2xl shadow-md" alt="Buku">
            <div class="flex-1 w-full">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-balsamiq text-xl font-bold text-slate-800">Eko-Sistem: Batas Akhir</h3>
                    <span class="text-xs font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Bab 4</span>
                </div>
                <p class="text-sm text-slate-500 mb-4">Terakhir dibaca: Kemarin</p>
                <div class="w-full bg-slate-100 rounded-full h-3 mb-2">
                    <div class="bg-amber-400 h-3 rounded-full" style="width: 45%"></div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 text-right">45% Selesai</p>
            </div>
            <a href="#"
                class="w-full md:w-auto text-center bg-slate-900 text-white font-bold py-3 px-8 rounded-full hover:bg-amber-500 transition-colors">
                Lanjut Baca
            </a>
        </div>

    </div>
</x-app-layout>