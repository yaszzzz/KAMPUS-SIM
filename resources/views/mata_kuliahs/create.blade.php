@extends('layouts.admin')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-white">Tambah Mata Kuliah</h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Masukkan detail mata kuliah baru</p>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm p-8 transition-colors">
        <form action="{{ route('mata-kuliah.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode -->
                <div class="space-y-2">
                    <label for="kode" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Kode MK</label>
                    <input type="text" name="kode" id="kode" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500 font-mono" required placeholder="Contoh: IF101">
                </div>

                <!-- Prodi -->
                <div class="space-y-2">
                    <label for="prodi_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Program Studi</label>
                    <div class="relative">
                        <select name="prodi_id" id="prodi_id" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all appearance-none bg-white dark:bg-slate-900 text-slate-700 dark:text-white" required>
                            <option value="" disabled selected>Pilih Program Studi</option>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }} ({{ $prodi->jenjang }})</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500 dark:text-slate-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nama -->
            <div class="space-y-2">
                <label for="nama" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Nama Mata Kuliah</label>
                <input type="text" name="nama" id="nama" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500" required placeholder="Contoh: Algoritma dan Pemrograman">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- SKS -->
                <div class="space-y-2">
                    <label for="sks" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Jumlah SKS</label>
                    <input type="number" name="sks" id="sks" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500" required min="1" max="6">
                </div>

                <!-- Semester -->
                <div class="space-y-2">
                    <label for="semester" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Semester</label>
                    <input type="number" name="semester" id="semester" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-800 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500" required min="1" max="8">
                </div>
            </div>

            <div class="pt-4 flex items-center gap-4 border-t border-slate-100 dark:border-slate-700 mt-6 transition-colors">
                <button type="submit" class="inline-flex justify-center items-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan MK
                </button>
                <a href="{{ route('mata-kuliah.index') }}" class="inline-flex justify-center items-center px-6 py-2.5 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 font-medium rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
