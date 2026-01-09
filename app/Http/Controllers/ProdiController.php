<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('prodis.index', compact('prodis'));
    }

    public function create()
    {
        return view('prodis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:prodis',
            'nama' => 'required',
            'jenjang' => 'required',
        ]);

        Prodi::create($request->all());

        return redirect()->route('prodis.index')->with('success', 'Prodi berhasil ditambahkan.');
    }

    public function edit(Prodi $prodi)
    {
        return view('prodis.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'kode' => 'required|unique:prodis,kode,' . $prodi->id,
            'nama' => 'required',
            'jenjang' => 'required',
        ]);

        $prodi->update($request->all());

        return redirect()->route('prodis.index')->with('success', 'Prodi berhasil diupdate.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodis.index')->with('success', 'Prodi berhasil dihapus.');
    }
}
