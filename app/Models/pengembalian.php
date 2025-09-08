<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
     protected $table = 'pengembalian';
    protected $fillable = [
        'judul_buku',
        'tgl_pengembalian',
        'kode_buku',
        'buku_id',
    ];

    public function buku()
    {
        return $this->belongsTo(buku::class, 'buku_id', 'id');
    }
}
