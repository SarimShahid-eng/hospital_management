<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'username',
        'image',
        'gender',
        // 'age',
        'phone_no',
        'dob',
        'cnic_no',
        'address',
        'branch_id',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         // 'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
    function get_appointment()
    {
        return $this->hasOne(Appointment::class, 'user_id');
    }
    function labappointments()
    {
        return $this->hasMany(LabortaryAppointment::class, 'user_id');
    }
    function get_lab_appointment()
    {
        return $this->hasOne(LabortaryAppointment::class, 'user_id');
    }
}
