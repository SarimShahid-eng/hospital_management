<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class labdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_id' => 1,
            'amount' => 4000,
            'lab_test_id' => 1,
            'discount' => 0,
            'status' => 'pending',
            'result' => '["20","40"]',
            //
        ];
    }
}
