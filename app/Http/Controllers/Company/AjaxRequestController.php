<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AjaxRequestController extends Controller
{
    function stateRequest(string $countryId): Response
    {
        $states = State::select('id', 'name', 'country_id')->where('country_id', $countryId)->get();
        return response($states);
    }

    function citysRequest(string $stateId): Response
    {
        $cities = City::select('id', 'name', 'state_id')->where('state_id', $stateId)->get();
        return response($cities);
    }
}
