<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPengunjungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;

// === Halaman Form untuk pengunjung (tanpa login) ===
Route::get('/',  [FormPengunjungController::class, 'index'])->name('form.index');
Route::post('/', [FormPengunjungController::class, 'store'])->name('form.store');

// === Auth route bawaan Laravel ===
Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
    'confirm'  => false,
]);

// === Route yang butuh login ===
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route resource pengunjung (index, show, destroy)
    Route::resource('pengunjung', PengunjungController::class)
         ->only(['index', 'show', 'destroy']);

    // Profil
    Route::get('/ubah-profil',  [ProfilController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [ProfilController::class, 'update'])->name('ubah-profil.update');

    // Admin & Buku
    Route::resource('admin', AdminController::class);
    Route::resource('buku',  BukuController::class);
});
