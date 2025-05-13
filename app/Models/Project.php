<?php

namespace App\Models;

use App\Enum\Project\ProjectDocumentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "uuid",
        "project_status_id",
        "name",
        "slug",
        "description",
        "created_by_user_id",
    ];

    public function projectStatus(): HasOne
    {
        return $this->hasOne(ProjectStatus::class, "id", "project_status_id");
    }

    public function image(): HasOne
    {
        return $this->hasOne(ProjectDocument::class, "project_id", "id")
            ->where("type", ProjectDocumentTypeEnum::IMAGE);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ProjectDocument::class)
            ->where("type", ProjectDocumentTypeEnum::DOCUMENT);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(ProjectDocument::class, "project_id", "id")
            ->where("type", ProjectDocumentTypeEnum::GALLERY);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by_user_id", "id");
    }
}
