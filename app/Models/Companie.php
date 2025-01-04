<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Companie extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $guarded = [];

    // protected $fillable = [
    //     'user_id',
    //     'name',
    //     'username',
    //     'logo',
    //     'banner',
    //     'bio',
    //     'vision',
    // ];
}
