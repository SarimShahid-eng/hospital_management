<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Branch;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctor;
use App\Models\labortary;
use App\Models\CommonUser;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Models\DoctorDetail;
use App\Models\labdetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Factories\LabortaryFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        labdetail::factory(3000)->create();
        // User::factory(1)->create();

        Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'superadmin@admin.com',
            'branch_id' => 0
        ]);
        // Admin::create([
        //     'name'=>'admin',
        //     'email' => 'admin@admin.com',
        //     'username' => 'super1234',
        //     'branch_id' => 1,
        //     'image' => '',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123456'),
        //     'status' => 0,
        //     'remember_token' => Str::random(10),
        // ]);


        // $user_counter = 124;
        // $number_counter = 100;
        // $unit_no = 11;

        // for ($i = 0; $i <= 5; $i++) {

        //      $count = Appointment::count();
        //             if ($count === 0) {
        //                 $id = '01';
        //             } else {
        //                 $id = '0' . ++$count;
        //             }
        //                 // $number='03033666'.++$count.'';

        //         $user= User::create([
        //                 'firstname'=>fake()->name(),
        //                 'username'=>fake()->name().++$user_counter,
        //                 'password'=>Hash::make('password'),
        //                 'phone_no'=>'03033666'.++$number_counter,
        //                 'dob'=>'2024-07-27',
        //                 'branch_id'=>'1',
        //                 'age'=>fake()->numberBetween(18, 99),
        //                 'gender'=> fake()->randomElement(['male', 'female']),
        //                 'cnic_no'=>'1030055589188',
        //                 'address'=>'Haliroad new fruit',

        //             ]);

        //             $user_id=$user['id'];

        //             $app=  Appointment::create([
        //                 'mr_no' => "00-00-00-$id",
        //                 'appointment_date' => '2024-07-27',
        //                 'appointment_time' => '00:57:37',
        //                 'user_id' => $user_id,
        //                 'branch_id' => '1',
        //                 'main_total' => '100',
        //                 'total' => '10',
        //                 'total_discount' => '10',
        //                 'advance' => '20',
        //                 'remaining' => '2',
        //                 'status' => 'active'
        //             ]);

        //     // Branch::create([
        //     //     'name'=>'Latifabad Unit No'.++$unit_no
        //     // ]);
        // }

        //doctor& doctor_details Combo
        // $dr = Doctor::create([
        //     'firstname' => fake()->name(),
        //     'username' => fake()->name() . ++$user_counter,
        //     'password' => Hash::make('password'),
        //     'gender' => 'male',
        //     'branch_id' => '1',
        // ]);
        // DoctorDetail::create([
        //     'timing_from' => Carbon::now(),
        //     'timing_to' => Carbon::now()->addHours(5),
        //     'specialization' => 'Mba',
        //     'consultancy_fee' => '1000',
        //     'procedure_percentage' => '10',
        //     'doctor_sharing' => '2000',
        //     'contact1' => '923033666781',
        //     'contact2' => '923034888912',
        //     'doctor_id' => $dr->id,
        //     'degree' => 'MBBS',
        //     'designation' => 'Doctor',
        //     'created_at' => Carbon::now(),

        // ]);

        //branch
        // Branch::create([
        //     'name'=>'Latifabad Unit No 12'
        // ]);




        // $user_count=1;
        // $

        // $number=0;
        // LabortaryFactory::create(1);
        // labortary::factory(1)->create();

    }
}
