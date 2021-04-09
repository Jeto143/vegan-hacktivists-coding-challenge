<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Answer[] $answers
 */
final class Question extends Model
{
    use HasFactory;

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Retrieves the ID of this question concatenated with a slug of its title.
     * This can appear in URLs and be converted back to int to get the numeric ID.
     */
    public function getIdSlugAttribute(): string
    {
        return $this->id . '_' . Str::slug($this->title);
    }
}
