<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        $blogs = Blog::where('status', 1)->latest()->take(9)->get();

        return view('frontend.pages.about-us', compact('about', 'blogs'));
    }
}
