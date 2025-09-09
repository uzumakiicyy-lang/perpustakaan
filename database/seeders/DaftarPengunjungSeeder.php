<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengunjung; // ✅ ganti ke model yang benar

class DaftarPengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat 50 data pengunjung dummy
        Pengunjung::factory()->count(50)->create();

        // contoh pengunjung manual
        Pengunjung::factory()->create([
            'nama'          => 'Budi Santoso',
            'email'         => 'budi@example.com',
            'telp'          => '08123456789',
        ]);
    }
}
