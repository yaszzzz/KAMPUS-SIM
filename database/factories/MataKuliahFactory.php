<?php

namespace Database\Factories;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => strtoupper($this->faker->unique()->bothify('MK-###')),
            'nama' => $this->faker->words(3, true),
            'sks' => $this->faker->numberBetween(2, 4),
            'semester' => $this->faker->numberBetween(1, 8),
            'prodi_id' => Prodi::factory(),
        ];
    }
}
