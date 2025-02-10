<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    /**
     * Paypal payments
     */

    /***set paypal config */
    function setPaypalConfig(): array
    {
        return [
            'mode'    => config('gatewaySetting.paypal_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySetting.paypal_client_id'),
                'client_secret'     => config('gatewaySetting.paypal_client_secret'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySetting.paypal_client_id'),
                'client_secret'     => config('gatewaySetting.paypal_client_secret'),
                'app_id'            => config('gatewaySetting.paypal_app_id'),
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySetting.paypal_currency'),
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
    }
    /***handle paymant redirect */
    function payWithPaypal()
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        //calculate payable amount
        $payableAmount = round(Session::get('select_plan')['price'] * config('gatewaySetting.paypal_currency_rate'));
    }

    function paypalSuccess()
    {
        //
    }

    function paypalCancle()
    {
        //
    }
}
