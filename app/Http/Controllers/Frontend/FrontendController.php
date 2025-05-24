<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        $hero = Hero::first();
        $price = Price::where(['home_show' => 1])->get();
        $totalJobs = Job::count();
        $popularJobCategory = JobCategory::withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'));
        }])->where('popular', 1)->get();
        $featuredJobs = Job::where(['status' => 'active'])->where(['featured' => 1])->where('deadline', '>=', date('Y-m-d'))->take(8)->orderBy('id', 'DESC')->get();

        return view('frontend.pages.index', compact('hero', 'price', 'popularJobCategory', 'totalJobs', 'featuredJobs'));
    }
}
