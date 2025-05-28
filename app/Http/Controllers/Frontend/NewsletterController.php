<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscrib(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:subscribers,email']
        ]);

        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();

        return response(['message' => 'Subscribed Successfully']);
    }
}
