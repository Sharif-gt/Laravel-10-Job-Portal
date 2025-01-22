<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateBesicInfoRequest;
use App\Models\Candidate;
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
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();

        return view('frontend.candidate-dashboard.profile', compact('experiences', 'candidatesInfo', 'professions', 'skills', 'languages'));
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
}
