<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        $price = Price::where(['home_show' => 1])->get();

        return view('frontend.pages.index', compact('price'));
    }
}
