<?php

namespace App\Services;

use App\Models\Order;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderServices
{

    static function storeOrder(string $transactionId, string $paymentProvider, string $amount, string $paidInCurrency, string $paymentStatus)
    {

        $order = new Order();
        $order->company_id = Auth::user()->company->id;
        $order->plan_id = Session::get('select_plan')['id'];
        $order->package_name = Session::get('select_plan')['lable'];
        $order->transaction_id = $transactionId;
        $order->order_id = uniqid();
        $order->payment_provider = $paymentProvider;
        $order->amount = $amount;
        $order->paid_in_currency = $paidInCurrency;
        $order->default_amount =  Session::get('select_plan')['price'];
        $order->payment_status = $paymentStatus;
        $order->save();
    }

    static function setUserPlan()
    {
        $userPlan = UserPlan::where('company_id', Auth::user()->company->id)->first();

        UserPlan::updateOrCreate(
            ['company_id' => Auth::user()->company->id],
            [
                'price_id' => Session::get('select_plan')['id'],
                'job_limit' => $userPlan?->job_limit ?
                    $userPlan->job_limit + Session::get('select_plan')['job_limit'] :
                    Session::get('select_plan')['job_limit'],
                'featured_job_limit' => $userPlan?->featured_job_limit ?
                    $userPlan->featured_job_limit + Session::get('select_plan')['feature_job_limit'] :
                    Session::get('select_plan')['feature_job_limit'],
                'highlight_job_limit' => $userPlan?->highlight_job_limit ?
                    $userPlan?->highlight_job_limit + Session::get('select_plan')['highlight_job_limit'] :
                    Session::get('select_plan')['highlight_job_limit'],
                'profile_verified' => Session::get('select_plan')['profile_verified'],
            ]
        );
    }
}
