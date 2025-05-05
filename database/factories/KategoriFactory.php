<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'name' => $this->faker->name(),
        'keterangan' => $this->faker->keterangan(),
        'created_at'=> $this->faker->dateTimeThisMonth($max = 'now', $timezone = null)
        ];
    }
}
