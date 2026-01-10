@extends('layouts.admin')

@section('title', '')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-black">Kelola Detail KRS</h2>
            <p class="text-black text-sm">Atur mata kuliah yang diambil mahasiswa</p>
        </div>
        
    </div>
    <div class="flex items-right gap-3 mb-4">
            <a href="{{ route('krs.index') }}" class="inline-flex justify-center items-center px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium rounded-lg transition-colors shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Student Info & Course List -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Student & Period Info Card -->
            <div class="bg-white mb-4 dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm p-8 transition-colors">
                <h3 class="font-bold text-lg text-black mb-6 pb-4 border-b border-slate-100 dark:border-slate-700">Informasi KRS</h3>
                <form action="{{ route('krs.update', $krs) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 ">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-black">Mahasiswa</label>
                            <input type="text" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400 font-medium" value="{{ $krs->mahasiswa->nama }} ({{ $krs->mahasiswa->nim }})" disabled>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="tahun_ajaran" class="block text-sm font-medium text-black">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all" value="{{ $krs->tahun_ajaran }}">
                        </div>

                         <div class="space-y-2">
                            <label for="semester" class="block text-sm font-medium text-black">Semester</label>
                            <div class="relative">
                                <select name="semester" id="semester" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all appearance-none">
                                    <option value="Ganjil" {{ $krs->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ $krs->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>
                        </div>

                         <div class="flex items-end">
                            <button type="submit" class="w-full px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                                Simpan Perubahan Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Taken Courses List -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden transition-colors">
                <div class="p-8 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-slate-50/50 dark:bg-slate-800/50">
                    <h3 class="font-bold text-lg text-black">Daftar Mata Kuliah Diambil</h3>
                    <span class="bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 px-3 py-1 rounded-full text-xs font-bold">Total SKS: {{ $krs->krsDetails->sum(function($detail) { return $detail->mataKuliah->sks; }) }}</span>
                </div>

                @if(session('error'))
                    <div class="m-8 mb-0 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 text-red-700 dark:text-red-300 font-medium">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-black">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400 font-bold uppercase text-xs tracking-wider border-b border-slate-200 dark:border-slate-700">
                            <tr>
                                <th class="px-8 py-5">Kode</th>
                                <th class="px-8 py-5">Mata Kuliah</th>
                                <th class="px-8 py-5 text-center">SKS</th>
                                <th class="px-8 py-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            @forelse($krs->krsDetails as $detail)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                                <td class="px-8 py-5 font-mono text-black">{{ $detail->mataKuliah->kode }}</td>
                                <td class="px-8 py-5 font-medium text-black">{{ $detail->mataKuliah->nama }}</td>
                                <td class="px-8 py-5 text-center">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 font-bold text-xs ring-1 ring-blue-100 dark:ring-blue-800">
                                        {{ $detail->mataKuliah->sks }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <form action="{{ route('krs-detail.destroy', $detail) }}" method="POST" onsubmit="return confirm('Hapus MK ini dari KRS?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 p-2 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-black">
                                    Belum ada mata kuliah yang diambil.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Column: Add Course Widget -->
        <div class="lg:col-span-1">
             <div class="bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm p-8 sticky top-24 transition-colors">
                <h3 class="font-bold text-lg text-black mb-6">Tambah Mata Kuliah</h3>
                <form action="{{ route('krs-detail.store', $krs) }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-black">Pilih Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 outline-none transition-all text-sm" size="10" required>
                            @foreach($mataKuliahs as $mk)
                                <option value="{{ $mk->id }}" class="py-2 px-2 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 rounded cursor-pointer border-b border-slate-50 dark:border-slate-700 last:border-0">
                                    {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-black mt-2">Pilih mata kuliah dari daftar di atas.</p>
                    </div>

                    <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none hover:shadow-indigo-300 dark:hover:shadow-indigo-900/30 transition-all transform hover:-translate-y-0.5">
                        Tambahkan ke KRS
                    </button>
                </form>
             </div>
        </div>
    </div>
</div>
@endsection
