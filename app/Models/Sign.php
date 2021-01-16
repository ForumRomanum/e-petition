<?php

namespace App\Models;

use App\Events\SignCreated;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @property integer id
 * @property integer petition_id
 * @property string first_name
 * @property string last_name
 * @property string full_name
 * @property string email
 * @property string confirm_token
 * @property DateTime confirmed_at
 * @property boolean is_active
 * @property boolean notify
 */
class Sign extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'notify',
    ];

    protected $guarded = [
        'petition_id',
        'confirm_token',
        'confirmed_at'
    ];

    protected $appends = [
        'full_name'
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'created' => SignCreated::class
    ];

    public function petition(): BelongsTo
    {
        return $this->belongsTo(Petition::class);
    }
    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $generateRandomString = Str::random(60);
            $token = Hash::make($generateRandomString);
            $model->confirm_token = $token;
        });
    }
}
