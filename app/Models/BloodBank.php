<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    // protected $table = 'blood_banks';
    use HasFactory;
    protected $fillable = [
        'blood_group',
        'remained_bags',
        'branch_id'
    ];
    // public function branch()
    // {
    //     return $this->belongsTo(Branch::class, 'branch_id', 'id');
    // }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
