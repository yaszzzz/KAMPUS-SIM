<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krsData = Krs::with('mahasiswa', 'krsDetails')->get();
        return view('krs.index', compact('krsData'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        return view('krs.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        $krs = Krs::create($request->all());

        return redirect()->route('krs.edit', $krs)->with('success', 'KRS berhasil dibuat. Silakan tambah mata kuliah.');
    }

    public function edit(Krs $krs)
    {
        $krs->load(['mahasiswa', 'krsDetails.mataKuliah']);
        // Get MK logic: bisa semua MK atau filter by prodi mahasiswa. Idealnya by prodi.
        $mataKuliahs = MataKuliah::where('prodi_id', $krs->mahasiswa->prodi_id)->get();
        return view('krs.edit', compact('krs', 'mataKuliahs'));
    }

    public function update(Request $request, Krs $krs)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        $krs->update($request->all());

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil diupdate.');
    }

    public function destroy(Krs $krs)
    {
        $krs->delete();
        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus.');
    }

    public function storeDetail(Request $request, Krs $krs)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
        ]);

        // Cek duplikasi
        $exists = KrsDetail::where('krs_id', $krs->id)
                           ->where('mata_kuliah_id', $request->mata_kuliah_id)
                           ->exists();

        if ($exists) {
            return back()->with('error', 'Mata kuliah sudah ada di KRS ini.');
        }

        KrsDetail::create([
            'krs_id' => $krs->id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
        ]);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function destroyDetail(KrsDetail $krsDetail)
    {
        $krsDetail->delete();
        return back()->with('success', 'Mata kuliah dihapus dari KRS.');
    }

    public function print(Krs $krs)
    {
        $krs->load(['mahasiswa.prodi', 'krsDetails.mataKuliah']);
        return view('krs.print', compact('krs'));
    }
}
