<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    function company(): BelongsTo
    {
        return $this->belongsTo(Companie::class, 'company_id', 'id');
    }

    function jobType(): BelongsTo
    {
        return $this->belongsTo(JobType::class, 'job_type_id', 'id');
    }

    function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }

    function jobRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class, 'job_role_id', 'id');
    }

    function salaryType(): BelongsTo
    {
        return $this->belongsTo(SalaryType::class, 'salary_type_id', 'id');
    }

    function postTag(): HasMany
    {
        return $this->hasMany(PostTag::class, 'job_id', 'id');
    }

    function jobBenefit(): HasMany
    {
        return $this->hasMany(JobBenefit::class, 'job_id', 'id');
    }

    function jobSkill(): HasMany
    {
        return $this->hasMany(JobSkill::class, 'job_id', 'id');
    }
}
