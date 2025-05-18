<?php

namespace App\Providers;

use App\Services\GeneralSetting;
use Illuminate\Support\ServiceProvider;

class GeneralSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GeneralSetting::class, function () {
            return new GeneralSetting();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $generalSettings = $this->app->make(GeneralSetting::class);
        $generalSettings->setGeneralSetting();
    }
}
