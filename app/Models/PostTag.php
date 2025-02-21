<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostTag extends Model
{
    use HasFactory;

    protected $guarded = [];

    function tagName(): BelongsTo
    {
        return $this->belongsTo(JobTag::class, 'tag_id', 'id');
    }
}
