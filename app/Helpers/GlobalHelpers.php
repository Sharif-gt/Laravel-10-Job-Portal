<?php

use App\Models\Candidate;
use App\Models\Companie;


/***Active sidebar helper */

if (!function_exists('sidebarActive')) {
    function sidebarActive(array $routes): ?String
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return null;
    }
}

/**Cheack company profile completion */

if (!function_exists('companyProfileCompletion')) {
    function companyProfileCompletion(): bool
    {
        $requiredField = ['logo', 'banner', 'username', 'name', 'bio', 'vision', 'industry_type_id', 'organization_type_id', 'team_size_id', 'email', 'phone', 'establishment_date', 'country'];

        $companyProfile = Companie::where('user_id', auth()->user()->id)->first();

        foreach ($requiredField as $field) {
            if (empty($companyProfile->{$field})) {
                return false;
            }
        }
        return true;
    }
}

/**Cheack candidate profile completion */

if (!function_exists('candidateProfileCompletion')) {
    function candidateProfileCompletion()
    {
        $requiredField = ['experience_id', 'profession_id', 'image', 'full_name', 'gender', 'birth_date', 'status', 'country'];
        $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

        foreach ($requiredField as $field) {
            if (empty($candidateProfile->{$field})) {
                return false;
            }
        }
        return true;
    }
}

/**format date */

if (!function_exists('formatDate')) {
    function formatDate(?string $date)
    {
        return date('d M Y', strtotime($date));
    }
}

/**store user plan in session */

if (!function_exists('storeUserPlan')) {
    function storeUserPlan()
    {
        session()->forget('user_plan');
        session([
            'user_plan' => isset(auth()->user()?->company?->userPlan) ?
                auth()->user()->company->userPlan : []
        ]);
    }
}
