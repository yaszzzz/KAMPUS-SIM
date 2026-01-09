<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('prodi')->get();
        return view('mata_kuliahs.index', compact('mataKuliahs'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mata_kuliahs.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliahs',
            'nama' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $prodis = Prodi::all();
        return view('mata_kuliahs.edit', compact('mataKuliah', 'prodis'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode,' . $mataKuliah->id,
            'nama' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $mataKuliah->update($request->all());

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil diupdate.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
