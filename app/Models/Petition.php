<?php

namespace App\Models;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer user_id
 * @property string name
 * @property string description
 * @property-read string description_plain
 * @property bool is_public
 */
class Petition extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = [
        'user_id',
        'description_plain',
    ];

    protected $with = [
        'user'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function signsCount(): int
    {
        return $this->hasMany(Sign::class)->count();
    }

    public function setDescriptionAttribute(string $value)
    {
        $this->attributes['description'] = $value;
        $this->attributes['description_plain'] = Helpers::htmlToText($value);
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
}
