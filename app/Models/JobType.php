<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobType extends Model
{
    use HasFactory;

    protected $guarded = [];

    function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'job_type_id', 'id');
    }
}
