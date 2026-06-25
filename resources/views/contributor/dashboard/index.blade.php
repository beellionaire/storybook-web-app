<x-app-layout>
    <div class="max-w-6xl mx-auto">

        <div
            class="bg-white rounded-3xl p-8 mb-8 border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h1 class="font-balsamiq text-3xl font-bold text-slate-800 mb-2">Selamat berkarya, {{ Auth::user()->name
                    }}! ✍️</h1>
                <p class="text-slate-500">Ada ide cerita menakjubkan apa yang ingin kamu tulis hari ini?</p>
            </div>
            <a href="/write"
                class="shrink-0 bg-amber-400 text-slate-900 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-amber-500 hover:-translate-y-1 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Tulis Cerita Baru
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Pembaca</p>
                <div class="flex items-end gap-2">
                    <h3 class="font-balsamiq text-3xl font-bold text-slate-800">24.5K</h3>
                    <span class="text-emerald-500 text-sm font-bold mb-1">+12%</span>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Cerita Terbit</p>
                <h3 class="font-balsamiq text-3xl font-bold text-slate-800">4</h3>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Suka 👍</p>
                <h3 class="font-balsamiq text-3xl font-bold text-slate-800">1,240</h3>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Komentar 💬</p>
                <h3 class="font-balsamiq text-3xl font-bold text-slate-800">89</h3>
            </div>
        </div>

        <h2 class="font-balsamiq text-xl font-bold text-slate-800 mb-4">Karya Terakhirmu</h2>
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Judul Cerita</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Pembaca</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-800">Akademi Penyihir Awan</td>
                        <td class="px-6 py-4"><span
                                class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">Terbit</span>
                        </td>
                        <td class="px-6 py-4">12,000</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-blue-600 hover:underline font-semibold">Edit</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-800">Rahasia Loker 404</td>
                        <td class="px-6 py-4"><span
                                class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold">Draft</span>
                        </td>
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-blue-600 hover:underline font-semibold">Lanjut Tulis</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>