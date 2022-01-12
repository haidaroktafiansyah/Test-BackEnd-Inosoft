<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->year($max = 'now'),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->numberBetween($min = 1000000, $max = 1000000000),
            'stok' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'kendaraan' => $this->faker->company(),
        ];
    }
}
