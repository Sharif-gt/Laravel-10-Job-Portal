<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidatePageController extends Controller
{
    function allCandidates(Request $request): View
    {
        $professions = Profession::all();
        $experiences = Experience::all();
        $query = Candidate::query();
        $query->where(['profile_complete' => 1, 'visibility' => 1])->get();

        if ($request->has('professions') && $request->filled('professions')) {
            $query->where('profession_id', $request->professions);
        }
        if ($request->has('experience') && $request->filled('experience')) {
            $query->where('experience_id', $request->experience);
        }

        $candidates = $query->paginate(15);

        return view('frontend.pages.candidate.all-candidate', compact('candidates', 'professions', 'experiences'));
    }

    function candidateInfo(string $slug): View
    {
        $candidateInfo = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        return view('frontend.pages.candidate.candidate-info', compact('candidateInfo'));
    }
}
