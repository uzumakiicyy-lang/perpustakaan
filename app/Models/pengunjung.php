<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * (Jika tabelnya memang bernama 'pengunjung', baris ini boleh tetap ada.
     * Jika mengikuti konvensi Laravel—plural 'pengunjungs'—baris ini juga tetap
     * untuk memaksa pakai nama tunggal.)
     */
    protected $table = 'pengunjung';

    /**
     * Kolom yang boleh di–mass assign.
     */
    protected $fillable = [
        'nama',
        'email',
        'telp',
        'buku_id',
    ];

    /**
     * Relasi: satu pengunjung bisa terkait dengan satu buku.
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
