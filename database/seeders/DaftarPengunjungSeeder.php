<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengunjung;

class DaftarPengunjungSeeder extends Seeder
{
    public function run(): void
    {
        Pengunjung::factory()->count(50)->create();
    }
}
