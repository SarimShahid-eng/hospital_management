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
        // User::create([

        $user_counter = 124;
        $number_counter = 100;

        //             ]);
        return [
            'firstname' => fake()->name(),
            'username' => fake()->name() . ++$user_counter,
            'password' => Hash::make('password'),
            'phone_no' => '03033666' . ++$number_counter,
            'dob' => '2024-07-27',
            'branch_id' => '1',
            'age' => fake()->numberBetween(18, 99),
            'gender' => fake()->randomElement(['male', 'female']),
            'cnic_no' => '1030055589188',
            'address' => 'Haliroad new fruit',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
