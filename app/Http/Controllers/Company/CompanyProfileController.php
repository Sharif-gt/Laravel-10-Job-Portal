<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoUpdateRequest;
use App\Models\Companie;
use App\Traits\FileImageUploadTrait;
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

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request)
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

        return redirect()->back();
    }
}
