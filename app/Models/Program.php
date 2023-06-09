<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, College::class, 'id', 'id');
    }

}
