<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyPageController extends Controller
{
    function allCompany(): View
    {
        $allCompanies = Companie::where(['profile_completion' => 1, 'visibility' => 1])->get();
        return view('frontend.pages.company.all-company', compact('allCompanies'));
    }

    function companyPage(string $slug): View
    {
        $company = Companie::where(['profile_completion' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        return view('frontend.pages.company.company-info', compact('company'));
    }
}
