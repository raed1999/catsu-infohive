<?php

namespace App\Models;

use Database\Seeders\StudentSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Research extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

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

    public function confirmedBy()
    {
        return $this->belongsTo(Faculty::class, 'confirmed_by_id');
    }

    public function facultyInCharge()
    {
        return $this->belongsTo(Faculty::class, 'faculty_in_charge_id');
    }

    public function programs()
    {
        return $this->hasManyThrough(Program::class, Student::class, 'research_id', 'id', 'id', 'program_id');
    }

    public function program()
    {
        return $this->hasOneThrough(Program::class, Student::class, 'research_id', 'id', 'id', 'program_id');
    }

    public function colleges()
    {
        return $this->hasManyThrough(College::class, Program::class, 'id', 'id', 'program_id', 'college_id');
    }

    public function college()
    {
        return $this->hasOneThrough(College::class, Program::class, 'id', 'id', 'program_id', 'college_id');
    }

    protected $casts = [
        'keywords' => 'array',
        'created_at' => 'datetime:M d o',
        'updated_at' => 'datetime:M d o',
    ];
}
