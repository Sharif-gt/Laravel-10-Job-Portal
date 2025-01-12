<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**State relation */
    function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    /**Country relation */
    function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
