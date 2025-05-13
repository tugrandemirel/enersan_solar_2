<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed|string $name
 * @property mixed|string $code
 */
class ProjectStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "code",
    ];

    public function scopeActive($query)
    {
        return $query->where("code", "active");
    }

    public function scopePassive($query)
    {
        return $query->where("code", "passive");
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
