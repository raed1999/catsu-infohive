<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Research extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];


    public function authors()
    {
        return $this->hasMany(Student::class, 'research_id');
    }

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
