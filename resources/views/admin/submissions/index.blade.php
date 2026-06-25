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
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama atau email pendaftar..."
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
                            <th class="px-6 py-5">Nomor Telepon</th>
                            <th class="px-6 py-5">Tanggal Pengajuan</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 lg:px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">

                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center font-bold shadow-sm">
                                        RA
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">Rian Anggara</p>
                                        <p class="text-slate-500 font-medium">rian.ang@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-medium">081234567890</td>
                            <td class="px-6 py-4 text-slate-500 font-medium">25 Jun 2026</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold border border-amber-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        @click="openDetail({ id: 1, name: 'Rian Anggara', email: 'rian.ang@example.com', phone: '081234567890', portfolio: 'https://github.com/rian', address: 'Jl. Melati No. 12, Jakarta', status: 'pending' })"
                                        class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                        Periksa Berkas
                                    </button>

                                    <form :action="`{{ url('/admin/submissions') }}/${selectedSubmission?.id}/approve`"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-white border border-emerald-200 text-emerald-600 hover:bg-emerald-500 hover:text-white hover:border-emerald-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                            Terima
                                        </button>
                                    </form>

                                    <button @click="openReject({ id: 1, name: 'Rian Anggara' })"
                                        class="bg-white border border-rose-200 text-rose-600 hover:bg-rose-500 hover:text-white hover:border-rose-500 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                        Tolak
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold shadow-sm">
                                        DM
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">Dian Mega</p>
                                        <p class="text-slate-500 font-medium">dian.mega@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-medium">085711223344</td>
                            <td class="px-6 py-4 text-slate-500 font-medium">20 Jun 2026</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full text-xs font-bold border border-emerald-100/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Disetujui
                                </span>
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <button
                                    @click="openDetail({ id: 2, name: 'Dian Mega', email: 'dian.mega@example.com', phone: '085711223344', portfolio: 'https://dianmega.com', address: 'Jl. Merdeka No. 45, Bandung', status: 'approved' })"
                                    class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 py-2 rounded-xl font-bold transition-all shadow-sm text-xs">
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        @include('admin.submissions.partials.reject-modal')
        @include('admin.submissions.partials.detail-modal')

    </div>
</x-app-layout>