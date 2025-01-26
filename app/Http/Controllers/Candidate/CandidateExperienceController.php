<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateExperienceStoreRequest;
use App\Models\CandidateExperience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateExperience = CandidateExperience::where('candidate_id', auth()->user()->candidateProfile->id)->orderBy('id', 'DESC')->get();

        return view('frontend.candidate-dashboard.ajax-experience-table', compact('candidateExperience'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateExperienceStoreRequest $request): Response
    {
        $experience = new CandidateExperience();
        $experience->candidate_id = auth()->user()->candidateProfile->id;
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->responsibility = $request->responsibility;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Created Successfully.'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $experienceData = CandidateExperience::findOrFail($id);

        return response($experienceData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateExperienceStoreRequest $request, string $id): Response
    {
        $experience = CandidateExperience::findOrFail($id);
        if (auth()->user()->candidateProfile->id !== $experience->candidate_id) {
            abort(404);
        }
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->responsibility = $request->responsibility;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;
        $experience->save();

        return response(['message' => 'Updated Successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $candidateExperience = CandidateExperience::findOrFail($id);
            if (auth()->user()->candidateProfile->id !== $candidateExperience->candidate_id) {
                abort(404);
            }
            $candidateExperience->delete();

            return response(['message' => 'Delete Successfully.'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
