<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string email
 */
class Newsletter extends Model
{
    protected $fillable = [
        'email',
    ];

}
