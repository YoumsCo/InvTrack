<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtudiantsFactory extends Factory
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
            "responsable_id" => fake()->numberBetween(1, 5),
            "specialite_id" => fake()->numberBetween(1, 5),
            "nom" => fake()->unique()->sentence(fake()->numberBetween(1, 2)),
            "prenom" => fake()->unique()->sentence(fake()->numberBetween(1, 3)),
            "date_naissance" => fake()->date("Y-m-d"),
            "lieu" => fake()->sentence(fake()->numberBetween(1, 2)),
            "redoublant" => fake()->randomElement(['oui', 'non']),
            "niveau" => fake()->numberBetween(1, 5),
            "statut" => fake()->randomElement(["Delegue", "Vice delegue", "Etudiant"]),
        ];
    }
}
