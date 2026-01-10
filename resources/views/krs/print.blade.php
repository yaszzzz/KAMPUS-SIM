<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cetak KRS</title>

  <style>
    :root{
      --text:#111827;
      --muted:#6b7280;
      --line:#d1d5db;
      --line2:#e5e7eb;
      --bg:#f9fafb;
      --head:#111827;
    }

    *{ box-sizing:border-box; }
    body{
      font-family: "Segoe UI", Arial, sans-serif;
      color: var(--text);
      margin: 0;
      background: #fff;
    }

    /* Area kertas */
    .sheet{
      width: 210mm;           /* A4 */
      min-height: 297mm;
      margin: 0 auto;
      padding: 14mm 14mm 16mm;
    }

    /* Header / Kop */
    .topbar{
      display: flex;
      align-items: center;
      gap: 14px;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--head);
    }
    .logo{
      width: 54px; height: 54px;
      border: 1px solid var(--line);
      border-radius: 10px;
      display:flex; align-items:center; justify-content:center;
      font-size: 10px; color: var(--muted);
    }
    .brand{
      flex:1;
      line-height: 1.25;
    }
    .brand .campus{
      font-weight: 800;
      letter-spacing: .2px;
      font-size: 14px;
      text-transform: uppercase;
    }
    .brand .addr{
      font-size: 11px;
      color: var(--muted);
    }
    .doc-meta{
      text-align:right;
      font-size: 11px;
      color: var(--muted);
      line-height: 1.4;
      white-space: nowrap;
    }

    /* Judul */
    .title{
      text-align:center;
      margin: 16px 0 10px;
    }
    .title h2{
      margin: 0;
      font-size: 18px;
      letter-spacing: .3px;
    }
    .title .sub{
      margin-top: 4px;
      font-size: 12px;
      color: var(--muted);
    }

    /* Identitas */
    .card{
      margin-top: 12px;
      border: 1px solid var(--line);
      border-radius: 12px;
      padding: 12px 14px;
      background: var(--bg);
    }
    .grid{
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px 18px;
      font-size: 12px;
    }
    .field{
      display:flex;
      gap: 8px;
      align-items:flex-start;
    }
    .label{
      width: 90px;
      color: var(--muted);
    }
    .value{
      flex:1;
      font-weight: 600;
      color: var(--text);
    }

    /* Tabel */
    table{
      width: 100%;
      border-collapse: collapse;
      margin-top: 14px;
      font-size: 12px;
      border: 1px solid var(--line);
      border-radius: 12px;
      overflow: hidden; /* biar radius kepakai */
    }
    thead th{
      background: #111827;
      color: #fff;
      text-align: left;
      padding: 10px 10px;
      font-weight: 700;
    }
    tbody td{
      border-top: 1px solid var(--line2);
      padding: 9px 10px;
      vertical-align: top;
    }
    tbody tr:nth-child(even){
      background: #f8fafc;
    }
    .col-no{ width: 44px; text-align:center; }
    .col-kode{ width: 95px; }
    .col-sks{ width: 60px; text-align:center; }
    .total-row td{
      background: #f3f4f6 !important;
      font-weight: 800;
    }
    .total-row td:nth-child(1){
      text-align:right;
    }

    /* Tanda tangan */
    .sign{
      margin-top: 26px;
      display:flex;
      justify-content:flex-end;
    }
    .sign-box{
      width: 260px;
      text-align:center;
      font-size: 12px;
      color: var(--text);
    }
    .sign-box .date{
      text-align:right;
      color: var(--muted);
      margin-bottom: 44px;
    }
    .line{
      margin: 0 auto;
      height: 0;
      border-top: 1px solid var(--line);
      width: 100%;
    }
    .sign-name{
      margin-top: 8px;
      font-weight: 700;
    }
    .sign-role{
      margin-top: 2px;
      color: var(--muted);
    }

    /* Print rules */
    @page{
      size: A4;
      margin: 10mm;
    }
    @media print{
      body{ background: #fff; }
      .sheet{ padding: 0; width: auto; min-height: auto; }
      .card{ background: #fff; }
      a{ color: inherit; text-decoration:none; }
    }
  </style>

  <script>
    window.addEventListener('load', () => {
      // auto print (opsional). Kalau mau dimatikan, hapus baris ini.
      window.print();
    });
  </script>
</head>

<body>
  <div class="sheet">

    <!-- KOP -->
    <div class="topbar">
    <img src="{{ asset('images/logo.png') }}"
     alt="Logo Kampus"
     style="width:40px; height:40px;">


      <div class="brand">
        <div class="campus">KAMPUS SIM UNIVERSITAS</div>
        <div class="addr">Jl. Teknologi Masa Depan No. 10, Jakarta • (021) 555-1234 • www.kampussim.ac.id</div>
      </div>

      <div class="doc-meta">
        <div>Dokumen: KRS</div>
        <div>Cetak: {{ date('d/m/Y H:i') }}</div>
      </div>
    </div>

    <!-- Judul -->
    <div class="title">
      <h2>KARTU RENCANA STUDI (KRS)</h2>
      <div class="sub">{{ $krs->tahun_ajaran }} • Semester {{ $krs->semester }}</div>
    </div>

    <!-- Identitas -->
    <div class="card">
      <div class="grid">
        <div class="field">
          <div class="label">NIM</div>
          <div class="value">: {{ $krs->mahasiswa->nim }}</div>
        </div>

        <div class="field">
          <div class="label">Nama</div>
          <div class="value">: {{ $krs->mahasiswa->nama }}</div>
        </div>

        <div class="field">
          <div class="label">Prodi</div>
          <div class="value">: {{ $krs->mahasiswa->prodi->nama }} ({{ $krs->mahasiswa->prodi->jenjang }})</div>
        </div>

        <div class="field">
          <div class="label">Tahun Ajaran</div>
          <div class="value">: {{ $krs->tahun_ajaran }}</div>
        </div>
      </div>
    </div>

    <!-- Tabel KRS -->
    <table>
      <thead>
        <tr>
          <th class="col-no">No</th>
          <th class="col-kode">Kode MK</th>
          <th>Mata Kuliah</th>
          <th class="col-sks">SKS</th>
        </tr>
      </thead>
      <tbody>
        @php $totalSks = 0; @endphp
        @foreach($krs->krsDetails as $detail)
          @php $totalSks += $detail->mataKuliah->sks; @endphp
          <tr>
            <td class="col-no">{{ $loop->iteration }}</td>
            <td class="col-kode">{{ $detail->mataKuliah->kode }}</td>
            <td>{{ $detail->mataKuliah->nama }}</td>
            <td class="col-sks">{{ $detail->mataKuliah->sks }}</td>
          </tr>
        @endforeach

        <tr class="total-row">
          <td colspan="3" style="text-align:right;">Total SKS</td>
          <td class="col-sks">{{ $totalSks }}</td>
        </tr>
      </tbody>
    </table>

    <!-- Tanda tangan -->
    <div class="sign">
      <div class="sign-box">
        <div class="date">Jakarta, {{ date('d F Y') }}</div>
        <div class="line"></div>
        <div class="sign-name">(__________________)</div>
        <div class="sign-role">Dosen Pembimbing</div>
      </div>
    </div>

  </div>
</body>
</html>
