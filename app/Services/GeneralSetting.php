<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class GeneralSetting
{

    function getGeneralSetting()
    {
        return Cache::rememberForever('generalSetting', function () {
            return SiteSetting::pluck('value', 'key')->toArray();
        });
    }

    function setGeneralSetting()
    {
        $setting = $this->getGeneralSetting();
        config()->set('generalSetting', $setting);
    }

    function clearGeneralSetting()
    {
        Cache::forget('generalSetting');
    }
}
