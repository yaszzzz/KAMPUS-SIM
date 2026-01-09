@extends('layouts.app')

@section('content')
<h1>Edit Program Studi</h1>

<form action="{{ route('prodis.update', $prodi) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" value="{{ $prodi->kode }}" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $prodi->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="D3" {{ $prodi->jenjang == 'D3' ? 'selected' : '' }}>D3</option>
            <option value="S1" {{ $prodi->jenjang == 'S1' ? 'selected' : '' }}>S1</option>
            <option value="S2" {{ $prodi->jenjang == 'S2' ? 'selected' : '' }}>S2</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('prodis.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
