<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Labortarist extends Authenticatable
{
    use HasFactory;
    protected $guard = 'labortarist';

    protected $fillable = [
        'firstname',
        'gender',
        'username',
        'branch_id',
        'image',
        'password',
    ];
    function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
