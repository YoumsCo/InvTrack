<?php

namespace Database\Factories;

use App\Http\Enum\Enum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "matricule" => fake()->unique()->sentence(1),
            "nom" => fake()->unique()->sentence(fake()->numberBetween(1, 2)),
            "prenom" => fake()->unique()->sentence(fake()->numberBetween(1, 3)),
            "telephone" => 6 . fake()->randomElement([9, 8, 7, 5, 2]) . fake()->numberBetween(1000000, 9999999),
            "specialisation" => fake()->sentence(fake()->numberBetween(1, 3)),
            "titre" => fake()->randomElement([Enum::professeur, Enum::docteur, Enum::ingenieur, Enum::technicien]),
        ];
    }
}
