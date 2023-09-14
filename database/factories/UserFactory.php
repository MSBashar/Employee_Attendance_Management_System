<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'first_name' => 'Mr.',
        //     'last_name' => 'Admin',
        //     'email' => 'super.admin@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123'), // password
        //     'remember_token' => Str::random(10),
        //     'role' => 'Admin',
        //     'status' => 1,
        // ];

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('456'), // password
            'remember_token' => Str::random(10),
            'role' => 'Employee',
            'status' => 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
