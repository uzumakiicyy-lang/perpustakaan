<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // WAJIB karena tabel di migration bernama "buku" (singular)
    protected $table = 'buku';

    protected $fillable = [
        'nama',
        'unit',
        'image',
        'kode_buku',
    ];
}
