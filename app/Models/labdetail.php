<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labdetail extends Model
{
    protected $table = 'lab_details';

    protected $fillable = [
        'appointment_id',
        'amount',
        'lab_test_id',
        'discount',
        'status',
        'result'
    ];

    protected $casts = [
        'result' => 'array',
    ];

    use HasFactory;
    // public function lanappointment(){}
    public function lab_test()
    {
        return $this->belongsTo(Labortary::class, 'lab_test_id');
    }

    public function lab_app()
    {
        return $this->belongsTo(LabortaryAppointment::class, 'appointment_id');
    }
}
