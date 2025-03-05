<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'mr_no',
        'appointment_date',
        'appointment_time',
        'record_created',
        'user_id',
        'main_total',
        'total',
        'total_discount',
        'advance',
        'remaining',
        'status',
        'branch_id'
        // 'status',
    ];
    use HasFactory;
    function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    function appointment_details()
    {
        return $this->hasOne(AppointmentDetail::class, 'appointment_id');
    }
    function get_appointment_details()
    {
        return $this->hasMany(AppointmentDetail::class, 'appointment_id');
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('F j, Y') : null;
    }
    function doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
