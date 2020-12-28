<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property integer type
 * @property string name
 */
class Role extends Model
{
    const ADMIN = 1;
    const USER = 0;

    protected $fillable = [
        'name',
        'type',
    ];

    public static function getAdminRole()
    {
        return static::query()->where('type', self::ADMIN)->first();
    }

    public static function getUserRole()
    {
        return static::query()->where('type', self::ADMIN)->first();
    }
}
