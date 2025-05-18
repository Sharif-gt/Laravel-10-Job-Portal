<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationAjaxController extends Controller
{
    function locationAjax(string $countryId): Response
    {
        $states = State::select(['id', 'name', 'country_id'])->where('country_id', $countryId)->get();
        return response($states);
    }
}
