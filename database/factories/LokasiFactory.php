<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lokasi>
 */
class LokasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alamat' => $this->faker->address(),
            'status' => $this->faker->randomElement(['segera', 'Selesai']),
            'link_google_map' => $this->faker->url(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'tanggal_berakhir' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'kapasitas' => $this->faker->numberBetween(20, 100),
        ];
    }
}
