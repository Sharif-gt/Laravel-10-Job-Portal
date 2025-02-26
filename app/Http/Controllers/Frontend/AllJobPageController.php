<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllJobPageController extends Controller
{
    public function index(): View
    {
        $jobs = Job::where(['status' => 'active'])
            ->where('deadline', '>=', date('Y-m-d'))->paginate(10);

        return view('frontend.pages.all-jobs-index', compact('jobs'));
    }
}
