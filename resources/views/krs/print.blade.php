<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak KRS</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h2>KARTU RENCANA STUDI (KRS)</h2>
        <p>{{ $krs->tahun_ajaran }} - Semester {{ $krs->semester }}</p>
    </div>

    <table>
        <tr>
            <td style="border:none; width: 150px;">NIM</td>
            <td style="border:none;">: {{ $krs->mahasiswa->nim }}</td>
        </tr>
        <tr>
            <td style="border:none;">Nama</td>
            <td style="border:none;">: {{ $krs->mahasiswa->nama }}</td>
        </tr>
        <tr>
            <td style="border:none;">Prodi</td>
            <td style="border:none;">: {{ $krs->mahasiswa->prodi->nama }} ({{ $krs->mahasiswa->prodi->jenjang }})</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @php $totalSks = 0; @endphp
            @foreach($krs->krsDetails as $detail)
            @php $totalSks += $detail->mataKuliah->sks; @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->mataKuliah->kode }}</td>
                <td>{{ $detail->mataKuliah->nama }}</td>
                <td>{{ $detail->mataKuliah->sks }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right; font-weight: bold;">Total SKS</td>
                <td style="font-weight: bold;">{{ $totalSks }}</td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 50px; text-align: right; margin-right: 50px;">
        <p>Jakarta, {{ date('d F Y') }}</p>
        <br><br><br>
        <p>(__________________)</p>
        <p>Dosen Pembimbing</p>
    </div>
</body>
</html>
