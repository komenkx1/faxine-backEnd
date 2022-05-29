<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => $this->faker->randomDigitNotNull(),
            'judul' => $this->faker->sentence(),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph(),
            'cover' => $this->faker->imageUrl(640, 480, 'health', true),
        ];
    }
}
