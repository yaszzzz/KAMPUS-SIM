@extends('layouts.admin')

@section('title', 'Edit Program Studi')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Edit Program Studi</h2>
        <p class="text-slate-500 text-sm">Perbarui informasi program studi</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <form action="{{ route('prodis.update', $prodi) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Kode & Jenjang Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode -->
                <div class="space-y-2">
                    <label for="kode" class="block text-sm font-medium text-slate-700">Kode Prodi</label>
                    <input type="text" name="kode" id="kode" value="{{ old('kode', $prodi->kode) }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder-slate-400 font-mono" required>
                </div>

                <!-- Jenjang -->
                <div class="space-y-2">
                    <label for="jenjang" class="block text-sm font-medium text-slate-700">Jenjang</label>
                    <div class="relative">
                        <select name="jenjang" id="jenjang" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all appearance-none bg-white text-slate-700 font-medium" required>
                            <option value="D3" {{ $prodi->jenjang == 'D3' ? 'selected' : '' }}>D3 (Diploma 3)</option>
                            <option value="S1" {{ $prodi->jenjang == 'S1' ? 'selected' : '' }}>S1 (Sarjana)</option>
                            <option value="S2" {{ $prodi->jenjang == 'S2' ? 'selected' : '' }}>S2 (Magister)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nama -->
            <div class="space-y-2">
                <label for="nama" class="block text-sm font-medium text-slate-700">Nama Program Studi</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $prodi->nama) }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder-slate-400" required>
            </div>

            <div class="pt-4 flex items-center gap-4 border-t border-slate-100 mt-6">
                <button type="submit" class="inline-flex justify-center items-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Perbarui Prodi
                </button>
                <a href="{{ route('prodis.index') }}" class="inline-flex justify-center items-center px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
