<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorDetail>
 */
class DoctorDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'timing_from'=>Carbon::now(),
            'timing_to' => Carbon::now()->addHours(5),
            'specialization'=>'Mba',
            'consultancy_fee'=>'1000',
            'procedure_percentage'=>'10',
            'doctor_sharing'=>'2000',
            'contact1'=>'923033666781',
            'contact2'=>'923034888912',
            'doctor_id'=>'1',
            'degree'=>'MBBS',
            'designation'=>'Doctor',
            'created_at' => Carbon::now(),

        ];
    }
}
