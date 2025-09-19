<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Buku extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * Wajib didefinisikan karena nama tabel kita 'buku' (singular),
     * sedangkan default Eloquent mengira namanya 'bukus'.
     */
    protected $table = 'buku';

    /**
     * Kolom yang boleh diisi secara mass assignment
     * (misal melalui create() atau update()).
     */
    protected $fillable = [
        'nama',
        'unit',
        'image',
        'kode_buku',
    ];

    /**
     * Jika tabel 'buku' TIDAK memiliki kolom created_at dan updated_at,
     * matikan fitur timestamps Eloquent agar tidak error.
     */
    public $timestamps = false;

    /**
     * Accessor: otomatis menambahkan atribut virtual 'image_url'.
     * Jadi di Blade cukup pakai $buku->image_url
     * untuk menampilkan URL lengkap gambar.
     */
    public function getImageUrlAttribute(): string
    {
        // Jika kolom 'image' terisi, ambil path di storage
        // Jika tidak ada, pakai gambar default di public/images
        return $this->image
            ? Storage::url($this->image)
            : asset('images/default-book.png');
    }

    /**
     * Scope pencarian sederhana.
     * Bisa dipanggil: Buku::search($keyword)->get();
     */
    public function scopeSearch($query, string $keyword)
    {
        return $query->where('nama', 'like', "%{$keyword}%")
                     ->orWhere('kode_buku', 'like', "%{$keyword}%");
    }

    /**
     * Contoh relasi opsional ke tabel kategori
     * (aktifkan hanya kalau tabel 'kategori' memang ada).
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
