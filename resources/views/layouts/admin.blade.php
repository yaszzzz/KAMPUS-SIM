<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Kampus SIM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased transition-colors duration-300" x-data="{ mobileMenuOpen: false }">

    <!-- Top Navigation Bar -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Left Side: Logo & Desktop Menu -->
                <div class="flex items-center gap-8">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg transform rotate-3">K</div>
                        <span class="font-bold text-2xl tracking-tight text-slate-900">Kampus<span class="text-indigo-600">SIM</span></span>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex space-x-1">
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('mahasiswas.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('mahasiswas*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Mahasiswa
                        </a>
                        <a href="{{ route('prodis.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('prodis*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Prodi
                        </a>
                        <a href="{{ route('mata-kuliah.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('mata-kuliah*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Mata Kuliah
                        </a>
                        <a href="{{ route('krs.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('krs*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            KRS Online
                        </a>
                    </div>
                </div>

                <!-- Right Side: Profile & Mobile Button -->
                <div class="flex items-center gap-4">
                    
                    <!-- Desktop Profile -->
                    <div class="hidden lg:flex items-center gap-3 pl-4 border-l border-slate-200">
                        <div class="text-right hidden xl:block">
                            <p class="text-sm font-semibold text-slate-900">Administrator</p>
                            <p class="text-xs text-slate-500">admin@kampus.ac.id</p>
                        </div>
                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border-2 border-white shadow-sm">
                            <img class="w-full h-full rounded-full object-cover" src="https://ui-avatars.com/api/?name=Admin+Kampus&background=4f46e5&color=fff" alt="User">
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex items-center lg:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-indigo-600 hover:bg-slate-100 focus:outline-none transition-colors">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Dropdown) -->
        <div x-show="mobileMenuOpen" x-collapse class="lg:hidden border-t border-slate-200 bg-white shadow-lg">
            <div class="pt-2 pb-3 space-y-1 px-4">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    Dashboard
                </a>
                <a href="{{ route('mahasiswas.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('mahasiswas*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    Mahasiswa
                </a>
                <a href="{{ route('prodis.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('prodis*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    Program Studi
                </a>
                <a href="{{ route('mata-kuliah.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('mata-kuliah*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    Mata Kuliah
                </a>
                <a href="{{ route('krs.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('krs*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                    KRS Online
                </a>
            </div>
            <!-- Mobile Profile -->
            <div class="pt-4 pb-4 border-t border-slate-200 px-4">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin+Kampus&background=4f46e5&color=fff" alt="">
                    </div>
                    <div>
                        <div class="text-base font-medium text-slate-800">Administrator</div>
                        <div class="text-sm font-medium text-slate-500">admin@kampus.ac.id</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12 min-h-screen">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3 shadow-sm" role="alert">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">@yield('title', 'Dashboard')</h1>
        </div>

        @yield('content')
    </main>

</body>
</html>
