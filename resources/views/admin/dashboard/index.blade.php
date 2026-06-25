<x-app-layout>
    <div class="w-full pb-8">

        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Dashboard Admin</h1>
                <p class="text-slate-500 font-medium">Ringkasan statistik dan aktivitas platform StoryHub hari ini.</p>
            </div>

            <button
                class="inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm">
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Bulan Ini
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mb-10">

            <div
                class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-50 shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex items-center justify-between hover:-translate-y-1 transition-transform duration-300">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Total Pengguna</p>
                    <div class="flex items-end gap-3">
                        <h3 class="text-4xl font-black text-slate-800 tracking-tight">1,248</h3>
                        <span
                            class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg text-xs font-bold mb-1.5">+12%</span>
                    </div>
                </div>
                <div
                    class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center shrink-0 border border-blue-100/50">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>

            <div
                class="bg-white rounded-[2rem] p-6 lg:p-8 border border-slate-50 shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex items-center justify-between hover:-translate-y-1 transition-transform duration-300">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Total Cerita</p>
                    <div class="flex items-end gap-3">
                        <h3 class="text-4xl font-black text-slate-800 tracking-tight">452</h3>
                        <span
                            class="text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg text-xs font-bold mb-1.5">+5%</span>
                    </div>
                </div>
                <div
                    class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center shrink-0 border border-emerald-100/50">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-white to-amber-50/50 rounded-[2rem] p-6 lg:p-8 border border-amber-100 shadow-[0_8px_30px_rgb(251,191,36,0.15)] flex items-center justify-between relative overflow-hidden hover:-translate-y-1 transition-transform duration-300">
                <div class="relative z-10">
                    <p class="text-xs font-bold text-amber-600 uppercase tracking-wider mb-2 flex items-center gap-2">
                        Menunggu Review
                    </p>
                    <h3 class="text-4xl font-black text-slate-900 tracking-tight">5 <span
                            class="text-xl font-semibold text-slate-500 tracking-normal">Pengajuan</span></h3>
                </div>
                <div
                    class="w-16 h-16 bg-white text-amber-500 rounded-2xl flex items-center justify-center shrink-0 shadow-sm border border-amber-100 relative z-10">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <div
                    class="absolute right-0 top-0 w-32 h-32 bg-amber-400/10 rounded-full blur-2xl translate-x-1/3 -translate-y-1/4">
                </div>
            </div>

        </div>

        <div
            class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">

            <div
                class="px-6 lg:px-8 py-6 border-b border-slate-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-xl font-black text-slate-800">Persetujuan Penulis Baru</h2>
                    <p class="text-sm text-slate-500 font-medium mt-1">Review dan verifikasi data pengguna yang ingin
                        menjadi kontributor.</p>
                </div>
                <a href="#"
                    class="inline-flex items-center gap-1 text-sm text-blue-600 font-bold hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-xl transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 lg:px-8 py-4 rounded-tl-lg">Informasi Pendaftar</th>
                            <th class="px-6 py-4">Tanggal Pengajuan</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 lg:px-8 py-4 text-right rounded-tr-lg">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold shadow-sm">
                                        BS
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">Budi Santoso</p>
                                        <p class="text-slate-500 font-medium">budi@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-medium">
                                25 Jun 2026
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold border border-amber-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="bg-white border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white hover:border-emerald-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm">
                                        Terima
                                    </button>
                                    <button
                                        class="bg-white border border-rose-200 text-rose-600 hover:bg-rose-500 hover:text-white hover:border-rose-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold shadow-sm">
                                        SN
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">Siti Nurhaliza</p>
                                        <p class="text-slate-500 font-medium">siti.nur@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-medium">
                                24 Jun 2026
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold border border-amber-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="bg-white border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white hover:border-emerald-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm">
                                        Terima
                                    </button>
                                    <button
                                        class="bg-white border border-rose-200 text-rose-600 hover:bg-rose-500 hover:text-white hover:border-rose-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
