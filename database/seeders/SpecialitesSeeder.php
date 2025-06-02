<?php

namespace Database\Seeders;

use App\Models\Responsables;
use App\Models\Specialites;
use Illuminate\Database\Seeder;

class SpecialitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialites = collect(["Génie Logiciel", "Réseaux et Sécurité", "Maintenance des Systèmes Informatiques", "Electro-technique", "Infographie et Web Design", "Gestion des Systèmes Informatiques", "Genie Logistique et Transport", "Génie Culinaire", "Informatique Industriel et Automatisme", "Industrie d'habillement"]);
        $abreviations = collect(["GL", "RS", "MSI", "ET", "IWD", "GSI", "GLT", "GCU", "IIA", "IH"]);

        $specialites->map(fn($specialite, $index) => Specialites::create([
            "responsable_id" => fake()->numberBetween(1, Responsables::count()),
            "intitule" => $specialite,
            "abreviation" => $abreviations[$index]
        ]));
    }
}
