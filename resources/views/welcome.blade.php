<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Kampus | Modern Campus</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="antialiased bg-slate-50 text-slate-800" x-data="{ showLoginModal: false, showRegisterModal: false }">

    <!-- 1. Header / Navigation Bar -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300 glass-nav shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg transform rotate-3">
                        K
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-slate-900">Kampus<span class="text-indigo-600">SIM</span></span>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Home</a>
                    <a href="#features" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Fitur</a>
                    <a href="#about" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Tentang</a>
                    <a href="#news" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Berita</a>
                    <a href="#contact" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Kontak</a>
                </nav>

                <!-- Auth Buttons & Search -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="text-slate-500 hover:text-indigo-600 transition-colors p-2 rounded-full hover:bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <div class="h-6 w-px bg-slate-200"></div>
                    @if (Route::has('login'))
                        @auth
                             <a href="{{ url('/mahasiswas') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" @click.prevent="showLoginModal = true" class="font-medium text-slate-600 hover:text-indigo-600 transition-colors">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" @click.prevent="showRegisterModal = true" class="px-5 py-2.5 rounded-full bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 hover:text-slate-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>


    <!-- 3. Hero Section -->
    <div class="relative pt-20 pb-16 md:pt-32 md:pb-24 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-bg.png') }}" class="w-full h-full object-cover" alt="Kampus Background">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 to-slate-900/40"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="max-w-2xl text-white pt-10">
                <div class="inline-flex items-center px-3 py-1 rounded-full border border-indigo-400/30 bg-indigo-900/50 text-indigo-300 text-sm font-medium mb-6 backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-indigo-400 mr-2 animate-pulse"></span>
                    Penerimaan Mahasiswa Baru 2026 Dibuka
                </div>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 tracking-tight">
                    Masa Depan Cerah Dimulai Di Sini
                </h1>
                <p class="text-lg md:text-xl text-slate-200 mb-8 leading-relaxed">
                    Bergabunglah dengan komunitas akademik yang inovatif dan berprestasi. Sistem Informasi Kampus terintegrasi untuk memudahkan perjalanan studi Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="px-8 py-4 rounded-full bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition-all shadow-lg hover:shadow-indigo-500/30 text-center">
                        Daftar Sekarang
                    </a>
                    <a href="#about" class="px-8 py-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white font-semibold hover:bg-white/20 transition-all text-center">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 mt-12 border-t border-white/10 pt-8">
                    <div>
                        <div class="text-3xl font-bold text-white">15+</div>
                        <div class="text-sm text-slate-300">Program Studi</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-white">5k+</div>
                        <div class="text-sm text-slate-300">Mahasiswa Aktif</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-white">98%</div>
                        <div class="text-sm text-slate-300">Lulusan Bekerja</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Main Content - Features -->
    <section id="features" class="py-20 bg-white-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-indigo-600 font-semibold tracking-wide uppercase text-sm mb-2">Fitur Unggulan</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Semua Kebutuhan Akademik Dalam Satu Genggaman</h3>
                <p class="text-slate-600 text-lg">Platform terintegrasi yang memudahkan dosen, mahasiswa, dan staf dalam mengelola aktivitas akademik sehari-hari.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Manajemen Prodi</h4>
                    <p class="text-slate-600">Kelola data program studi dengan mudah dan terstruktur untuk akreditasi yang lebih baik.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">KRS Online</h4>
                    <p class="text-slate-600">Pengisian Kartu Rencana Studi secara online yang cepat, fleksibel, dan terintegrasi jadwal.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Portal Mahasiswa</h4>
                    <p class="text-slate-600">Akses nilai, jadwal kuliah, dan informasi akademik lainnya dalam satu dashboard personal.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group p-8 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Laporan & Transkrip</h4>
                    <p class="text-slate-600">Cetak hasil studi dan transkrip nilai secara otomatis dengan format standar akademik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Main Content - About Section with Image -->
    <section id="about" class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2 relative">
                    <div class="absolute -top-4 -left-4 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                    <div class="absolute -bottom-8 -right-4 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                    
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/meeting.png') }}" alt="Students collaborating" class="w-full h-auto">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-8">
                            <p class="text-white font-medium">"Lingkungan belajar yang mendukung inovasi"</p>
                        </div>
                    </div>
                </div>  
                
                <div class="lg:w-1/2">
                    <h2 class="text-indigo-600 font-semibold tracking-wide uppercase text-sm mb-2">Tentang Kami</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">Membangun Generasi Emas Melalui Pendidikan Berkualitas</h3>
                    <p class="text-slate-600 text-lg mb-6 leading-relaxed">
                        Kampus SIM didirikan dengan visi untuk menjadi pusat keunggulan dalam pendidikan tinggi. Kami berkomitmen menyediakan fasilitas terbaik dan kurikulum yang relevan dengan kebutuhan industri masa depan.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-emerald-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-700">Kurikulum Berbasis Kompetensi</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-emerald-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-700">Fasilitas Laboratorium Modern</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-emerald-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-slate-700">Dosen Praktisi & Akademisi Terbaik</span>
                        </li>
                    </ul>
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 inline-flex items-center group">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
     <!-- 6. Call To Action (CTA) Section -->
    <section class="py-20 relative bg-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Siap Memulai Perjalanan Anda?</h2>
            <p class="text-indigo-200 text-xl max-w-2xl mx-auto mb-10">
                Jangan lewatkan kesempatan untuk bergabung dengan ribuan mahasiswa berprestasi lainnya.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ Route::has('register') ? route('register') : '#' }}" class="px-8 py-4 rounded-full bg-white text-indigo-900 font-bold hover:bg-slate-100 transition-colors shadow-lg">
                    Daftar Sekarang
                </a>
                <a href="#contact" class="px-8 py-4 rounded-full bg-transparent border border-indigo-400 text-white font-semibold hover:bg-indigo-800 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- 7. Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-8">
                <!-- Column 1: Identity -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center text-white font-bold">K</div>
                        <span class="text-white font-bold text-xl">Kampus<span class="text-indigo-500">SIM</span></span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4">
                        Sistem Informasi Manajemen Kampus terpadu untuk efisiensi dan keunggulan akademik.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><span class="sr-only">Facebook</span>FB</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><span class="sr-only">Twitter</span>TW</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><span class="sr-only">Instagram</span>IG</a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4 uppercase text-sm tracking-wider">Akses Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Fakultas</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Pendaftaran</a></li>
                    </ul>
                </div>

                <!-- Column 3: Resource -->
                <div>
                    <h3 class="text-white font-semibold mb-4 uppercase text-sm tracking-wider">Layanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Portal Mahasiswa</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">E-Library</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Jurnal Akademik</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Kalender Akademik</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div id="contact">
                    <h3 class="text-white font-semibold mb-4 uppercase text-sm tracking-wider">Hubungi Kami</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-indigo-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Jl. Pendidikan No. 123, Kota Pelajar, Indonesia 54321</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@kampussim.ac.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
                <p>&copy; 2026 Kampus SIM. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Login Modal -->
    <div x-show="showLoginModal" 
         style="display: none;"
         class="fixed inset-0 z-[100] overflow-y-auto" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        
        <!-- Backdrop -->
        <div x-show="showLoginModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity" 
             @click="showLoginModal = false"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Panel -->
            <div x-show="showLoginModal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-slate-100">
                
                <!-- Close Button -->
                <button @click="showLoginModal = false" class="absolute right-4 top-4 text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="px-8 py-8">
                    <div class="text-center mb-8">
                        <div class="mx-auto w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4 text-xl font-bold">
                            K
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Selamat Datang</h3>
                        <p class="text-slate-500 mt-2">Silakan masuk ke akun Anda</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email / NIM</label>
                            <input type="email" name="email" id="email" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border" placeholder="nama@kampus.ac.id">
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Lupa password?</a>
                                @endif
                            </div>
                            <input type="password" name="password" id="password" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border" placeholder="••••••••">
                        </div>

                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all hover:shadow-lg">
                            Masuk Sekarang
                        </button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        Belum punya akun? 
                        <a href="#" @click.prevent="showLoginModal = false; showRegisterModal = true" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar di sini</a>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 text-center text-xs text-slate-400">
                    &copy; 2026 Kampus SIM. Secure Access.
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div x-show="showRegisterModal" 
         style="display: none;"
         class="fixed inset-0 z-[100] overflow-y-auto" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        
        <!-- Backdrop -->
        <div x-show="showRegisterModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity" 
             @click="showRegisterModal = false"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Panel -->
            <div x-show="showRegisterModal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-slate-100">
                
                <!-- Close Button -->
                <button @click="showRegisterModal = false" class="absolute right-4 top-4 text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="px-8 py-8">
                    <div class="text-center mb-6">
                        <div class="mx-auto w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900">Buat Akun Baru</h3>
                        <p class="text-slate-500 mt-1 text-sm">Daftarkan diri untuk mengakses sistem</p>
                    </div>

                    <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="reg_name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" id="reg_name" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border text-sm" placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label for="reg_email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                            <input type="email" name="email" id="reg_email" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border text-sm" placeholder="nama@kampus.ac.id">
                        </div>

                        <div>
                            <label for="reg_password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                            <input type="password" name="password" id="reg_password" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border text-sm" placeholder="Minimal 8 karakter">
                        </div>

                        <div>
                            <label for="reg_password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="reg_password_confirmation" required class="block w-full rounded-lg border-slate-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border text-sm" placeholder="Ulangi password">
                        </div>

                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all hover:shadow-lg mt-2">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500">
                        Sudah punya akun? 
                        <a href="#" @click.prevent="showRegisterModal = false; showLoginModal = true" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk di sini</a>
                    </div>
                </div>
                
                <div class="bg-slate-50 px-8 py-4 border-t border-slate-100 text-center text-xs text-slate-400">
                    &copy; 2026 Kampus SIM. Secure Registration.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
