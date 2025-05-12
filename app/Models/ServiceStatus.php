<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed|string $code
 * @property mixed|string $name
 * @property mixed $id
 */
class ServiceStatus extends Model
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
}
