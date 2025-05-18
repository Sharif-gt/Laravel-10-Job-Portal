<?php

namespace App\Traits;

trait Searchable
{
    function search($query, array $searchableField)
    {
        if (request()->has('search')) {
            return $query->where(function ($subquery) use ($searchableField) {
                foreach ($searchableField as $field) {
                    $subquery->orWhere($field, 'like', '%' . request('search') . '%');
                }
            });
        }
        return;
    }
}
