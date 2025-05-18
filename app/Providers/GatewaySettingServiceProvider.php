<?php

namespace App\Providers;

use App\Services\PaymentGatewaySetting;
use Illuminate\Support\ServiceProvider;

class GatewaySettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGatewaySetting::class, function () {
            return new PaymentGatewaySetting();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentGatewaySetting = $this->app->make(PaymentGatewaySetting::class);
        $paymentGatewaySetting->setGlobalSetting();
    }
}
