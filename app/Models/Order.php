<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    function company(): BelongsTo
    {
        return $this->belongsTo(Companie::class);
    }

    function plan(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }
}
