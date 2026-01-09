@extends('layouts.app')

@section('content')
<h1>Kelola KRS</h1>

<div class="card mb-4">
    <div class="card-header">Info Mahasiswa</div>
    <div class="card-body">
        <form action="{{ route('krs.update', $krs) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-4">
                <label class="form-label">Mahasiswa</label>
                <input type="text" class="form-control" value="{{ $krs->mahasiswa->nama }} ({{ $krs->mahasiswa->nim }})" disabled>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="{{ $krs->tahun_ajaran }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Semester</label>
                <select name="semester" class="form-select">
                    <option value="Ganjil" {{ $krs->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                    <option value="Genap" {{ $krs->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100">Update Info</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <h3>Daftar Mata Kuliah Diambil</h3>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $totalSks = 0; @endphp
                @foreach($krs->krsDetails as $detail)
                @php $totalSks += $detail->mataKuliah->sks; @endphp
                <tr>
                    <td>{{ $detail->mataKuliah->kode }}</td>
                    <td>{{ $detail->mataKuliah->nama }}</td>
                    <td>{{ $detail->mataKuliah->sks }}</td>
                    <td>
                        <form action="{{ route('krs-detail.destroy', $detail) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus MK ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-end fw-bold">Total SKS</td>
                    <td colspan="2" class="fw-bold">{{ $totalSks }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="col-md-4">
        <h3>Tambah Mata Kuliah</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('krs-detail.store', $krs) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Pilih Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-select" required>
                            <option value="">-- Pilih MK --</option>
                            @foreach($mataKuliahs as $mk)
                                <option value="{{ $mk->id }}">
                                    {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS) - Sem {{ $mk->semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
