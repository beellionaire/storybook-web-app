<x-layouts.main>
    <div class="min-h-screen bg-[#F8FAFC] pb-32 font-sans antialiased selection:bg-amber-200 selection:text-amber-900">

        <!-- Premium Hero Section -->
        <div class="relative bg-slate-950 pt-32 pb-48 lg:pt-40 lg:pb-60 overflow-hidden">
            <!-- Advanced Background Glow (Lebih menyebar untuk layar lebar) -->
            <div
                class="absolute top-[-30%] left-1/2 -translate-x-1/2 w-[120%] max-w-[1500px] h-[150%] bg-gradient-to-b from-amber-500/10 via-indigo-500/10 to-transparent blur-[120px] rounded-[100%] pointer-events-none">
            </div>

            <!-- Grid Pattern Overlay -->
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNCkiLz48L3N2Zz4=')] [mask-image:linear-gradient(to_bottom,white,transparent)] opacity-60">
            </div>

            <div
                class="relative z-10 max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">
                <h1
                    class="text-5xl md:text-6xl lg:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-b from-white via-white to-slate-500 tracking-tighter mb-8 drop-shadow-sm max-w-5xl">
                    Menghubungkan Dunia<br>Lewat Cerita.
                </h1>
                <p class="text-slate-300 text-lg lg:text-2xl max-w-3xl font-medium leading-relaxed">
                    Kami percaya setiap orang memiliki cerita yang pantas didengar. Platform literasi revolusioner untuk
                    pencerita dan pembaca generasi baru.
                </p>
            </div>
        </div>

        <!-- Main Content Area (1500px Wide) -->
        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 -mt-32 lg:-mt-40 relative z-20">
            <div
                class="bg-white rounded-[2.5rem] lg:rounded-[3.5rem] p-6 sm:p-12 lg:p-20 border border-slate-200/50 shadow-[0_30px_80px_rgba(15,23,42,0.08)]">

                <!-- Visi Section (Big Impact Statement) -->
                <div
                    class="relative w-full bg-slate-50 rounded-[2rem] p-10 lg:p-20 mb-24 overflow-hidden border border-slate-100">
                    <div class="absolute -right-20 -top-20 text-slate-100/50">
                        <i class="fa-solid fa-quote-right text-[15rem]"></i>
                    </div>
                    <div class="relative z-10 max-w-4xl">
                        <span
                            class="inline-block px-3 py-1 bg-amber-100 text-amber-700 font-extrabold uppercase tracking-widest text-xs rounded-lg mb-6">Visi
                            Kami</span>
                        <h2 class="text-3xl lg:text-5xl font-black text-slate-900 leading-[1.2] tracking-tight">
                            "Menjadi ruang baca digital terbesar yang memberdayakan penulis lokal untuk melampaui batas
                            imajinasi."
                        </h2>
                    </div>
                </div>

                <!-- Misi Section (3 Columns for Wide Screens) -->
                <div class="mb-32">
                    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
                        <div class="max-w-2xl">
                            <h2 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-4">Pilar Utama
                                Kami</h2>
                            <p class="text-slate-500 text-lg font-medium">Tiga fondasi utama yang mendorong setiap
                                inovasi dan keputusan yang kami buat di StoryHub.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Card 1 -->
                        <div
                            class="group p-8 lg:p-10 bg-white rounded-3xl border border-slate-200/80 hover:border-amber-200 hover:shadow-[0_20px_40px_rgba(245,158,11,0.08)] hover:-translate-y-2 transition-all duration-500">
                            <div
                                class="w-16 h-16 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-2xl mb-8 group-hover:scale-110 group-hover:bg-amber-500 group-hover:text-white transition-all duration-500">
                                <i class="fa-solid fa-pen-nib"></i>
                            </div>
                            <h4 class="font-black text-slate-900 text-2xl mb-4">Pemberdayaan Penulis</h4>
                            <p class="text-slate-500 leading-relaxed font-medium">Menciptakan ekosistem yang sehat dan
                                adil bagi penulis pemula hingga profesional untuk mempublikasikan serta memonetisasi
                                karyanya.</p>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="group p-8 lg:p-10 bg-white rounded-3xl border border-slate-200/80 hover:border-indigo-200 hover:shadow-[0_20px_40px_rgba(99,102,241,0.08)] hover:-translate-y-2 transition-all duration-500">
                            <div
                                class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center text-2xl mb-8 group-hover:scale-110 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-500">
                                <i class="fa-solid fa-book-open-reader"></i>
                            </div>
                            <h4 class="font-black text-slate-900 text-2xl mb-4">Akses Membaca Premium</h4>
                            <p class="text-slate-500 leading-relaxed font-medium">Memberikan pengalaman membaca tanpa
                                batas dengan antarmuka super bersih, bebas iklan mengganggu, dan sangat mudah digunakan.
                            </p>
                        </div>

                        <!-- Card 3 (Added to balance 1500px width) -->
                        <div
                            class="group p-8 lg:p-10 bg-white rounded-3xl border border-slate-200/80 hover:border-emerald-200 hover:shadow-[0_20px_40px_rgba(16,185,129,0.08)] hover:-translate-y-2 transition-all duration-500">
                            <div
                                class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center text-2xl mb-8 group-hover:scale-110 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-500">
                                <i class="fa-solid fa-users-rays"></i>
                            </div>
                            <h4 class="font-black text-slate-900 text-2xl mb-4">Komunitas Interaktif</h4>
                            <p class="text-slate-500 leading-relaxed font-medium">Membangun jembatan komunikasi dua arah
                                yang hangat antara pembaca dan penulis melalui fitur diskusi, apresiasi, dan umpan balik
                                langsung.</p>
                        </div>
                    </div>
                </div>

                <!-- Kisah Awal Mula Section (Split Layout for Wide Screen) -->
                <div class="mb-32">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">
                        <!-- Sticky Left Sidebar -->
                        <div class="lg:col-span-5 lg:sticky lg:top-10">
                            <span
                                class="inline-block px-3 py-1 bg-slate-100 text-slate-600 font-extrabold uppercase tracking-widest text-xs rounded-lg mb-4">Sejarah
                                Singkat</span>
                            <h2
                                class="text-3xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight mb-6">
                                Bagaimana <br><span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-500">Cerita
                                    Ini Dimulai.</span></h2>
                            <div class="hidden lg:block w-20 h-1.5 bg-slate-200 rounded-full"></div>
                        </div>

                        <!-- Right Content -->
                        <div
                            class="lg:col-span-7 prose prose-lg prose-slate max-w-none text-slate-600 font-medium leading-relaxed">
                            <p class="text-xl text-slate-800 font-semibold mb-6">
                                Semuanya berawal dari sebuah ide sederhana di sudut perpustakaan pada pertengahan tahun
                                2024.
                            </p>
                            <p>
                                Kami menyadari bahwa banyak naskah hebat yang tidak pernah diterbitkan karena tingginya
                                dinding birokrasi penerbitan tradisional. Ribuan cerita fantasi, romansa, dan misteri
                                yang brilian hanya tersimpan rapat di dalam laci meja atau dokumen komputer yang
                                berdebu.
                            </p>
                            <p>
                                Oleh karena itu, StoryHub dibangun dari baris kode pertama untuk memangkas jarak antara
                                penulis berbakat dan pembaca setianya. Kami ingin menghilangkan hambatan teknis,
                                memberikan alat penulisan terbaik, dan memastikan setiap karya diperlakukan dengan penuh
                                penghargaan. Hari ini, kami telah berkembang dari sekadar platform menjadi rumah bagi
                                jutaan pencerita.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Our Team Section (4 Columns) -->
                <div class="pt-24 border-t border-slate-100">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
                        <div class="max-w-2xl">
                            <span
                                class="inline-block px-3 py-1 bg-blue-50 text-blue-600 font-extrabold uppercase tracking-widest text-xs rounded-lg mb-4">Orang
                                di Balik Layar</span>
                            <h2 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight">Kreator & Inovator
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                        <!-- Member 1 -->
                        <div class="group text-left">
                            <div class="relative w-full aspect-square mb-6 rounded-3xl overflow-hidden bg-slate-100">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                    alt="CEO Profile"
                                    class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                    <div class="flex gap-3 text-white">
                                        <a href="#" class="hover:text-amber-400 transition-colors"><i
                                                class="fa-brands fa-linkedin text-xl"></i></a>
                                        <a href="#" class="hover:text-amber-400 transition-colors"><i
                                                class="fa-brands fa-twitter text-xl"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900">Budi Santoso</h4>
                            <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mt-1">Founder & CEO</p>
                        </div>

                        <!-- Member 2 -->
                        <div class="group text-left">
                            <div class="relative w-full aspect-square mb-6 rounded-3xl overflow-hidden bg-slate-100">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                    alt="CTO Profile"
                                    class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                    <div class="flex gap-3 text-white">
                                        <a href="#" class="hover:text-indigo-400 transition-colors"><i
                                                class="fa-brands fa-linkedin text-xl"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900">Sarah Wijaya</h4>
                            <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mt-1">Chief Technology
                                Officer</p>
                        </div>

                        <!-- Member 3 -->
                        <div class="group text-left">
                            <div class="relative w-full aspect-square mb-6 rounded-3xl overflow-hidden bg-slate-100">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                    alt="Editor Profile"
                                    class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                    <div class="flex gap-3 text-white">
                                        <a href="#" class="hover:text-rose-400 transition-colors"><i
                                                class="fa-brands fa-linkedin text-xl"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900">Kevin Pratama</h4>
                            <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mt-1">Head of Editorial
                            </p>
                        </div>

                        <!-- Member 4 -->
                        <div class="group text-left">
                            <div class="relative w-full aspect-square mb-6 rounded-3xl overflow-hidden bg-slate-100">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                    alt="Designer Profile"
                                    class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                    <div class="flex gap-3 text-white">
                                        <a href="#" class="hover:text-emerald-400 transition-colors"><i
                                                class="fa-brands fa-linkedin text-xl"></i></a>
                                        <a href="#" class="hover:text-emerald-400 transition-colors"><i
                                                class="fa-brands fa-dribbble text-xl"></i></a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900">Amanda Putri</h4>
                            <p class="text-sm text-slate-500 font-bold uppercase tracking-wider mt-1">Lead Product
                                Designer</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.main>
