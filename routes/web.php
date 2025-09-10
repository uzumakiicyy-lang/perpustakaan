<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPengunjungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FormPengunjungController::class, 'index'])->name('form.index');
Route::post('/', [FormPengunjungController::class, 'store'])->name('form.store');

Auth::routes([
    'register'=> false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/pengunjung', PengunjungController::class)
        ->only(['index','show','destroy','store']);

    Route::get('/ubah-profil', [ProfilController::class, 'index'])
        ->name('ubah-profil');
    Route::post('/ubah-profil', [ProfilController::class, 'update'])
        ->name('ubah-profil.update');

    Route::resource('/admin', AdminController::class);
    Route::resource('Buku', App\Http\Controllers\BukuController::class);
    Route::resource('Buku', BukuControllers::class);
    Route::get('/Buku', [BukuControllers::class, 'index'])->name('buku.index');
});
