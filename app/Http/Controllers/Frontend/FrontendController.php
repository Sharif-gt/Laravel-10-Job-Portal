<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Companie;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\LearnMore;
use App\Models\Price;
use App\Models\WhyChooseUs;
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
        $whyChooseUs = WhyChooseUs::first();
        $learnMore = LearnMore::first();
        $recruiters = Companie::select('id', 'name', 'logo', 'slug', 'country')->withCount(['jobs' => function ($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->where(['profile_completion' => 1, 'visibility' => 1])->latest()->take(45)->get();
        $blogs = Blog::where('status', 1)->latest()->take(9)->get();

        return view('frontend.pages.index', compact('hero', 'price', 'popularJobCategory', 'totalJobs', 'featuredJobs', 'whyChooseUs', 'learnMore', 'recruiters', 'blogs'));
    }
}
