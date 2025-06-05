<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsLetterMail;
use App\Models\Subscriber;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:news letter']);
    }

    public function index()
    {
        $query = Subscriber::query();
        $this->search($query, ['email']);
        $allSubscribers = $query->paginate(20);

        return view('admin.subscriber.index', compact('allSubscribers'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::all();
        foreach ($subscribers as $key => $subscriber) {
            Mail::to($subscriber->email)->send(new NewsLetterMail($request->subject, $request->message));
        }

        Notify::mailSendNotification();
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        try {
            Subscriber::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something went wrong. Please try again!'], 500);
        }
    }
}
