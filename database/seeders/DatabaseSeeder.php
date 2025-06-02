<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Materiels;
use App\Models\Responsables;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        Responsables::factory(5)->create();
        Categories::factory(4)->create();
        Materiels::factory(50)->create();
        $this->call([
            SpecialitesSeeder::class,
            EtudiantsSeeder::class,
        ]);
    }
}
