<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Order;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyDashboardController extends Controller
{
    public function index(): View
    {
        $totalJobPost = Job::where('company_id', auth()->user()->company?->id)->count();
        $pendingJobs = Job::where('company_id', auth()->user()->company?->id)->where('status', 'pending')->count();
        $totalPackegeBuy = Order::where('company_id', auth()->user()->company?->id)->count();
        $planDetails = UserPlan::where('company_id', auth()->user()->company?->id)->first();

        return view('frontend.company-dashboard.dashboard', compact('totalJobPost', 'pendingJobs', 'totalPackegeBuy', 'planDetails'));
    }
}
