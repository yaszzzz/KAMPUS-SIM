@extends('layouts.admin')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="w-full p-8 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden transition-colors"
     x-data="{ 
        open: false, 
        isEditing: false, 
        form: { id: null, nim: '', nama: '', email: '', angkatan: '', prodi_id: '' },
        openModal(edit = false, data = null) {
            this.isEditing = edit;
            if (edit && data) {
                this.form.id = data.id;
                this.form.nim = data.nim;
                this.form.nama = data.nama;
                this.form.email = data.email;
                this.form.angkatan = data.angkatan;
                this.form.prodi_id = data.prodi_id;
            } else {
                this.form.id = null;
                this.form.nim = '';
                this.form.nama = '';
                this.form.email = '';
                this.form.angkatan = '';
                this.form.prodi_id = '';
            }
            this.open = true;
        }
     }">
    <div class="p-6 mb-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-50/50 dark:bg-slate-800/50">
        <div>
            <h2 class="text-xl font-bold text-black">Data Mahasiswa</h2>
            <p class="text-black text-sm">Kelola informasi mahasiswa terdaftar</p>
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
                    class="input rounded-full px-5 py-2 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-md"
                    placeholder="Cari nama mahasiswa..." 
                    type="text" 
                    x-model="query" 
                    @input.debounce.500ms="window.location.href = '{{ route('mahasiswas.index') }}?search=' + query"
                />
            </div>

            <button @click="openModal(false)" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Mahasiswa
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-black">
            <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400 font-bold uppercase text-xs tracking-wider border-b border-slate-200 dark:border-slate-700">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">NIM</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4 text-center">Prodi</th>
                    <th class="px-6 py-4 text-center">Angkatan</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @forelse($mahasiswas as $mhs)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-black">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-mono text-black">{{ $mhs->nim }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-bold text-xs uppercase">
                                {{ substr($mhs->nama, 0, 2) }}
                            </div>
                            <span class="font-medium text-black">{{ $mhs->nama }}</span>
                        </div>
                        <div class="text-xs text-slate-400 mt-1 pl-11">{{ $mhs->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-500 border border-blue-100 dark:border-blue-800">
                            {{ $mhs->prodi->nama }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-slate-600 dark:text-slate-300 font-medium">{{ $mhs->angkatan }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button @click="openModal(true, {{ $mhs->toJson() }})" class="p-2 text-amber-500 hover:text-amber-700 dark:hover:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/30 rounded-lg transition-colors" title="Edit">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <form action="{{ route('mahasiswas.destroy', $mhs) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:text-red-700 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-colors" title="Hapus">
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
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 mb-4 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="text-lg font-medium">Belum ada data mahasiswa</p>
                            <p class="text-sm mt-1">Silakan tambahkan data baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination if needed -->
    <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-700/50 text-xs text-slate-500 dark:text-slate-400">
        Menampilkan {{ $mahasiswas->count() }} data
    </div>

    <!-- Modal Form -->
    <div x-show="open" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <!-- Backdrop -->
        <div x-show="open" 
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" 
             @click="open = false"></div>

        <div class="flex min-h-screen items-center justify-center p-4">
            <div x-show="open" 
                 x-transition:enter="ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="relative w-full max-w-md bg-white rounded-xl shadow-2xl ring-1 ring-slate-900/5">
                
                <form :action="isEditing ? '{{ url('mahasiswas') }}/' + form.id : '{{ route('mahasiswas.store') }}'" method="POST">
                    @csrf
                    <template x-if="isEditing">
                        <input type="hidden" name="_method" value="PUT">
                    </template>
                    
                    <!-- Header -->
                    <div class="px-5 py-4 border-b border-slate-100">
                        <h3 class="text-base font-semibold text-slate-800" x-text="isEditing ? 'Edit Mahasiswa' : 'Tambah Mahasiswa'"></h3>
                    </div>

                    <!-- Body -->
                    <div class="px-5 py-4 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">NIM</label>
                                <input type="text" name="nim" x-model="form.nim" class="w-full px-3 py-1.5 text-sm rounded-md border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all" required placeholder="2023001">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Angkatan</label>
                                <input type="number" name="angkatan" x-model="form.angkatan" class="w-full px-3 py-1.5 text-sm rounded-md border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all" required placeholder="2023">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama" x-model="form.nama" class="w-full px-3 py-1.5 text-sm rounded-md border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all" required placeholder="Nama mahasiswa">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                            <input type="email" name="email" x-model="form.email" class="w-full px-3 py-1.5 text-sm rounded-md border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all" required placeholder="mahasiswa@kampus.ac.id">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Program Studi</label>
                            <select name="prodi_id" x-model="form.prodi_id" class="w-full px-3 py-1.5 text-sm rounded-md border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition-all bg-white" required>
                                <option value="" disabled>Pilih Prodi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->nama }} ({{ $prodi->jenjang }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-5 py-3 bg-slate-50 border-t border-slate-100 flex justify-end gap-2 rounded-b-xl">
                        <button type="button" @click="open = false" class="px-3 py-1.5 text-sm font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100 rounded-md transition-colors">Batal</button>
                        <button type="submit" class="px-4 py-1.5 text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition-colors shadow-sm" x-text="isEditing ? 'Simpan' : 'Tambah'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
