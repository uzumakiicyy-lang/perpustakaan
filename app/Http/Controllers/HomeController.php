<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class HomeController extends Controller
{
    public function __construct()
    {
        // Pastikan semua method hanya bisa diakses oleh user yang sudah login
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil jumlah pengunjung per tanggal
        $grafikTamu = Pengunjung::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->pluck('jumlah', 'tanggal');

        // Kirim data ke view
        return view('home', [
            'grafikTamu' => $grafikTamu
        ]);
    }
}
