<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPengunjungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;

/* === Halaman Form untuk pengunjung (tanpa login) === */
Route::get('/',  [FormPengunjungController::class, 'index'])->name('form.index');
Route::post('/', [FormPengunjungController::class, 'store'])->name('form.store');

/* === Auth route bawaan Laravel === */
Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
    'confirm'  => false,
]);

/* === Route publik (tanpa login) === */
// Pengunjung hanya bisa melihat daftar & detail pengunjung
Route::resource('pengunjung', PengunjungController::class)->only(['index', 'show']);

// Pengunjung hanya bisa melihat daftar & detail buku
Route::resource('buku', BukuController::class)->only(['index', 'show']);

/* === Route yang butuh login (admin/user terdaftar) === */
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // CRUD Pengembalian
    Route::resource('pengembalian', PengembalianController::class);

    // CRUD Pengunjung (hanya destroy yang butuh login)
    Route::delete('/pengunjung/{pengunjung}', [PengunjungController::class, 'destroy'])
        ->name('pengunjung.destroy');

    // Ubah profil
    Route::get('/ubah-profil',  [ProfilController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [ProfilController::class, 'update'])->name('ubah-profil.update');

    // CRUD Admin
    Route::resource('admin', AdminController::class);

    // CRUD Buku untuk admin (kecuali index & show yang sudah publik)
    Route::resource('buku', BukuController::class)->except(['index', 'show']);
});
