<?php

namespace App\Models;

use App\Enum\Service\ServiceDocumentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "uuid",
        "service_id",
        "file_name",
        "file_ext",
        "size",
        "path",
        "type",
    ];

    protected $casts = [
        "type" => ServiceDocumentTypeEnum::class
    ];


    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
