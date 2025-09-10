<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\Buku; // ✅ tambahkan model Buku

class FormPengunjungController extends Controller
{
    public function index()
    {
        return view('pengunjung.index');
        // ambil semua data pengunjung
        $pengunjung = Pengunjung::orderBy('id', 'ASC')->get();

        // ambil daftar buku
        $buku = Buku::orderBy('judul', 'ASC')->get();

        return view('pages.form.index', compact('pengunjung', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'telp'  => 'required',
            'buku_id' => 'required'
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('form.index')->with('success', 'Data berhasil disimpan');
    }
}
