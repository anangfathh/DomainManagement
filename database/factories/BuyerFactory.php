<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BuyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => 'employee',
            'phone_number' => '08' . fake()->randomDigit(10),
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'created_at' => now(),
            'updated_at' => now(), // password
        ];
    }
}
