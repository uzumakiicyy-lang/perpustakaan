<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    // Tampilkan daftar (index)
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal');

        $pengunjung = Pengunjung::with('buku')
            ->when($tanggal, function ($q, $tanggal) {
                // filter berdasarkan tanggal (only date part)
                $q->whereDate('created_at', $tanggal);
            })
            ->orderBy('created_at', 'desc')
            ->get(); // pakai get() supaya DataTables client-side bisa bekerja

        return view('pengunjung.index', compact('pengunjung'));
    }

    // Tampilkan detail
    public function show($id)
    {
        $item = Pengunjung::with('buku')->findOrFail($id);
        return view('pengunjung.show', compact('item'));
    }

    // Hapus
    public function destroy($id)
    {
        $item = Pengunjung::findOrFail($id);
        $item->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Data berhasil dihapus');
    }
}