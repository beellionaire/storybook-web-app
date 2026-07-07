<x-layouts.main>
    <div class="min-h-screen bg-[#F8FAFC] pb-24 font-sans antialiased">

        <header class="relative bg-slate-900 overflow-hidden pt-20 pb-16 lg:pt-28 lg:pb-20 border-b border-slate-800">
            <div class="absolute inset-0 opacity-20">
                <div
                    class="absolute -top-24 -right-24 w-96 h-96 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob">
                </div>
                <div
                    class="absolute top-12 -left-24 w-72 h-72 bg-rose-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000">
                </div>
            </div>

            <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex items-center gap-2 text-sm font-bold text-slate-400 mb-6 uppercase tracking-widest">
                    <a href="{{ route('explore.index') }}" class="hover:text-amber-500 transition-colors">Eksplorasi</a>
                    <svg class="w-3 h-3 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-slate-300">{{ $type }}</span>
                </div>

                <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                    <div class="max-w-3xl">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/10 backdrop-blur border border-white/10 text-xs font-bold text-amber-400 uppercase tracking-widest mb-4">
                            <i class="fa-solid fa-layer-group"></i> Koleksi {{ $type }}
                        </div>
                        <h1
                            class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight mb-4 capitalize">
                            {{ $title }}
                        </h1>
                    </div>

                    <div class="shrink-0">
                        <div
                            class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 text-center shadow-2xl">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Karya</p>
                            <p class="text-3xl font-black text-white">{{ number_format($books->total()) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 mt-12">

            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Karya Populer</h2>
            </div>

            <div
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-x-4 gap-y-8 sm:gap-6">
                @forelse($books as $book)
                <a href="{{ route('books.story', $book->slug) }}" class="group flex flex-col cursor-pointer">

                    <div
                        class="w-full aspect-[2/3] rounded-xl overflow-hidden bg-slate-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-slate-200/60 relative mb-3">
                        @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover {{ $book->title }}" width="160" height="40"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                        <div
                            class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-50 group-hover:scale-105 transition-transform duration-500">
                            <i class="fa-solid fa-book-open text-3xl opacity-50"></i>
                        </div>
                        @endif

                        <div class="absolute bottom-2 left-2 flex gap-1">
                            <span
                                class="bg-slate-900/80 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm">
                                {{ $book->category->name ?? 'Cerita' }}
                            </span>
                        </div>

                        @if($book->is_mature)
                        <div
                            class="absolute top-2 right-2 bg-rose-500/90 backdrop-blur text-white px-2 py-0.5 rounded-md text-[10px] font-black tracking-widest shadow-sm">
                            18+
                        </div>
                        @endif

                        <div
                            class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none">
                            <span
                                class="bg-amber-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                Mulai Baca
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col flex-1">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base line-clamp-1 leading-snug group-hover:text-amber-600 transition-colors"
                            title="{{ $book->title }}">
                            {{ $book->title }}
                        </h3>
                        <p class="text-xs text-slate-500 font-medium mt-1 truncate">
                            Oleh {{ $book->author->name ?? 'Anonim' }}
                        </p>

                        <div
                            class="flex items-center gap-3 text-[11px] text-slate-400 font-bold uppercase tracking-wider mt-2 pt-2 border-t border-slate-100">
                            <span class="flex items-center gap-1" title="Jumlah Pembaca">
                                <span class="text-slate-700">{{ number_format($book->views_count) }}</span> Baca
                            </span>
                            <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                            <span class="flex items-center gap-1" title="Jumlah Bab">
                                <span class="text-amber-600">{{ $book->chapters->count() }}</span> Bab
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div
                    class="col-span-full py-20 flex flex-col items-center justify-center text-center bg-white rounded-3xl border border-slate-100 border-dashed">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                        <i class="fa-solid fa-ghost text-3xl text-slate-300"></i>
                    </div>
                    <h3 class="text-lg font-black text-slate-800 mb-1">Belum Ada Karya</h3>
                    <p class="text-sm font-medium text-slate-500 max-w-sm">Jadilah yang pertama menerbitkan karya
                        orisinalmu di {{ $type }} {{ $title }}!</p>
                </div>
                @endforelse
            </div>

            @if($books->hasPages())
            <div class="mt-12">
                {{ $books->links() }}
            </div>
            @endif

        </main>
    </div>
</x-layouts.main>
