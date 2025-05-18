<?php

namespace App\Services;

use App\Models\PaymentSetting;
use Illuminate\Support\Facades\Cache;

class PaymentGatewaySetting
{

    function getSetting()
    {
        return Cache::rememberForever('gatewaySetting', function () {
            return PaymentSetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSetting()
    {
        $setting = $this->getSetting();
        config()->set('gatewaySetting', $setting);
    }

    function removeCacheSetting()
    {
        Cache::forget('gatewaySetting');
    }
}
