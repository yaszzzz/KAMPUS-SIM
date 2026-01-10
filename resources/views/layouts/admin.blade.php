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
                <!-- Left Side: Logo & Menu -->
                <div class="flex items-center gap-8 overflow-hidden">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg transform rotate-3">K</div>
                        <span class="font-bold text-2xl tracking-tight text-slate-900 hidden sm:block">Kampus<span class="text-indigo-600">SIM</span></span>
                    </div>

                    <!-- Menu (Visible on all screens) -->
                    <div class="flex items-center space-x-1 overflow-x-auto no-scrollbar pb-1 sm:pb-0">
                        <a href="{{ route('dashboard') }}" class="whitespace-nowrap px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('mahasiswas.index') }}" class="whitespace-nowrap px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('mahasiswas*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Mahasiswa
                        </a>
                        <a href="{{ route('prodis.index') }}" class="whitespace-nowrap px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('prodis*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Prodi
                        </a>
                        <a href="{{ route('mata-kuliah.index') }}" class="whitespace-nowrap px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('mata-kuliah*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            Mata Kuliah
                        </a>
                        <a href="{{ route('krs.index') }}" class="whitespace-nowrap px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('krs*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-indigo-600 hover:bg-slate-50' }}">
                            KRS Online
                        </a>
                    </div>
                </div>

                <!-- Right Side: Profile -->
                <div class="flex items-center gap-4 flex-shrink-0 bg-white pl-2">
                    <!-- Profile -->
                    <!-- Profile Dropdown -->
                    <div class="relative pl-4 border-l border-slate-200" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center focus:outline-none">
                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border-2 border-white shadow-sm hover:shadow-md transition-shadow">
                                <img class="w-full h-full rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Guest') }}&background=4f46e5&color=fff" alt="User">
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.outside="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-xl bg-white border border-slate-100 shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                             style="display: none;">
                            
                            <div class="p-4 border-b border-slate-50">
                                <p class="text-sm font-bold text-slate-900 dark:text-slate-800">{{ auth()->user()->name ?? 'Guest' }}</p>
                                <p class="text-xs text-slate-500 truncate mt-0.5">{{ auth()->user()->email ?? 'guest@kampus.ac.id' }}</p>
                            </div>
                            
                            <div class="p-2">
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
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
