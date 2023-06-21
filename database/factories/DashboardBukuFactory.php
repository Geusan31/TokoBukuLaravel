<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DashboardBuku>
 */
class DashboardBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_buku' => $this->faker->sentence(mt_rand(1, 5)),
            'pengarang' => $this->faker->firstName(),
            'penerbit' => $this->faker->firstName(),
            'tahun_terbit' => $this->faker->year(),
            'harga' => $this->faker->randomNumber(5, true)
        ]; 
    }
}
