<x-app-layout>
    <div x-data="{
            createModalOpen: false,
            editModalOpen: false,
            deleteModalOpen: false,
            selectedUser: null,
            toastOpen: false,
            toastMessage: '',
            toastType: 'success', // 'success' atau 'error'
            openEdit(user) {
                this.selectedUser = user;
                this.editModalOpen = true;
            },
            openDelete(user) {
                this.selectedUser = user;
                this.deleteModalOpen = true;
            },
            showToast(message, type = 'success') {
                this.toastMessage = message;
                this.toastType = type;
                this.toastOpen = true;
                setTimeout(() => this.toastOpen = false, 3000);
            }
        }" class="w-full pb-8 relative">

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

        <div
            class="bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" placeholder="Cari nama atau email..."
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all">
            </div>
            <div class="flex gap-2">
                <select
                    class="bg-slate-50 border-none rounded-xl px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-amber-500/20 focus:bg-white transition-all outline-none font-medium">
                    <option value="">Semua Role</option>
                    <option value="admin">Admin</option>
                    <option value="contributor">Contributor</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>

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
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Nabil&background=f59e0b&color=fff"
                                        class="w-10 h-10 rounded-full shadow-sm" alt="Avatar">
                                    <div>
                                        <p class="font-bold text-slate-800">Nabil (Anda)</p>
                                        <p class="text-slate-500 font-medium">nabil@storyhub.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center bg-rose-50 text-rose-600 px-3 py-1 rounded-lg text-xs font-bold border border-rose-100/50">Admin</span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 font-medium">20 Jun 2026</td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <button
                                    @click="openEdit({ id: 1, name: 'Nabil', email: 'nabil@storyhub.com', role: 'admin' })"
                                    class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors inline-block mr-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+M&background=818cf8&color=fff"
                                        class="w-10 h-10 rounded-full shadow-sm" alt="Avatar">
                                    <div>
                                        <p class="font-bold text-slate-800">Sarah M.</p>
                                        <p class="text-slate-500 font-medium">sarah@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg text-xs font-bold border border-indigo-100/50">Contributor</span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 font-medium">22 Jun 2026</td>
                            <td class="px-6 lg:px-8 py-4 text-right">
                                <button
                                    @click="openEdit({ id: 2, name: 'Sarah M.', email: 'sarah@example.com', role: 'contributor' })"
                                    class="text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors inline-block mr-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button @click="openDelete({ id: 2, name: 'Sarah M.' })"
                                    class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors inline-block">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 lg:px-8 py-4 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500">
                <p>Menampilkan <span class="font-bold text-slate-800">1</span> hingga <span
                        class="font-bold text-slate-800">2</span> dari <span
                        class="font-bold text-slate-800">1,248</span> hasil</p>
                <div class="flex gap-1">
                    <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 disabled:opacity-50"
                        disabled>Sebelumnnya</button>
                    <button
                        class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 bg-white">Selanjutnya</button>
                </div>
            </div>
        </div>

        <div x-show="toastOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:translate-x-8"
            x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:translate-x-0"
            x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:translate-x-8"
            class="fixed bottom-4 right-4 sm:bottom-8 sm:right-8 z-[60] flex items-center gap-3 px-6 py-4 rounded-2xl shadow-2xl border"
            :class="toastType === 'success' ? 'bg-slate-900 border-slate-800 text-white' : 'bg-red-50 border-red-200 text-red-800'"
            style="display: none;">

            <svg x-show="toastType === 'success'" class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <svg x-show="toastType === 'error'" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <p x-text="toastMessage" class="text-sm font-bold tracking-wide"></p>

            <button @click="toastOpen = false" class="ml-2 opacity-60 hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        @include('admin.users.partials.create-modal')
        @include('admin.users.partials.edit-modal')
        @include('admin.users.partials.delete-modal')

    </div>
</x-app-layout>