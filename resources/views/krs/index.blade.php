@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data KRS</h1>
    <a href="{{ route('krs.create') }}" class="btn btn-primary">Buat KRS Baru</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Jml MK</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krsData as $krs)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $krs->mahasiswa->nim }}</td>
            <td>{{ $krs->mahasiswa->nama }}</td>
            <td>{{ $krs->tahun_ajaran }}</td>
            <td>{{ $krs->semester }}</td>
            <td>{{ $krs->krsDetails->count() }}</td>
            <td>
                <a href="{{ route('krs.edit', $krs) }}" class="btn btn-sm btn-info">Detail / Edit</a>
                <a href="{{ route('krs.print', $krs) }}" target="_blank" class="btn btn-sm btn-secondary">Cetak</a>
                <form action="{{ route('krs.destroy', $krs) }}" method="POST" class="d-inline">
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
