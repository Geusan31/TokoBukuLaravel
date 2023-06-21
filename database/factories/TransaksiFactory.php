<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_buku' => mt_rand(1,10),
            'id_user' => mt_rand(1,10),
            'jumlah' => $this->faker->randomDigitNotNull(),
            'total_harga' => $this->faker->randomNumber(5, true)
        ];
    }
}
