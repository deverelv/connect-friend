<?php

namespace Database\Factories;

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
        $name = fake()->name;
        $fieldOfWork = fake()->randomElements(['IT', 'Finance', 'Marketing', 'Healthcare', 'Education'], 3);

        return [
            'name' => $name,
            'email' => str_replace(' ', '.', $name) . '@example.com',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'gender' => fake()->randomElement(['male', 'female']),
            'field_of_work' => implode(', ', $fieldOfWork),
            'linkedin_username' => str_replace(' ', '-', $name),
            'mobile_number' => fake()->numerify('############'),
            'years_of_experience' => fake()->numberBetween(1, 20),
            'registration_price' => fake()->numberBetween(100_000, 125_000),
            'wallet_balance' => fake()->numberBetween(1, 100_000),
            'status' => 0,
            'profile_picture' => 'img/default-profile-picture.png'
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
