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
            'nama_masyarakat' => $this->faker->name,
            'alamat' => $this->faker->address(),
            'status' => $this->faker->randomElement(['segera', 'Selesai']),
            'link_google_map' => $this->faker->url(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 days', '+1 days'),
            'tanggal_berakhir' => $this->faker->dateTimeBetween('+2 days', '+3 days'),
            'kapasitas' => $this->faker->numberBetween(20, 100),
        ];
    }
}
