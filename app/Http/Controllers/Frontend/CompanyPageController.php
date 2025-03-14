<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Companie;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Organization;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyPageController extends Controller
{
    function allCompany(Request $request): View
    {
        $selectedState = null;
        $selectedCity = null;

        $query = Companie::query();
        $query->withCount(['jobs' => function ($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->where(['profile_completion' => 1, 'visibility' => 1]);

        if ($request->has('search') && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('country') && $request->filled('country')) {
            $query->where('country', $request->country);
        }
        if ($request->has('state') && $request->filled('state')) {
            $query->where('state', $request->state);
            $selectedState = State::where('country_id', $request->country);
        }
        if ($request->has('city') && $request->filled('city')) {
            $query->where('city', $request->city);
            $selectedCity = City::where('state_id', $request->state);
        }

        $allCompanies = $query->paginate(21);

        $countries = Country::all();
        $industries = Industry::withCount('company')->get();
        $organization = Organization::withCount('company')->get();

        return view('frontend.pages.company.all-company', compact('allCompanies', 'countries', 'selectedState', 'selectedCity', 'industries', 'organization'));
    }

    function companyPage(string $slug): View
    {
        $company = Companie::where(['profile_completion' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        $openJob = Job::where('company_id', $company?->id)->where('status', 'active')->where('deadline', '>=', date('Y-m-d'))->paginate(10);

        return view('frontend.pages.company.company-info', compact('company', 'openJob'));
    }
}
