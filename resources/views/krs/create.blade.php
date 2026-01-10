@extends('layouts.admin')

@section('title', 'Buat KRS Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Buat KRS Baru</h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Mulai pengisian KRS untuk mahasiswa</p>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm p-8 transition-colors">
        <form action="{{ route('krs.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Mahasiswa -->
            <div class="space-y-2">
                <label for="mahasiswa_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Mahasiswa</label>
                <div class="relative">
                    <select name="mahasiswa_id" id="mahasiswa_id" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all appearance-none bg-white dark:bg-slate-900 text-slate-700 dark:text-white" required>
                        <option value="" disabled selected>Pilih Mahasiswa</option>
                        @foreach($mahasiswas as $mhs)
                            <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500 dark:text-slate-400">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tahun Ajaran -->
                <div class="space-y-2">
                    <label for="tahun_ajaran" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500" required placeholder="Contoh: 2023/2024">
                </div>

                <!-- Semester -->
                <div class="space-y-2">
                    <label for="semester" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Semester</label>
                    <div class="relative">
                        <select name="semester" id="semester" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all appearance-none bg-white dark:bg-slate-900 text-slate-700 dark:text-white" required>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500 dark:text-slate-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex items-center gap-4 border-t border-slate-100 dark:border-slate-700 mt-6 transition-colors">
                <button type="submit" class="inline-flex justify-center items-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                    Lanjut ke Detail
                    <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <a href="{{ route('krs.index') }}" class="inline-flex justify-center items-center px-6 py-2.5 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
