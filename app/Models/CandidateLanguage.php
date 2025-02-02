<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateLanguage extends Model
{
    use HasFactory;

    protected $guarded = [];

    function lanName(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
