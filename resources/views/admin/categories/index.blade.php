<x-app-layout>
    <div x-data="{
            activeTab: 'categories',

            // State Modal Form
            categoryModal: false,
            genreModal: false,
            subgenreModal: false,

            editCategoryModal: false, // Tambahan Baru
            editGenreModal: false,    // Tambahan Baru

            // State Edit & Data
            selectedGenreId: null,
            editData: null, // Menampung data yang sedang diedit

            // State Modal Confirm Delete
            deleteModal: false,
            deleteUrl: '',
            deleteMessage: '',

            // Functions
            openSubgenreModal(id) {
                this.selectedGenreId = id;
                this.subgenreModal = true;
            },
            openEditCategory(category) {
                this.editData = category;
                this.editCategoryModal = true;
            },
            openEditGenre(genre) {
                this.editData = genre;
                this.editGenreModal = true;
            },
            openDeleteModal(url, message) {
                this.deleteUrl = url;
                this.deleteMessage = message;
                this.deleteModal = true;
            }
        }" class="w-full pb-8 relative">

        <!-- Header & Add Buttons -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-1">Kategori & Genre</h1>
                <p class="text-slate-500 font-medium">Klasifikasikan karya tulis agar mudah ditemukan pembaca.</p>
            </div>

            <div>
                <!-- Tambah Kategori (Kosongkan editData saat klik tambah) -->
                <button x-show="activeTab === 'categories'" @click="editData = null; categoryModal = true"
                    class="inline-flex items-center gap-2 bg-slate-900 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-800 transition-all shadow-md shadow-slate-900/10">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg> Tambah Kategori
                </button>
                <!-- Tambah Genre -->
                <button x-show="activeTab === 'genres'" @click="editData = null; genreModal = true"
                    style="display: none;"
                    class="inline-flex items-center gap-2 bg-amber-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-amber-600 transition-all shadow-md shadow-amber-500/20">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg> Tambah Genre
                </button>
            </div>
        </div>

        <!-- Tab Navigasi -->
        <div class="flex gap-2 p-1.5 bg-slate-200/50 rounded-2xl w-full max-w-sm mb-8">
            <button @click="activeTab = 'categories'"
                :class="activeTab === 'categories' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                class="flex-1 py-2 text-sm font-bold rounded-xl transition-all">
                Kategori Utama
            </button>
            <button @click="activeTab = 'genres'"
                :class="activeTab === 'genres' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                class="flex-1 py-2 text-sm font-bold rounded-xl transition-all">
                Genre Cerita
            </button>
        </div>

        <!-- Konten: Kategori -->
        <div x-show="activeTab === 'categories'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($categories as $category)
                <div
                    class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:-translate-y-1 transition-transform group relative">

                    <div
                        class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-3xl mb-4 shadow-sm border border-amber-100 text-amber-500">
                        @if(!empty(trim($category->icon)))
                        <i class="{{ trim($category->icon) }}"></i>
                        @else
                        📚
                        @endif
                    </div>
                    <h3 class="text-xl font-black text-slate-800 tracking-tight mb-1">{{ $category->name }}</h3>
                    <p class="text-xs text-slate-400 font-semibold mb-4">Slug: {{ $category->slug }}</p>

                    <!-- Action Buttons (Edit & Delete) -->
                    <div
                        class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-opacity flex items-center gap-2">
                        <!-- Edit Button -->
                        <button
                            @click="openEditCategory({ id: '{{ $category->id }}', name: '{{ addslashes($category->name) }}', icon: '{{ addslashes($category->icon ?? '') }}' })"
                            class="w-8 h-8 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>

                        <!-- Delete Button (Trigger Modal) -->
                        <button
                            @click="openDeleteModal('{{ route('admin.categories.destroy', $category->id) }}', 'Anda yakin ingin menghapus kategori {{ $category->name }}?')"
                            class="w-8 h-8 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center hover:bg-rose-500 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                </div>
                @empty
                <div
                    class="col-span-full py-10 text-center text-slate-500 font-medium bg-white rounded-[2rem] border border-slate-100 border-dashed">
                    Belum ada kategori yang dibuat.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Konten: Genre -->
        <div x-show="activeTab === 'genres'" style="display: none;"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0">
            <div
                class="bg-white rounded-[2rem] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
                <table class="w-full text-left">
                    <thead
                        class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-widest font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-6 lg:px-8 py-5 w-1/4">Nama Genre</th>
                            <th class="px-6 py-5">Subgenre Terkait</th>
                            <th class="px-6 lg:px-8 py-5 text-right w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        @forelse ($genres as $genre)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 lg:px-8 py-5 align-top">
                                <p class="font-black text-base text-slate-800">{{ $genre->name }}</p>
                                <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mt-1">
                                    {{ $genre->subgenres->count() }} Subgenre
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($genre->subgenres as $sub)
                                    <div
                                        class="inline-flex items-center gap-2 bg-slate-100 text-slate-600 px-3 py-1.5 rounded-lg text-xs font-bold border border-slate-200 hover:border-slate-300 transition-colors group/sub">
                                        {{ $sub->name }}
                                        <!-- Trigger Modal Delete Subgenre -->
                                        <button type="button"
                                            @click="openDeleteModal('{{ route('admin.subgenres.destroy', $sub->id) }}', 'Yakin ingin menghapus subgenre {{ $sub->name }}?')"
                                            class="text-slate-400 hover:text-rose-500 transition-colors focus:outline-none">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    @endforeach

                                    <button @click="openSubgenreModal({{ $genre->id }})"
                                        class="inline-flex items-center gap-1 bg-white text-blue-600 px-3 py-1.5 rounded-lg text-xs font-bold border border-blue-200 border-dashed hover:bg-blue-50 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        Tambah
                                    </button>
                                </div>
                            </td>

                            <td class="px-6 lg:px-8 py-5 text-right align-top">
                                <!-- Action Buttons -->
                                <div
                                    class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">

                                    <!-- Edit Genre Button -->
                                    <button
                                        @click="openEditGenre({ id: '{{ $genre->id }}', name: '{{ addslashes($genre->name) }}' })"
                                        class="text-blue-500 hover:text-white bg-blue-50 hover:bg-blue-500 p-2 rounded-xl transition-colors focus:outline-none">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    <!-- Delete Genre Button (Trigger Modal) -->
                                    <button
                                        @click="openDeleteModal('{{ route('admin.genres.destroy', $genre->id) }}', 'Yakin menghapus Genre {{ $genre->name }} beserta semua subgenrenya?')"
                                        class="text-rose-500 hover:text-white bg-rose-50 hover:bg-rose-500 p-2 rounded-xl transition-colors focus:outline-none">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-slate-500 font-medium">Belum ada genre
                                yang dibuat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Partial Modals -->
        @include('admin.categories.partials.category-modal')
        @include('admin.categories.partials.genre-modal')
        @include('admin.categories.partials.subgenre-modal')
        @include('admin.categories.partials.delete-modal')
        @include('admin.categories.partials.edit-category-modal')
        @include('admin.categories.partials.edit-genre-modal')



    </div>
</x-app-layout>