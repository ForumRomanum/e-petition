<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property integer petition_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string confirm_token
 * @property DateTime confirmed_at
 * @property boolean is_active
 */
class Sign extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    protected $guarded = [
        'petition_id',
        'confirm_token',
        'confirmed_at'
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
}
