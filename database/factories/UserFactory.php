<?php

namespace Database\Factories;

use App\Http\Enum\Enum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "matricule" => "Admin",
            "nom" => env("ADMIN_DEFAULT_NAME"),
            "telephone" => 237690552385,
            "password" => env("ADMIN_DEFAULT_PASSWORD"),
            "role" => Enum::superAdmin,
        ];
    }
}
