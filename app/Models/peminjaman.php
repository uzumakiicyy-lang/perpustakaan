<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
     
    protected $table = 'peminjaman';
    protected $fillable = [
        'judul_buku',
        'tgl_peminjaman',
        'kode_buku',
        'buku_id',
    ];

    public function buku()
    {
        return $this->belongsTo(buku::class, 'buku_id', 'id');
    }
}
