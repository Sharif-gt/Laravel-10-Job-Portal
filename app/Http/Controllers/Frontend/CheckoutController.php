<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id): View
    {
        $plans = Price::findOrFail($id);
        Session::put('select_plan', $plans->toArray()); // save all value in Session

        return view('frontend.pages.checkout-plan', compact('plans'));
    }
}
