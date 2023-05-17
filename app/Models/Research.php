<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Research extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('year', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('authors', function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
            });
    }

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
        'created_at' => 'datetime:M d o',
        'updated_at' => 'datetime:M d o',
    ];
}
