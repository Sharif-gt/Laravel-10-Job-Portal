<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentSettingRequest;
use App\Http\Requests\Admin\StripePaymentRequest;
use App\Models\PaymentSetting;
use App\Services\Notify;
use App\Services\PaymentGatewaySetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentSettingController extends Controller
{
    function index(): View
    {
        return view('admin.payment.payment-settings');
    }

    function store(PaymentSettingRequest $request): RedirectResponse
    {
        $validateData = $request->validated();

        foreach ($validateData as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(PaymentGatewaySetting::class);
        $settingService->removeCacheSetting();

        Notify::updatedNotification();
        return redirect()->back();
    }

    function stripeStore(StripePaymentRequest $request): RedirectResponse
    {
        $validateData = $request->validated();

        foreach ($validateData as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(PaymentGatewaySetting::class);
        $settingService->removeCacheSetting();

        Notify::updatedNotification();
        return redirect()->back();
    }
}
