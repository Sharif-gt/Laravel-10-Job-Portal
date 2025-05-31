<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Companie;
use App\Models\Job;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $amounts = Order::pluck('default_amount')->toArray();
        $totalEarning = calculateEarning($amounts);
        $totalCandidate = Candidate::count();
        $totalCompanies = Companie::count();
        $totalJobs = Job::count();
        $activeJobs = Job::where('deadline', '>=', date('Y-m-d'))->count();
        $pendingJobs = Job::where('status', 'pending')->count();
        $totalBlogs = Blog::count();

        return view('admin.dashboard.dashboard', compact('totalEarning', 'totalCandidate', 'totalCompanies', 'totalJobs', 'activeJobs', 'pendingJobs', 'totalBlogs'));
    }
}
