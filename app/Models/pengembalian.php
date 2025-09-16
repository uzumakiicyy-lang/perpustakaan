<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model   // <— Huruf P besar (PSR-4 & Laravel standard)
{
    // Jika nama tabel sudah benar, ini boleh dibiarkan.
    // Pastikan nama tabel di database juga "pengembalian"
    protected $table = 'pengembalian';

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'judul_buku',
        'tgl_pengembalian',
        'kode_buku',
        'buku_id',
    ];

    // Relasi ke model Buku
    public function buku()
    {
        // Pastikan model Buku namanya "Buku" (huruf B besar) dan file nya app/Models/Buku.php
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
