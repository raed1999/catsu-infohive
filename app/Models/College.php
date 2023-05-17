<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [];

    public function faculty(): HasMany{
        return $this->hasMany(Faculty::class,'college_id','id');
    }

    public function program(): HasMany{
        return $this->hasMany(Program::class,'college_id','id');
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Program::class);
    }


}
