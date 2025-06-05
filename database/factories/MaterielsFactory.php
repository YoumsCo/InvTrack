<?php

namespace Database\Factories;

use App\Http\Controllers\FilesController;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materiels>
 */
class MaterielsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "categories_id" => fake()->numberBetween(1, 4),
            "matricule" => fake()->unique()->sentence(1),
            "libelle" => fake()->sentence(1),
            "etat" => fake()->randomElement(["Disponible", "Defecteux", "En maintenance"]),
            "image" => fake()->randomElement(FilesController::img()),
        ];
    }
}
