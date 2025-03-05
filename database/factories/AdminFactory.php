<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name'=>'admin',
                'email' => 'admin@admin.com',
                'username' => 'super1234',
                'branch_id' => 1,
                'image' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'status' => 0,
                'remember_token' => Str::random(10),
            ];
    }
}
