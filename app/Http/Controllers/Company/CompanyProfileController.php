<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoUpdateRequest;
use App\Http\Requests\Frontend\FoundingInfoRequest;
use App\Models\Companie;
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

        return view('frontend.company-dashboard.profile', compact('companieInfo'));
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

        notify()->success('Updated Successfully', 'Success');
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

        notify()->success('Updated Successfully', 'Success');
        return redirect()->back();
    }
}
