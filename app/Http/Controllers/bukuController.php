<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /** Tampilkan daftar buku (public) */
    public function index()
    {
        $buku = Buku::orderBy('nama')->get();
        return view('pages.buku.index', compact('buku'));
    }

    /** Form tambah buku (hanya admin) */
    public function create()
    {
        return view('pages.buku.create');
    }

    /** Simpan buku baru */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'unit'      => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kode_buku' => 'required|unique:buku,kode_buku', // ✅ tabel sesuai
        ]);

        // handle upload image jika ada
        $data = $request->only(['nama','unit','kode_buku']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('buku', 'public');
        }

        Buku::create($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /** Detail buku */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.show', compact('buku'));
    }

    /** Form edit buku */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.edit', compact('buku'));
    }

    /** Update data buku */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'unit'      => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // unique tapi abaikan id yang sedang diedit
            'kode_buku' => 'required|unique:buku,kode_buku,' . $buku->id,
        ]);

        $data = $request->only(['nama','unit','kode_buku']);

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }
            $data['image'] = $request->file('image')->store('buku', 'public');
        }

        $buku->update($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    /** Hapus buku */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // hapus file image jika ada
        if ($buku->image) {
            Storage::disk('public')->delete($buku->image);
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
