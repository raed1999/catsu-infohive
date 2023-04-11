<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function faculty(): HasMany{
        return $this->hasMany(Faculty::class,'usertype_id','id');
    }

    public function student(): HasMany{
        return $this->hasMany(Student::class,'usertype_id','id');
    }
}
