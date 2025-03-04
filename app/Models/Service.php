<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[
        'name',
        'branch_id'
    ];
    use HasFactory;
    public function branch(){
        return $this->hasMany(Branch::class,'id','branch_id');
    }
}
