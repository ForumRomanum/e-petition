<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @property integer id
 * @property integer role_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password_reset_token
 * @property string password
 * @property boolean is_active
 * @property boolean is_admin
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    protected $guarded = [
        'password_reset_token',
        'is_active',
        'role_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role_id === Role::getAdminRole()->id;
    }
}
