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
 * @property string formatted_goal
 * @property string formatted_signs_count
 * @property integer type
 * @property string name
 * @property string description
 * @property-read string description_plain
 * @property bool is_public
 */
class Petition extends Model
{
    use SoftDeletes, HasFactory;

    const PETITION_TO_MINISTRY = 0;
    const PETITION_TO_PUBLIC_PERSON = 1;

    const TYPES_NAMES = [
        self::PETITION_TO_MINISTRY => 'petition.to_ministry',
        self::PETITION_TO_PUBLIC_PERSON => 'petition.to_public_person',
    ];

    protected $fillable = [
        'name',
        'description',
        'type',
        'goal',
    ];

    protected $guarded = [
        'is_public',
        'user_id',
        'description_plain',
    ];

    protected $appends = [
        'description_short',
        'signs_percent',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function signs(): HasMany
    {
        return $this->hasMany(Sign::class)->whereNotNull('confirmed_at');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function tagNames()
    {
        return $this->belongsToMany(Tag::class)->select(['name']);
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

    public function getFormattedGoalAttribute(): string
    {
        return number_format($this->goal, 0, ',', ' ');
    }

    public function getFormattedSignsCountAttribute(): string
    {
        return number_format($this->signs_count, 0, ',', ' ');
    }

    public function getSignsPercentAttribute(): string
    {
        if (!isset($this->signs_count)) {
            return '0';
        }
        $percent = $this->signs_count / $this->goal * 100;
        if ($percent > 100) {
            return '100';
        }
        return (string)round($percent, 1);
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
