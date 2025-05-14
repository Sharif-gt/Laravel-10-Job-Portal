<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JobPostController extends Controller
{
    public function jobPost($id)
    {
        if (!auth()->check()) {
            throw ValidationException::withMessages(['Please Login First.']);
        }

        $jobApplied = JobPost::where(['user_id' => auth()->user()->candidateProfile->id, 'job_id' => $id])->exists();
        if ($jobApplied) {
            throw ValidationException::withMessages(['You already applied to this job!']);
        }

        $applyJob = new JobPost();
        $applyJob->job_id = $id;
        $applyJob->user_id = auth()->user()->candidateProfile->id;
        $applyJob->save();

        return response(['message' => 'Applied Successfully.'], 200);
    }
}
