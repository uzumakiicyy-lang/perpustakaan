<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('nama')->get();
        return view('pages.buku.index', compact('buku'));
    }

    public function create()
    {
        return view('pages.buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'unit'      => 'required',
            'image'     => 'required',
            'kode_buku' => 'required|unique:bukus,kode_buku', // ✅ pastikan tabel sesuai
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.show', compact('buku'));
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'      => 'required',
            'unit'      => 'required',
            'image'     => 'required',
            'kode_buku' => 'required|unique:bukus,kode_buku,' . $id, // ✅ pakai nama tabel
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
