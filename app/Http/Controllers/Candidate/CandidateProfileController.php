<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateBesicInfoRequest;
use App\Http\Requests\Frontend\CandidateProfileSectionRequest;
use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{
    use FileImageUploadTrait;

    public function index(): View
    {
        $experiences = Experience::all();
        $candidatesInfo = Candidate::where('user_id', auth()->user()->id)->first();
        $candidateExperience = CandidateExperience::where('candidate_id', $candidatesInfo->id)->orderBy('id', 'DESC')->get();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();

        return view('frontend.candidate-dashboard.profile', compact('experiences', 'candidatesInfo', 'professions', 'skills', 'languages', 'candidateExperience'));
    }

    public function store(CandidateBesicInfoRequest $request): RedirectResponse
    {

        $image = $this->uploadFile($request, 'image', '/upload/candidate-profile');
        $cv = $this->uploadFile($request, 'cv', '/upload/candidate-cv');

        $uploadData = [];

        if (!empty($image)) {
            $uploadData['image'] = $image;
        }
        if (!empty($cv)) {
            $uploadData['cv'] = $cv;
        }
        $uploadData['full_name'] = $request->full_name;
        $uploadData['title'] = $request->title;
        $uploadData['experience_id'] = $request->experience_level;
        $uploadData['website'] = $request->website;
        $uploadData['birth_date'] = $request->date_of_birth;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $uploadData
        );

        Notify::updatedNotification();
        return redirect()->back();
    }

    public function profileInfo(CandidateProfileSectionRequest $request): RedirectResponse
    {
        $data = [];
        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->marital_status;
        $data['profession_id'] = $request->profession;
        $data['status'] = $request->status;
        $data['bio'] = $request->bio;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        CandidateSkill::where('candidate_id', $candidate->id)?->delete();
        foreach ($request->skills as $skill) {
            $candidateSkill = new CandidateSkill();
            $candidateSkill->candidate_id = $candidate->id;
            $candidateSkill->skill_id = $skill;
            $candidateSkill->save();
        }

        CandidateLanguage::where('candidate_id', $candidate->id)?->delete();
        foreach ($request->languages as $language) {
            $candidateLan = new CandidateLanguage();
            $candidateLan->candidate_id = $candidate->id;
            $candidateLan->language_id = $language;
            $candidateLan->save();
        }

        Notify::updatedNotification();
        return redirect()->back();
    }
}
