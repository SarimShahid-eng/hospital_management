<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'branch_details',
        'branch_id'
    ];
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class, 'branch_id');
    }
    public function bloodBanks()
    {
        return $this->hasMany(BloodBank::class, 'branch_id', 'id');
    }
}
