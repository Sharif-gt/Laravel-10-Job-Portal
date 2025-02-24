<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyJobCreateRequest;
use App\Models\City;
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
use App\Models\State;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CompanyJobController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Job::query();
        $this->search($query, ['title', 'salary_mode']);
        $allPost = $query->where('company_id', auth()->user()->company->id)->orderBy('id', 'DESC')->paginate(20);

        return view('frontend.company-dashboard.jobs.index', compact('allPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $category = JobCategory::all();
        $country = Country::all();
        $salaryType = SalaryType::all();
        $experience = Experience::all();
        $jobRole = JobRole::all();
        $education = Education::all();
        $jobType = JobType::all();
        $tags = JobTag::all();
        $skills = Skill::all();

        return view('frontend.company-dashboard.jobs.create', compact('category', 'country', 'salaryType', 'experience', 'jobRole', 'education', 'jobType', 'tags', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyJobCreateRequest $request): RedirectResponse
    {
        $storeData = new Job();
        $storeData->title = $request->title;
        $storeData->company_id = auth()->user()->company->id;
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
        return to_route('company.jobs-post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $jobPost = Job::findOrFail($id);
        $category = JobCategory::all();
        $country = Country::all();
        $salaryType = SalaryType::all();
        $experience = Experience::all();
        $jobRole = JobRole::all();
        $education = Education::all();
        $jobType = JobType::all();
        $tags = JobTag::all();
        $skills = Skill::all();
        $state = State::where('country_id', $jobPost->country_id)->get();
        $city = City::where('state_id', $jobPost->state_id)->get();

        return view('frontend.company-dashboard.jobs.edit', compact('jobPost', 'category', 'country', 'salaryType', 'experience', 'jobRole', 'education', 'jobType', 'tags', 'skills', 'state', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyJobCreateRequest $request, string $id): RedirectResponse
    {
        $storeData = Job::findOrFail($id);
        $storeData->title = $request->title;
        $storeData->company_id = auth()->user()->company->id;
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

        PostTag::where('job_id', $id)->delete();
        foreach ($request->tags as $tag) {
            $storeTag = new PostTag();
            $storeTag->job_id = $storeData->id;
            $storeTag->tag_id = $tag;
            $storeTag->save();
        }

        JobBenefit::where('job_id', $id)->delete();
        $benefits = explode(',', $request->benefits); // convert in ARRAY
        foreach ($benefits as $benefit) {
            $storeBenefit = new JobBenefit();
            $storeBenefit->company_id = $storeData->company_id;
            $storeBenefit->job_id = $storeData->id;
            $storeBenefit->name = $benefit;
            $storeBenefit->save();
        }

        JobSkill::where('job_id', $id)->delete();
        foreach ($request->skills as $skill) {
            $storeSkill = new JobSkill();
            $storeSkill->job_id = $storeData->id;
            $storeSkill->skill_id = $skill;
            $storeSkill->save();
        }

        Notify::updatedNotification();
        return to_route('company.jobs-post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Job::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
