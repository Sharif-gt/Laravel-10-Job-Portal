<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use App\Services\Notify;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyChooseUs = WhyChooseUs::first();

        return view('admin.home-section.update-why-choose-us', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon_one' => ['nullable', 'max:255'],
            'title_one' => ['nullable', 'max:255'],
            'sub_title_one' => ['nullable', 'max:255'],
            'icon_two' => ['nullable', 'max:255'],
            'title_two' => ['nullable', 'max:255'],
            'sub_title_two' => ['nullable', 'max:255'],
            'icon_three' => ['nullable', 'max:255'],
            'title_three' => ['nullable', 'max:255'],
            'sub_title_three' => ['nullable', 'max:255'],
        ]);

        $data = [
            'title_one' => $request->title_one,
            'sub_title_one' => $request->sub_title_one,
            'title_two' => $request->title_two,
            'sub_title_two' => $request->sub_title_two,
            'title_three' => $request->title_three,
            'sub_title_three' => $request->sub_title_three,
        ];
        if ($request->filled('icon_one')) $data['icon_one'] = $request->icon_one;
        if ($request->filled('icon_two')) $data['icon_two'] = $request->icon_two;
        if ($request->filled('icon_three')) $data['icon_three'] = $request->icon_three;

        WhyChooseUs::updateOrCreate(
            ['id' => 1],
            $data
        );

        Notify::updatedNotification();
        return redirect()->back();
    }
}
