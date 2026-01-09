@extends('layouts.app')

@section('content')
<h1>Edit Mahasiswa</h1>

<form action="{{ route('mahasiswas.update', $mahasiswa) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $mahasiswa->email }}" required>
    </div>
    <div class="mb-3">
        <label>Prodi</label>
        <select name="prodi_id" class="form-select" required>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ $mahasiswa->prodi_id == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama }} ({{ $prodi->jenjang }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Angkatan</label>
        <input type="number" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
