<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MailRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact-us');
    }

    public function mail(MailRequest $request)
    {
        Mail::to(config('generalSetting.site_email'))->send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response(['message' => 'Message sent successfully'], 200);
    }
}
