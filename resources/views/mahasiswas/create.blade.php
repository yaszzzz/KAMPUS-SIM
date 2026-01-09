@extends('layouts.app')

@section('content')
<h1>Tambah Mahasiswa</h1>

<form action="{{ route('mahasiswas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Prodi</label>
        <select name="prodi_id" class="form-select" required>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama }} ({{ $prodi->jenjang }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Angkatan</label>
        <input type="number" name="angkatan" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
