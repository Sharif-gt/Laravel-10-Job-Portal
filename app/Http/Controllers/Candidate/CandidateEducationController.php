<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateEducationStoreRequest;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidateEducation = CandidateEducation::where('candidate_id', auth()->user()->candidateProfile?->id)->orderBy('id', 'DESC')->get();

        return view('frontend.candidate-dashboard.ajax-education-table', compact('candidateEducation'))->render();
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
    public function store(CandidateEducationStoreRequest $request): Response
    {
        CandidateEducation::create([
            'candidate_id' => auth()->user()->candidateProfile?->id,
            'level' => $request->level,
            'degree' => $request->degree,
            'year' => $request->year,
            'note' => $request->note,
        ]);

        return response(['message' => 'Created Successfully.'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $education = CandidateEducation::findOrFail($id);
        return response($education);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateEducationStoreRequest $request, string $id): Response
    {
        $education = CandidateEducation::findOrFail($id);
        if (auth()->user()->candidateProfile?->id !== $education->candidate_id) {
            abort(404);
        }
        $education->level = $request->level;
        $education->degree = $request->degree;
        $education->year = $request->year;
        $education->note = $request->note;
        $education->save();

        return response(['message' => 'Updated Successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $candidateEducation = CandidateEducation::findOrFail($id);
            if (auth()->user()->candidateProfile?->id !== $candidateEducation->candidate_id) {
                abort(404);
            }
            $candidateEducation->delete();

            return response(['message' => 'Delete Successfully.'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
