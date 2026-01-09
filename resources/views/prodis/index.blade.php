@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Program Studi</h1>
    <a href="{{ route('prodis.create') }}" class="btn btn-primary">Tambah Prodi</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jenjang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prodis as $prodi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $prodi->kode }}</td>
            <td>{{ $prodi->nama }}</td>
            <td>{{ $prodi->jenjang }}</td>
            <td>
                <a href="{{ route('prodis.edit', $prodi) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('prodis.destroy', $prodi) }}" method="POST" class="d-inline">
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
