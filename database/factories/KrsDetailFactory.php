<?php

namespace Database\Factories;

use App\Models\Krs;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KrsDetail>
 */
class KrsDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'krs_id' => Krs::factory(),
            'mata_kuliah_id' => MataKuliah::factory(),
        ];
    }
}
