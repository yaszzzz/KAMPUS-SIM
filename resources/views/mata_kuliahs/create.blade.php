@extends('layouts.app')

@section('content')
<h1>Tambah Mata Kuliah</h1>

<form action="{{ route('mata-kuliah.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Prodi</label>
        <select name="prodi_id" class="form-select" required>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama }} ({{ $prodi->jenjang }})</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
