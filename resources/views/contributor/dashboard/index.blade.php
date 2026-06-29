<x-app-layout>
    <div class="w-full pb-8">

        <div
            class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl p-8 sm:p-10 text-white mb-8 relative overflow-hidden shadow-lg">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <p class="text-amber-400 font-bold tracking-widest uppercase text-xs mb-2">Dasbor Penulis</p>
                    <h1 class="text-3xl sm:text-4xl font-black mb-2">Halo, {{ explode(' ', $user->name)[0] }}! ✍️</h1>
                    <p class="text-slate-300 max-w-xl text-sm sm:text-base leading-relaxed">Siap untuk membagikan dunia
                        barumu hari ini? Mari lihat perkembangan karya-karyamu sejauh ini.</p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('contributor.stories.create') ?? '#' }}"
                        class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold px-6 py-3 rounded-xl transition-all shadow-sm active:scale-95">
                        <i class="fa-solid fa-pen-to-square"></i> Tulis Cerita Baru
                    </a>
                </div>
            </div>

            <div
                class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl pointer-events-none">
            </div>
            <div
                class="absolute -bottom-24 -right-10 w-48 h-48 bg-amber-500 opacity-20 rounded-full blur-2xl pointer-events-none">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-5">
                <div
                    class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Cerita</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalCerita }}</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-5">
                <div
                    class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Bab</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalBab }}</h3>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-5">
                <div
                    class="w-14 h-14 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Pembaca</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ number_format($totalPembaca) }}</h3>
                </div>
            </div>
        </div>

        <div
            class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
            <div class="p-6 md:p-8 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-lg font-black text-slate-900">Karya Terbarumu</h3>
                <a href="#" class="text-sm font-bold text-amber-600 hover:text-amber-700">Lihat Semua</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold">
                        <tr>
                            <th class="px-6 lg:px-8 py-4">Judul Cerita</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Jumlah Bab</th>
                            <th class="px-6 py-4 text-center">Dilihat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        @forelse($books->take(5) as $book)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-14 rounded-lg bg-slate-100 overflow-hidden shadow-sm shrink-0">
                                        @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                                            class="w-full h-full object-cover">
                                        @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-slate-300 text-xs">
                                            <i class="fa-solid fa-book"></i>
                                        </div>
                                        @endif
                                    </div>
                                    <p class="font-bold text-slate-800">{{ $book->title }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($book->status === 'published')
                                <span
                                    class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold border border-emerald-100">Diterbitkan</span>
                                @else
                                <span
                                    class="bg-slate-100 text-slate-500 px-3 py-1 rounded-full text-xs font-bold border border-slate-200">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-600">{{ $book->chapters->count() }}
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-600">{{
                                number_format($book->views_count) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"
                                class="px-6 py-12 text-center text-slate-400 font-medium border-t border-dashed border-slate-200">
                                Belum ada karya yang ditulis. <a href="#" class="text-amber-500 hover:underline">Mulai
                                    cerita pertamamu!</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>