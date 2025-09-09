<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengunjung>
 */
class PengunjungFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama'  => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            // Nomor telepon Indonesia (maks 12–13 digit, aman di varchar(16))
            'telp'  => $this->faker->numerify('08###########'),
        ];
    }
}
