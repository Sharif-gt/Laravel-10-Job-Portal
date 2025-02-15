<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobCreateRequest;
use App\Models\Companie;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.job.job-post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $companies = Companie::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $category = JobCategory::all();
        $country = Country::all();
        $salaryType = SalaryType::all();
        $experience = Experience::all();
        $jobRole = JobRole::all();
        $education = Education::all();
        $jobType = JobType::all();
        $tags = JobTag::all();
        $skills = Skill::all();

        return view('admin.job.job-post.create', compact('companies', 'category', 'country', 'salaryType', 'experience', 'jobRole', 'education', 'jobType', 'tags', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request)
    {
        dd($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
