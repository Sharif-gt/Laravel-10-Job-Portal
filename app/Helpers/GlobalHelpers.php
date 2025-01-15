<?php



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
