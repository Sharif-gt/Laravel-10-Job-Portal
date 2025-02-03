<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PricingPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $pricing = Price::where(['frontend_show' => 1])->get();

        return view('frontend.pages.pricing', compact('pricing'));
    }
}
