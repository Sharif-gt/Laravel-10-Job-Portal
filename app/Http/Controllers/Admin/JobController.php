<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobCreateRequest;
use App\Models\Companie;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobBenefit;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobSkill;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\PostTag;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    use Searchable;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Job::query();
        $this->search($query, ['title', 'salary_mode']);
        $allPost = $query->paginate(20);

        return view('admin.job.job-post.index', compact('allPost'));
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
        // dd($request->all());

        $storeData = new Job();
        $storeData->title = $request->title;
        $storeData->company_id = $request->company;
        $storeData->job_category_id = $request->category;
        $storeData->vacancies = $request->vacancies;
        $storeData->deadline = $request->deadline;
        $storeData->country_id = $request->country;
        $storeData->state_id = $request->state;
        $storeData->city_id = $request->city;
        $storeData->address = $request->address;
        $storeData->salary_mode = $request->salary_mode;
        $storeData->min_salary = $request->min_salary;
        $storeData->max_salary = $request->max_salary;
        $storeData->custom_salary = $request->custom_salary;
        $storeData->salary_type_id = $request->salary_type;
        $storeData->job_experience_id = $request->experience;
        $storeData->job_role_id = $request->job_role;
        $storeData->education_id = $request->education;
        $storeData->job_type_id = $request->job_type;
        $storeData->apply_on = $request->receive_applications;
        $storeData->featured = $request->featured;
        $storeData->highlight = $request->highlight;
        $storeData->description = $request->description;
        $storeData->save();

        foreach ($request->tags as $tag) {
            $storeTag = new PostTag();
            $storeTag->job_id = $storeData->id;
            $storeTag->tag_id = $tag;
            $storeTag->save();
        }

        $benefits = explode(',', $request->benefits); // convert in ARRAY
        foreach ($benefits as $benefit) {
            $storeBenefit = new JobBenefit();
            $storeBenefit->company_id = $storeData->company_id;
            $storeBenefit->job_id = $storeData->id;
            $storeBenefit->name = $benefit;
            $storeBenefit->save();
        }

        foreach ($request->skills as $skill) {
            $storeSkill = new JobSkill();
            $storeSkill->job_id = $storeData->id;
            $storeSkill->skill_id = $skill;
            $storeSkill->save();
        }

        Notify::createdNotification();
        return to_route('admin.jobs.index');
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
