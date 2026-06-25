<x-app-layout>
    <div x-data="{
            createModalOpen: false,
            editModalOpen: false,
            deleteModalOpen: false,
            selectedUser: null,
            openEdit(user) {
                this.selectedUser = user;
                this.editModalOpen = true;
            },
            openDelete(user) {
                this.selectedUser = user;
                this.deleteModalOpen = true;
            }
        }" x-init="
            @if(session('success')) showToast('{{ session('success') }}', 'success'); @endif
            @if(session('error')) showToast('{{ session('error') }}', 'error'); @endif
            @if($errors->any()) showToast('Validasi Gagal! Email mungkin sudah dipakai atau form tidak lengkap.', 'error'); @endif
        " class="w-full pb-8 relative">

        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Kelola Pengguna</h1>
                <p class="text-slate-500 font-medium">Manajemen data admin, penulis, dan pembaca StoryHub.</p>
            </div>

            <button @click="createModalOpen = true"
                class="inline-flex items-center justify-center gap-2 bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-800 hover:-translate-y-0.5 transition-all shadow-md shadow-slate-900/10">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pengguna
            </button>
        </div>

        <form action="{{ route('admin.users.index') }}" method="GET"
            class="bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all"
                    onchange="this.form.submit()">
            </div>
            <div class="flex gap-2">
                <select name="role" onchange="this.form.submit()"
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all outline-none font-medium">
                    <option value="">Semua Role</option>
                    <option value="admin" {{ request('role')=='admin' ? 'selected' : '' }}>Admin</option>
                    <option value="contributor" {{ request('role')=='contributor' ? 'selected' : '' }}>Contributor
                    </option>
                    <option value="user" {{ request('role')=='user' ? 'selected' : '' }}>User</option>
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
                            <th class="px-6 lg:px-8 py-5">Pengguna</th>
                            <th class="px-6 py-5">Role</th>
                            <th class="px-6 py-5">Tgl Bergabung</th>
                            <th class="px-6 lg:px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">

                        @forelse ($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    @php
                                    $bgColor = $user->role === 'admin' ? 'f43f5e' : ($user->role === 'contributor' ?
                                    '6366f1' : 'f59e0b');
                                    @endphp
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background={{ $bgColor }}&color=fff"
                                        class="w-10 h-10 rounded-full shadow-sm" alt="Avatar">
                                    <div>
                                        <p class="font-bold text-slate-800">
                                            {{ $user->name }}
                                            @if($user->id === Auth::id()) <span
                                                class="text-slate-400 font-medium text-xs ml-1">(Anda)</span> @endif
                                        </p>
                                        <p class="text-slate-500 font-medium">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                <span
                                    class="inline-flex items-center bg-rose-50 text-rose-600 px-3 py-1 rounded-lg text-xs font-bold border border-rose-100/50">Admin</span>
                                @elseif($user->role === 'contributor')
                                <span
                                    class="inline-flex items-center bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg text-xs font-bold border border-indigo-100/50">Contributor</span>
                                @else
                                <span
                                    class="inline-flex items-center bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-xs font-bold border border-slate-200/50">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-slate-500 font-medium">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 lg:px-8 py-4 text-right">

                                <button
                                    @click="openEdit({ id: {{ $user->id }}, name: '{{ addslashes($user->name) }}', email: '{{ $user->email }}', role: '{{ $user->role }}' })"
                                    class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors inline-block mr-1 focus:outline-none">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>

                                @if($user->id !== Auth::id())
                                <button
                                    @click="openDelete({ id: {{ $user->id }}, name: '{{ addslashes($user->name) }}' })"
                                    class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors inline-block focus:outline-none">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                @endif

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-slate-500 font-medium">
                                Tidak ada data pengguna yang ditemukan.
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
            <div class="px-6 lg:px-8 py-4 border-t border-slate-100">
                {{ $users->links() }}
            </div>
            @else
            <div class="px-6 lg:px-8 py-4 border-t border-slate-100 text-sm text-slate-500 flex justify-between">
                <p>Menampilkan <span class="font-bold text-slate-800">{{ $users->count() }}</span> hasil.</p>
            </div>
            @endif
        </div>

        @include('admin.users.partials.create-modal')
        @include('admin.users.partials.edit-modal')
        @include('admin.users.partials.delete-modal')
        @include('admin.components.toast')

    </div>
</x-app-layout>
