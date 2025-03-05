<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDetail extends Model
{

    protected $fillable = [
        'appointment_id',
        'que_no',
        'amount',
        'doctor_id',
        'discount',
        'referring_doctor'
    ];
    // public function services()
    // {
    //     return $this->hasMany(Service::class, 'id', 'service_id');
    // }
    public function doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
    // public function () : Returntype {

    // }
    use HasFactory;
}
