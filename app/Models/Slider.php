<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "uuid",
        "created_by_user_id",
        "sub_title",
        "title",
        "description",
        "image",
        "button_link_one",
        "button_one_text",
        "button_link_two",
        "button_two_text",
    ];

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by_user_id");
    }
}
