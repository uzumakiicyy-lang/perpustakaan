<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    protected $table = 'pengunjung';
    protected $fillable = [
        'nama',
        'email',
        'telp'
    ];
}
