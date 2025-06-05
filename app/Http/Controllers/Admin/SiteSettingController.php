<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteGeneralSettingRequest;
use App\Models\SiteSetting;
use App\Services\GeneralSetting;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:site settings']);
    }

    function index(): View
    {
        return view('admin.site-setting.site-setting');
    }

    function store(SiteGeneralSettingRequest $request): RedirectResponse
    {
        $settingData = $request->validated();

        foreach ($settingData as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $generalSetting = app(GeneralSetting::class);
        $generalSetting->clearGeneralSetting();

        Notify::updatedNotification();
        return redirect()->back();
    }
}
