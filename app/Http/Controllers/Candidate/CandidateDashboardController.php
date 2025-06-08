<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateDashboardController extends Controller
{
    public function index(): View
    {
        $totalAppliedJobs = JobPost::where('user_id', auth()->user()->candidateProfile?->id)->count();
        $totalBookmarkedJobs = Bookmark::where('user_id', auth()->user()->candidateProfile?->id)->count();
        $letestAppliedJob = JobPost::with('job')->where('user_id', auth()->user()->candidateProfile?->id)->orderBy('id', 'DESC')->take(10)->get();

        return view('frontend.candidate-dashboard.dashboard', compact('totalAppliedJobs', 'totalBookmarkedJobs', 'letestAppliedJob'));
    }

    public function appliedJob()
    {
        $countApplied = JobPost::where('user_id', auth()->user()->candidateProfile?->id)->count();
        $appliedJob = JobPost::with('job')->where('user_id', auth()->user()->candidateProfile?->id)->paginate();

        return view('frontend.candidate-dashboard.applied-job.applied-job', compact('appliedJob', 'countApplied'));
    }

    public function bookmarkedJob()
    {
        $bookmarkedJobs = Bookmark::with('job')->where('user_id', auth()->user()->candidateProfile?->id)->paginate(10);

        return view('frontend.candidate-dashboard.bookmark.index', compact('bookmarkedJobs'));
    }
}
