<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateAccountRequest;
use App\Http\Requests\Frontend\CandidateBesicInfoRequest;
use App\Http\Requests\Frontend\CandidateProfileSectionRequest;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\State;
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
        $candidateExperience = CandidateExperience::where('candidate_id', $candidatesInfo?->id)->orderBy('id', 'DESC')->get();
        $candidateEducation = CandidateEducation::where('candidate_id', $candidatesInfo?->id)->orderBy('id', 'DESC')->get();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();
        $countries = Country::all();
        $states = State::where('country_id', $candidatesInfo?->country)->get();
        $cities = City::where('state_id', $candidatesInfo?->state)->get();

        return view('frontend.candidate-dashboard.profile', compact('experiences', 'candidatesInfo', 'professions', 'skills', 'languages', 'candidateExperience', 'candidateEducation', 'countries', 'states', 'cities'));
    }

    public function store(CandidateBesicInfoRequest $request): RedirectResponse
    {

        $image = $this->uploadFile($request, 'image', '/upload');
        $cv = $this->uploadFile($request, 'cv', '/upload');

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

        if (candidateProfileCompletion()) {
            $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
            $candidateProfile->profile_complete = 1;
            $candidateProfile->visibility = 1;
            $candidateProfile->save();
        }

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

        if (candidateProfileCompletion()) {
            $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
            $candidateProfile->profile_complete = 1;
            $candidateProfile->visibility = 1;
            $candidateProfile->save();
        }

        Notify::updatedNotification();
        return redirect()->back();
    }

    public function accountSetting(CandidateAccountRequest $request)
    {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'phone_one' => $request->phone_number,
                'phone_two' => $request->secondary_phone,
            ]
        );

        if (candidateProfileCompletion()) {
            $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
            $candidateProfile->profile_complete = 1;
            $candidateProfile->visibility = 1;
            $candidateProfile->save();
        }

        Notify::updatedNotification();
        return redirect()->back();
    }
}
