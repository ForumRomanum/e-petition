<?php

namespace App\Models;

use DateTime;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @property integer id
 * @property integer role_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password_reset_token
 * @property string remember_token
 * @property DateTime email_verified_at
 * @property string password
 * @property string api_token
 * @property boolean is_active
 * @property boolean is_admin
 */
class User extends Authenticatable
{
    use AuthenticatableTrait, HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $guarded = [
        'password_reset_token',
        'is_active',
        'role_id',
        'api_token'
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role_id === Role::getAdminRole()->id;
    }

    public static function notAdmin(): Builder
    {
        return static::query()->where('role_id', '!=', Role::getAdminRole()->id);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $generateRandomString = Str::random(60);
            $token = Hash::make($generateRandomString);
            $model->api_token = $token;
        });
    }
}
