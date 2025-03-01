<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllJobPageController extends Controller
{
    public function index(): View
    {
        $jobs = Job::where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'))->paginate(10);
        $countries = Country::all();

        return view('frontend.pages.all-jobs-index', compact('jobs', 'countries'));
    }

    public function jobDetail(string $slug): View
    {
        $jobs = Job::where('slug', $slug)->firstOrFail();
        $openJob = Job::where('company_id', $jobs?->company?->id)->where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'))->count();

        return view('frontend.pages.job-details', compact('jobs', 'openJob'));
    }
}
