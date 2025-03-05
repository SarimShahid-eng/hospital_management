<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Labortary>
 */
class LabortaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'labortary_test'=>'Aqua-boost',
            'name'=>"['Aquasub1','Aquasub2']",
            'unit'=>'mole',
            'range'=>'12-100',
            'abbreviation'=>'Ab',
            'fees'=>'300',
            'branch_id'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            //
        ];
    }
}
