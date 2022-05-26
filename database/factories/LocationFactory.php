<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_masyarakat' => $this->faker->name(),
            'alamat' => $this->faker->address,
            'status' => $this->faker->randomElement(['selesai', 'segera']),
            'form_link_google_map' => $this->faker->url,
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'tanggal_selesai' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'kapasitas' => $this->faker->numberBetween(1, 100),
        ];
    }
}
