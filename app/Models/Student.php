<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Student extends Model implements Authenticatable
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $fillable = ['password'];

    protected $guard = 'student';

    public function research() :BelongsTo
    {
        return $this->belongsTo(Research::class);
    }

    public function confirmedBy()
    {
        return $this->belongsTo(Faculty::class, 'confirmed_by_id');
    }

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

    protected $dates = [
        'session_expires_at',
    ];

    public function getAuthIdentifierName()
    {
        return 'id'; // or any other name of the unique identifier field
    }

    public function getAuthIdentifier()
    {
        return $this->id; // or any other unique identifier field value
    }

    public function getAuthPassword()
    {
        return $this->password; // or any other hashed password field value
    }

    public function getRememberToken()
    {
        return $this->remember_token; // or any other remember token field value
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // or any other remember token field name
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // or any other remember token field name
    }
}
