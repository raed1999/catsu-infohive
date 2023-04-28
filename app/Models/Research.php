<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [];


    public function adviser()
    {
        return $this->belongsTo(Faculty::class, 'advisers_id');
    }

    public function facultyInCharge()
    {
        return $this->belongsTo(Faculty::class, 'faculty_in_charge_id');
    }

    protected $casts = [
        'keywords' => 'array',
    ];
}
