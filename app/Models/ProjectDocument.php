<?php

namespace App\Models;

use App\Enum\Project\ProjectDocumentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "uuid",
        "project_id",
        "file_name",
        "file_ext",
        "size",
        "path",
        "type",
    ];

    protected $casts = [
        "type" => ProjectDocumentTypeEnum::class
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
