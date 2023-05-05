<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model implements Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];
    protected $guard = 'faculty';
    protected $table = 'faculties';

    public function research()
    {
        return $this->hasMany(Faculty::class, 'advisers_id');
    }

    public function college(): BelongsTo{
        return $this->belongsTo(College::class,'college_id','id');
    }

    public function userType(): BelongsTo {
        return $this->belongsTo(UserType::class,'usertype_id','id');
    }

    protected $casts = [
        'created_at' => 'datetime:M d o',
        'updated_at' => 'datetime:M d o',
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
