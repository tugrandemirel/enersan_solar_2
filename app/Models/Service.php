<?php

namespace App\Models;

use App\Enum\Service\ServiceDocumentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property mixed $uuid
 */
class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'service_status_id',
        'name',
        'slug',
        'description',
        "created_by_user_id",
    ];

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by_user_id");
    }

    public function serviceStatus(): BelongsTo
    {
        return $this->belongsTo(ServiceStatus::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(ServiceDocument::class, "service_id", "id")
            ->where("type", ServiceDocumentTypeEnum::IMAGE);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ServiceDocument::class)
            ->where("type", ServiceDocumentTypeEnum::DOCUMENT);
    }
}
