<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPengunjungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Route Web
|--------------------------------------------------------------------------
| - Pengunjung dapat melihat daftar & detail buku tanpa login.
| - Admin harus login untuk CRUD buku, pengembalian, pengunjung (hapus), dan kelola profil/admin.
*/

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
Route::resource('pengunjung', PengunjungController::class)->only(['index', 'show']);
Route::resource('buku', BukuController::class)->only(['index', 'show']);

/* === Route yang butuh login (khusus admin) === */
Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // CRUD Buku (admin)
    Route::resource('buku', BukuController::class)->except(['index', 'show']);

    // CRUD Pengembalian
    Route::resource('pengembalian', PengembalianController::class);

    // CRUD Pengunjung (hanya delete)
    Route::delete('/pengunjung/{pengunjung}', [PengunjungController::class, 'destroy'])
        ->name('pengunjung.destroy');

    // Ubah profil admin
    Route::get('/ubah-profil',  [ProfilController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [ProfilController::class, 'update'])->name('ubah-profil.update');

    // CRUD Admin
    Route::resource('admin', AdminController::class);
});
