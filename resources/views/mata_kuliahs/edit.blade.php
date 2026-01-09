@extends('layouts.app')

@section('content')
<h1>Edit Mata Kuliah</h1>

<form action="{{ route('mata-kuliah.update', $mataKuliah) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" value="{{ $mataKuliah->kode }}" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $mataKuliah->nama }}" required>
    </div>
    <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks" class="form-control" value="{{ $mataKuliah->sks }}" required>
    </div>
    <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester" class="form-control" value="{{ $mataKuliah->semester }}" required>
    </div>
    <div class="mb-3">
        <label>Prodi</label>
        <select name="prodi_id" class="form-select" required>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ $mataKuliah->prodi_id == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama }} ({{ $prodi->jenjang }})
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
