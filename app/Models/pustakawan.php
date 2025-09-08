<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pustakawan extends Model
{
    protected $table = 'pustakawan';
    protected $fillable = [
        'nama',
        'email',
        'telp'
    ];
}
