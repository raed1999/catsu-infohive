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
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }


}
