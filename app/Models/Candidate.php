<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }


    function skill(): HasMany
    {
        return $this->hasMany(CandidateSkill::class, 'candidate_id', 'id');
    }

    function language(): HasMany
    {
        return $this->hasMany(CandidateLanguage::class, 'candidate_id', 'id');
    }

    function candidateCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    function candidateState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }

    function candidateCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    function experience(): HasMany
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function education(): HasMany
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function experienceYear(): BelongsTo
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }

    function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }
}
