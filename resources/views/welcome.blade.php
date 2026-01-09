<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h1 class="mb-4">Sistem Informasi Kampus (UAS)</h1>
        <div class="card p-4 shadow-sm" style="max-width: 500px; width: 100%;">
            <div class="d-grid gap-3">
                <a href="{{ route('prodis.index') }}" class="btn btn-primary btn-lg">Kelola Data Prodi</a>
                <a href="{{ route('mata-kuliah.index') }}" class="btn btn-success btn-lg">Kelola Mata Kuliah</a>
                <a href="{{ route('mahasiswas.index') }}" class="btn btn-info btn-lg">Kelola Mahasiswa</a>
                <a href="{{ route('krs.index') }}" class="btn btn-warning btn-lg">Kelola KRS / Transaksi</a>
            </div>
        </div>
    </div>
</body>
</html>
