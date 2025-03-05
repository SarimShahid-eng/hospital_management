<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labortary extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'range',
        'labortary_test',
        'abbreviation',
        'fees',
        'branch_id'
    ];
    protected $casts = [
        'name' => 'array',
        'unit' => 'array',
        'range' => 'array',
    ];
    use HasFactory;
    public function  branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
