<x-app-layout>
    <div class="w-full pb-12 relative" x-data="{
            deleteChapterModal: false,
            selectedChapter: null,
            openDeleteChapter(chapter) {
                this.selectedChapter = chapter;
                this.deleteChapterModal = true;
            }
        }">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm font-bold text-slate-400 mb-2">
                    <a href="{{ route('contributor.stories.index') }}"
                        class="hover:text-orange-500 transition-colors">Karya Saya</a>
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    <span class="text-slate-600">Daftar Isi</span>
                </div>
                <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">Detail Buku</h1>
            </div>
        </div>

        <div
            class="bg-white rounded-2xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden mb-8">

            <div class="flex items-center gap-8 px-6 lg:px-8 py-4 border-b border-slate-100 bg-white">
                <a href="#"
                    class="font-black text-orange-500 border-b-2 border-orange-500 pb-4 -mb-[17px] text-sm uppercase tracking-wider">Daftar
                    Isi</a>
                <a href="{{ route('contributor.stories.edit', $book->id) }}"
                    class="font-bold text-slate-400 hover:text-slate-600 pb-4 -mb-[17px] text-sm uppercase tracking-wider transition-colors">Pengaturan
                    Buku</a>
            </div>

            <div class="px-6 lg:px-8 py-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                <a href="{{ route('contributor.chapters.create', $book->id) }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-all shadow-sm flex items-center gap-2 transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-plus text-xs"></i> Tambah Bab Baru
                </a>
                <span class="text-sm font-bold text-slate-400">{{ $book->chapters->count() }} Bab Tersimpan</span>
            </div>

            <div class="divide-y divide-slate-100" id="chapter-list">
                @forelse($book->chapters()->orderBy('chapter_number', 'asc')->get() as $chapter)
                <div class="flex items-center gap-4 px-6 lg:px-8 py-5 hover:bg-slate-50/60 transition-colors group bg-white chapter-item"
                    data-id="{{ $chapter->id }}">

                    <div
                        class="drag-handle text-slate-300 cursor-grab hover:text-orange-500 transition-colors hidden sm:block px-2 select-none">
                        <i class="fa-solid fa-bars text-xl pointer-events-none"></i>
                    </div>

                    <div class="flex-1 select-none">
                        <h4 class="font-black text-slate-800 text-lg group-hover:text-orange-600 transition-colors">
                            <span class="chapter-number-text text-slate-400 mr-1">Bab {{ $chapter->chapter_number
                                }}:</span> {{ $chapter->title }}
                        </h4>

                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mt-1.5">
                            @if($chapter->status === 'published')
                            <span
                                class="text-emerald-500 font-black text-[11px] uppercase tracking-wider bg-emerald-50 px-2 py-0.5 rounded-md">Publik</span>
                            @else
                            <span
                                class="text-slate-500 font-black text-[11px] uppercase tracking-wider bg-slate-100 px-2 py-0.5 rounded-md">Draft</span>
                            @endif
                            <span class="text-slate-400 text-xs font-bold whitespace-nowrap"><i
                                    class="fa-regular fa-clock mr-1"></i> {{ $chapter->created_at->format('M d, Y')
                                }}</span>
                        </div>
                    </div>

                    <div class="shrink-0 flex items-center gap-2">
                        <a href="{{ route('contributor.chapters.edit', [$book->id, $chapter->id]) }}"
                            class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 flex items-center justify-center hover:bg-slate-50 hover:text-blue-500 transition-colors shadow-sm"
                            title="Edit Bab">
                            <i class="fa-solid fa-pen text-sm"></i>
                        </a>
                        <button type="button"
                            @click="openDeleteChapter({ id: {{ $chapter->id }}, title: '{{ addslashes($chapter->title) }}' })"
                            class="w-10 h-10 rounded-xl bg-white border border-rose-100 text-rose-400 flex items-center justify-center hover:bg-rose-50 hover:text-rose-600 transition-colors shadow-sm"
                            title="Hapus Bab">
                            <i class="fa-solid fa-trash-can text-sm"></i>
                        </button>
                    </div>
                </div>
                @empty
                <div class="px-6 py-16 text-center">
                    <p class="font-bold text-slate-500 mb-2">Buku ini belum memiliki isi cerita.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('chapter-list');
            if (el) {
                Sortable.create(el, {
                    handle: '.drag-handle', 
                    animation: 150,
                    ghostClass: 'bg-orange-50',
                    onEnd: function () {
                        let orderData = [];
                        document.querySelectorAll('.chapter-item').forEach((item, index) => {
                            let newPosition = index + 1;
                            orderData.push({
                                id: item.getAttribute('data-id'),
                                position: newPosition
                            });
                            // Mengubah teks "Bab X:" secara visual
                            item.querySelector('.chapter-number-text').innerText = 'Bab ' + newPosition + ':';
                        });

                        // Simpan urutan baru ke database
                        fetch('{{ route('contributor.stories.reorder_chapters', $book->id) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order: orderData })
                        });
                    }
                });
            }
        });
    </script>

</x-app-layout>
