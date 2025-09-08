<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'nama',
        'unit',
        'image',
        'kode_buku'
    ];
}
