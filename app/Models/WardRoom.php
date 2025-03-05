<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardRoom extends Model
{
    protected $fillable = [
        'category',
        'name',
        'description',
        'charges',
        'branch_id'
    ];
    use HasFactory;
}
