<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class CompanyAccountController extends Controller
{
    function accountEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        Auth::user()->update(['email' => $request->email]);
        Notify::updatedNotification();
        return redirect()->back();
    }

    function accountPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        Auth::user()->update(['password' => bcrypt($request->password)]);

        Notify::updatedNotification();
        return redirect()->back();
    }
}
