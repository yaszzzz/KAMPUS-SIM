@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        <!-- Stat Card: Mahasiswa -->
        <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">+Active</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 mb-1">{{ $mahasiswaCount }}</div>
            <div class="text-sm text-slate-500 font-medium">Total Mahasiswa</div>
        </div>

        <!-- Stat Card: Prodi -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">+Stable</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 mb-1">{{ $prodiCount }}</div>
            <div class="text-sm text-slate-500 font-medium">Program Studi</div>
        </div>

        <!-- Stat Card: KRS -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-slate-500 bg-slate-50 px-2 py-1 rounded-full">Submitted</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 mb-1">{{ $krsCount }}</div>
            <div class="text-sm text-slate-500 font-medium">KRS Terisi</div>
        </div>

        <!-- Stat Card: Mata Kuliah -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-slate-500 bg-slate-50 px-2 py-1 rounded-full">Available</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 mb-1">{{ $mataKuliahCount }}</div>
            <div class="text-sm text-slate-500 font-medium">Mata Kuliah</div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <h3 class="font-bold text-lg text-slate-800">Aktivitas Terbaru</h3>
            <span class="text-xs text-slate-500 bg-white px-3 py-1 rounded-full border border-slate-200">Real-time Log</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-medium uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4 tracking-wider">Mahasiswa</th>
                        <th class="px-6 py-4 tracking-wider">Aktivitas</th>
                        <th class="px-6 py-4 tracking-wider text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Placeholder data for illustration, can be replaced with real logs later -->
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-900 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-xs font-bold">SY</div>
                            System Admin
                        </td>
                        <td class="px-6 py-4">System Initialized</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                Active
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Welcome Widget -->
        <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-2xl p-8 text-white relative overflow-hidden shadow-lg group">
            <div class="relative z-10">
                <h3 class="text-2xl font-bold mb-2">Selamat Datang di Kampus SIM</h3>
                <p class="text-indigo-100 mb-6 max-w-sm">Kelola semua data akademik dengan mudah, cepat, dan efisien. Dashboard ini menampilkan data terkini dari sistem.</p>
                <div class="flex gap-3">
                    <button class="bg-white text-indigo-700 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors shadow-md">
                        Mulai Panduan
                    </button>
                    <!-- Small indicator of real data -->
                    <div class="flex items-center gap-2 px-4 py-3 rounded-lg bg-indigo-900/50 border border-indigo-400/30 text-xs font-mono text-indigo-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        LIVE DATA
                    </div>
                </div>
            </div>
            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-700"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-purple-500/20 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-700"></div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('mahasiswas.create') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-200 hover:shadow-md transition-all flex flex-col items-center justify-center gap-3 group text-center h-full">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                </div>
                <span class="font-bold text-slate-700 group-hover:text-emerald-700">Tambah Mahasiswa</span>
                </a>
                <a href="{{ route('krs.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-indigo-200 hover:shadow-md transition-all flex flex-col items-center justify-center gap-3 group text-center h-full">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                </div>
                <span class="font-bold text-slate-700 group-hover:text-blue-700">Kelola KRS</span>
                </a>
        </div>
    </div>
@endsection
