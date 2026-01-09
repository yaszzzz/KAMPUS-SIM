@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mataKuliahs as $mk)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mk->kode }}</td>
            <td>{{ $mk->nama }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->semester }}</td>
            <td>{{ $mk->prodi->nama }}</td>
            <td>
                <a href="{{ route('mata-kuliah.edit', $mk) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('mata-kuliah.destroy', $mk) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
