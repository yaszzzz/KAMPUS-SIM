@extends('layouts.app')

@section('content')
<h1>Tambah Program Studi</h1>

<form action="{{ route('prodis.store') }}" method="POST">
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
        <label>Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('prodis.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
