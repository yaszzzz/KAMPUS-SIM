@extends('layouts.admin')

@section('title', 'KRS Online')

@section('content')
<div class="w-full p-8 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden transition-colors">
    <div class="p-6 mb-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-50/50">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Kartu Rencana Studi</h2>
            <p class="text-slate-500 text-sm">Kelola pengisian KRS mahasiswa</p>
        </div>

        <div class="flex items-center gap-4">
             <!-- Search Bar -->
             <div x-data="{ query: '{{ request('search') }}' }" class="relative">
                <button class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
                    <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search" class="w-5 h-5 text-gray-700">
                        <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <input 
                    class="input rounded-full px-6 py-2 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-md"
                    placeholder="Cari nama mahasiswa..." 
                    type="text" 
                    x-model="query" 
                    @input.debounce.500ms="window.location.href = '{{ route('krs.index') }}?search=' + query"
                />
                <button type="button" @click="query = ''; window.location.href = '{{ route('krs.index') }}'" class="absolute right-3 -translate-y-1/2 top-1/2 p-1" x-show="query.length > 0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <a href="{{ route('krs.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat KRS Baru
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-500 font-bold uppercase text-xs tracking-wider border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 w-16">No</th>
                    <th class="px-6 py-4">Mahasiswa</th>
                    <th class="px-6 py-4 text-center">Tahun Ajaran</th>
                    <th class="px-6 py-4 text-center">Semester</th>
                    <th class="px-6 py-4 text-center">Total MK</th>
                    <th class="px-6 py-4 text-center w-56">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($krsData as $krs)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold text-xs uppercase">
                                {{ substr($krs->mahasiswa->nama, 0, 2) }}
                            </div>
                            <div>
                                <div class="font-bold text-slate-800">{{ $krs->mahasiswa->nama }}</div>
                                <div class="text-xs text-slate-500 font-mono">{{ $krs->mahasiswa->nim }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">
                            {{ $krs->tahun_ajaran }}
                        </span>
                    </td>
                     <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">
                            Semester {{ $krs->semester }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 text-blue-700 font-bold text-xs ring-1 ring-blue-100">
                             {{ $krs->krsDetails->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('krs.edit', $krs) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 rounded-lg text-xs font-medium transition-colors">
                                Detail
                            </a>
                            <a href="{{ route('krs.print', $krs) }}" target="_blank" class="p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-colors" title="Cetak">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                            </a>
                            <form action="{{ route('krs.destroy', $krs) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                        <p class="text-lg font-medium">Belum ada data KRS</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
