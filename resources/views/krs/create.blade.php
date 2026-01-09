@extends('layouts.app')

@section('content')
<h1>Buat KRS Baru</h1>

<form action="{{ route('krs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Mahasiswa</label>
        <select name="mahasiswa_id" class="form-select" required>
            @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Tahun Ajaran</label>
        <input type="text" name="tahun_ajaran" class="form-control" placeholder="Ex: 2023/2024" required>
    </div>
    <div class="mb-3">
        <label>Semester</label>
        <select name="semester" class="form-select" required>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lanjut ke Detail</button>
    <a href="{{ route('krs.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
