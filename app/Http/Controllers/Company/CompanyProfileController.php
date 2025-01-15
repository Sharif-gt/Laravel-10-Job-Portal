<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoUpdateRequest;
use App\Http\Requests\Frontend\FoundingInfoRequest;
use App\Models\City;
use App\Models\Companie;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Organization;
use App\Models\State;
use App\Models\TeamSize;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    use FileImageUploadTrait;

    public function index(): View
    {
        $companieInfo = Companie::where('user_id', auth()->user()->id)->first();
        $Industrys = Industry::all();
        $organizations = Organization::all();
        $teamSize = TeamSize::all();
        $countries = Country::all();
        $states = State::select('id', 'name', 'country_id')->where('country_id', $companieInfo->country)->get();
        $cities = City::select('id', 'name', 'state_id')->where('state_id', $companieInfo->state)->get();

        return view('frontend.company-dashboard.profile', compact('companieInfo', 'Industrys', 'organizations', 'teamSize', 'countries', 'states', 'cities'));
    }

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath)) {
            $data['logo'] = $logoPath;
        }
        if (!empty($bannerPath)) {
            $data['banner'] = $bannerPath;
        }
        $data['username'] = $request->username;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Companie::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        if (companyProfileCompletion()) {
            $companyProfile = Companie::where('user_id', auth()->user()->id)->first();
            $companyProfile->profile_completion = 1;
            $companyProfile->visibility = 1;
            $companyProfile->save();
        }

        Notify::updatedNotification();
        return redirect()->back();
    }

    function foundingInfo(FoundingInfoRequest $request): RedirectResponse
    {
        Companie::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'industry_type_id' => $request->industry_type_id,
                'organization_type_id' => $request->organization_type_id,
                'team_size_id' => $request->team_size_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link
            ]
        );

        if (companyProfileCompletion()) {
            $companyProfile = Companie::where('user_id', auth()->user()->id)->first();
            $companyProfile->profile_completion = 1;
            $companyProfile->visibility = 1;
            $companyProfile->save();
        }

        Notify::updatedNotification();
        return redirect()->back();
    }
}
