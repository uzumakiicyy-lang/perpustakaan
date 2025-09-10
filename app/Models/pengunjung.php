<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    // 👇 pastikan sesuai dengan nama tabel di database
    protected $table = 'pengunjung';  

    protected $fillable = ['nama','email','telp','buku_id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
