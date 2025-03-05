<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabortaryAppointment extends Model
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
    function lab_details()
    {
        return $this->hasMany(labdetail::class,  'appointment_id');
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('F j, Y') : null;
    }
}
