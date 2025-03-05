<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class DoctorDetail extends Model
{
    protected $fillable=[
        'timing_from',
        'timing_to',
        'specialization',
        'consultancy_fee',
        'procedure_percentage',
        'doctor_sharing',
        'doctor_id',
        'designation',
        'degree',
        'contact1',
        'contact2'
    ];
    use HasFactory;
}
