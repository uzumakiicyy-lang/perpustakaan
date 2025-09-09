<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ➡️ ini ditambahkan
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model // ➡️ P besar, sama dengan nama file
{
    use HasFactory; // ➡️ ini ditambahkan

    protected $table = 'pengunjung';

    protected $fillable = [
        'nama',
        'email',
        'telp',
    ];
}
