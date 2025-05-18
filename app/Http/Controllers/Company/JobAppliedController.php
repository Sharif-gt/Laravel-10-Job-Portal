<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobAppliedController extends Controller
{
    public function index($id)
    {
        $jobName = Job::select('title')->where('id', $id)->first();
        $totalAppliedCandidate = JobPost::where('job_id', $id)->count();
        $AppliedCandidate = JobPost::where('job_id', $id)->paginate(20);

        return view('frontend.company-dashboard.job-application.index', compact('jobName', 'totalAppliedCandidate', 'AppliedCandidate'));
    }
}
