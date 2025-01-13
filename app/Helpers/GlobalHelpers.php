<?php

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
