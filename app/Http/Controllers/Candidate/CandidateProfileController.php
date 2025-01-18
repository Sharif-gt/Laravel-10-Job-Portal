<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.candidate-dashboard.profile');
    }
}
