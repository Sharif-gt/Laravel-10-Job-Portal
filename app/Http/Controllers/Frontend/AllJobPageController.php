<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllJobPageController extends Controller
{
    public function index(Request $request): View
    {

        $selectedState = null;
        $selectedCity = null;

        $query = Job::query();
        $query->where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'));

        if ($request->has('search') && $request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('country') && $request->filled('country')) {
            $query->where('country_id', $request->country);
        }
        if ($request->has('state') && $request->filled('state')) {
            $query->where('state_id', $request->state);
            $selectedState = State::where('country_id', $request->country);
        }
        if ($request->has('city') && $request->filled('city')) {
            $query->where('city_id', $request->city);
            $selectedCity = City::where('state_id', $request->state);
        }
        if ($request->has('category') && $request->filled('category')) {
            $jobCate = JobCategory::where('slug', $request->category)->pluck('id')->toArray();
            $query->where('job_category_id', $jobCate);
        }
        if ($request->has('type') && $request->filled('type')) {
            $jobType = JobType::where('name', $request->type)->pluck('id')->toArray();
            $query->where('job_type_id', $jobType);
        }
        $jobs = $query->paginate(10);


        $countries = Country::all();
        $jobCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->get();
        $jobType = JobType::withCount(['jobs' => function ($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->get();

        return view('frontend.pages.all-jobs-index', compact('jobs', 'countries', 'jobCategories', 'jobType', 'selectedState', 'selectedCity'));
    }

    public function jobDetail(string $slug): View
    {
        $jobs = Job::where('slug', $slug)->firstOrFail();
        $openJob = Job::where('company_id', $jobs?->company?->id)->where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'))->count();

        return view('frontend.pages.job-details', compact('jobs', 'openJob'));
    }
}
