<?php

namespace App\Models;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer user_id
 * @property integer goal
 * @property string name
 * @property string description
 * @property-read string description_plain
 * @property bool is_public
 */
class Petition extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_public',
    ];

    protected $guarded = [
        'user_id',
        'description_plain',
        'goal',
    ];

    protected $appends = [
        'description_short'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function signs(): HasMany
    {
        return $this->hasMany(Sign::class);
    }

    public function setDescriptionAttribute(string $value)
    {
        $this->attributes['description'] = $value;
        $this->attributes['description_plain'] = Helpers::htmlToText($value);
    }

    public function getDescriptionShortAttribute(): string
    {
        return preg_replace(
                '/\s+?(\S+)?$/',
                '',
                substr($this->description_plain, 0, 100)
            ) . '...';
    }

    public function setDescriptionPlainAttribute(string $value)
    {

    }

    public function setIsPublicAttribute(bool $value)
    {
        if ($value) {
            $this->attributes['is_public'] = $value;
        }
    }

    public function save(array $options = []): bool
    {
        if (!$this->getOriginal('is_public')) {
            return parent::save($options);
        }
        return false;
    }

    public function forceDelete(): bool
    {
        return false;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->goal = $model->goal ?: 100000;
        });
    }
}
