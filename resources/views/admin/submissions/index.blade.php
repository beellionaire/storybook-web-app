<x-app-layout>
    <div x-data="{
            detailModalOpen: false,
            rejectModalOpen: false,
            selectedSubmission: null,
            openDetail(submission) {
                this.selectedSubmission = submission;
                this.detailModalOpen = true;
            },
            openReject(submission) {
                this.selectedSubmission = submission;
                this.rejectModalOpen = true;
            }
        }" class="w-full pb-8 relative">

        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Persetujuan Penulis</h1>
                <p class="text-slate-500 font-medium">Tinjau dan verifikasi pengajuan pengguna yang ingin menjadi
                    Contributor.</p>
            </div>
        </div>

        <form action="{{ route('admin.submissions.index') }}" method="GET"
            class="bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pendaftar..."
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all">
            </div>
            <div class="flex gap-2">
                <select name="status" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all outline-none font-medium">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>⏳ Menunggu Review
                    </option>
                    <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>✅ Disetujui</option>
                    <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>❌ Ditolak</option>
                </select>

                @if(request()->anyFilled(['search', 'status']))
                <a href="{{ route('admin.submissions.index') }}"
                    class="bg-rose-50 text-rose-600 px-4 py-2.5 rounded-xl text-sm font-bold hover:bg-rose-100 transition-colors flex items-center">Reset</a>
                @endif
            </div>
        </form>

        <div
            class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead
                        class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-6 lg:px-8 py-5">Pendaftar</th>
                            <th class="px-6 py-5">Usia</th>
                            <th class="px-6 py-5">Tanggal Pengajuan</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 lg:px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">

                        @forelse($submissions as $submission)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center font-bold shadow-sm">
                                        {{ strtoupper(substr($submission->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">{{ $submission->name }}</p>
                                        <p class="text-slate-500 font-medium">{{ $submission->user->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-600 font-medium">{{ $submission->age }} Tahun</td>

                            <td class="px-6 py-4 text-slate-500 font-medium">{{ $submission->created_at->format('d M Y')
                                }}</td>

                            <td class="px-6 py-4">
                                @if($submission->status === 'pending')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold border border-amber-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                </span>
                                @elseif($submission->status === 'approved')
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full text-xs font-bold border border-emerald-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-600 px-3 py-1.5 rounded-full text-xs font-bold border border-rose-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                                </span>
                                @endif
                            </td>

                            <td class="px-6 lg:px-8 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">

                                    <button @click="openDetail({
                                            id: {{ $submission->id }},
                                            name: @js($submission->name),
                                            email: @js($submission->user->email ?? ''),
                                            age: {{ $submission->age }},
                                            address: @js($submission->address),
                                            reason: @js($submission->reason),
                                            status: @js($submission->status)
                                        })"
                                        class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                        {{ $submission->status === 'pending' ? 'Periksa Berkas' : 'Lihat Detail' }}
                                    </button>

                                    @if($submission->status === 'pending')
                                    <form action="{{ route('admin.submissions.approve', $submission->id) }}"
                                        method="POST">
                                      @csrf
                                        <button type="submit"
                                            class="bg-white border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white hover:border-emerald-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                            Terima
                                        </button>
                                    </form>

                                    <button
                                        @click="openReject({ id: {{ $submission->id }}, name: @js($submission->name) })"
                                        class="bg-white border border-rose-200 text-rose-600 hover:bg-rose-500 hover:text-white hover:border-rose-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                        Tolak
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400 font-medium">
                                Tidak ada data pengajuan yang ditemukan.
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            @if($submissions->hasPages())
            <div class="px-6 lg:px-8 py-4 border-t border-slate-100">
                {{ $submissions->links() }}
            </div>
            @endif
        </div>

        @include('admin.submissions.partials.reject-modal')
        @include('admin.submissions.partials.detail-modal')

    </div>
</x-app-layout>
