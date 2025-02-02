<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidatePageController extends Controller
{
    function allCandidates(): View
    {
        $candidates = Candidate::where(['profile_complete' => 1, 'visibility' => 1])->get();
        return view('frontend.pages.candidate.all-candidate', compact('candidates'));
    }

    function candidateInfo(string $slug): View
    {
        $candidateInfo = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        return view('frontend.pages.candidate.candidate-info', compact('candidateInfo'));
    }
}
