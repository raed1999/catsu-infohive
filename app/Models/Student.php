<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = ['password'];


    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class, 'usertype_id', 'id');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function college()
    {
        return $this->belongsToThrough(College::class, Program::class);
    }

    protected $casts = [
        'created_at' => 'datetime:M d o',
        'updated_at' => 'datetime:M d o',
    ];
}
