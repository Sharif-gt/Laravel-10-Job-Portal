<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{
    /**
     * Redirect Page
     */
    function paymentSuccess(): View
    {
        return view('frontend.pages.payment-success');
    }

    function paymentError(): View
    {
        return view('frontend.pages.payment-error');
    }

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
        abort_if(!$this->checkSession(), 404);
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        //calculate payable amount
        $payableAmount = round(Session::get('select_plan')['price'] * config('gatewaySetting.paypal_currency_rate'));

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('company.paypal.success'),
                'cancel_url' => route('company.paypal.cancle'),
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('gatewaySetting.paypal_currency'),
                        'value' => $payableAmount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] !== NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    function paypalSuccess(Request $request)
    {
        abort_if(!$this->checkSession(), 404);
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {

            //store order
            $capture = $response['purchase_units'][0]['payments']['captures'][0];
            OrderServices::storeOrder($capture['id'], 'payPal', $capture['amount']['value'], $capture['amount']['currency_code'], 'paid');

            OrderServices::setUserPlan();

            Session::forget('select_plan');
            return redirect()->route('company.payment.success');
        }

        return redirect()->route('company.payment.error')->withErrors(['error' => $response['error']['message']]);
    }

    function paypalCancle()
    {
        return redirect()->route('company.payment.error')->withErrors(['error' => 'Something Wrong!']);
    }

    /***stripe */

    function payWithStripe()
    {
        abort_if(!$this->checkSession(), 404);
        Stripe::setApiKey(config('gatewaySetting.stripe_client_secret'));

        //calculate payable amount and convert to cent
        $payableAmount = round(Session::get('select_plan')['price'] * config('gatewaySetting.stripe_currency_rate')) * 100;

        $response = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => config('gatewaySetting.stripe_currency'),
                        'product_data' => [
                            'name' => Session::get('select_plan')['lable'] . ' Package'
                        ],
                        'unit_amount' => $payableAmount
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('company.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('company.stripe.cancel')
        ]);

        return redirect()->away($response->url);
    }

    function stripeSuccess(Request $request)
    {
        abort_if(!$this->checkSession(), 404);
        Stripe::setApiKey(config('gatewaySetting.stripe_client_secret'));
        $sessionId = $request->session_id;

        $response = StripeSession::retrieve($sessionId);

        if ($response->payment_status === 'paid') {

            OrderServices::storeOrder($response->payment_intent, 'stripe', ($response->amount_total / 100), $response->currency, 'paid');

            OrderServices::setUserPlan();

            Session::forget('select_plan');
            return redirect()->route('company.payment.success');
        } else {
            redirect()->route('company.payment.error')->withErrors(['error' => 'Payment Faild']);
        }
    }

    function stripeCancel()
    {
        redirect()->route('company.payment.error')->withErrors(['error' => 'Something Wrong!']);
    }
    /**check session */
    function checkSession()
    {
        if (session()->has('select_plan')) {
            return true;
        }
        return false;
    }
}
