<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearnMore;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\Request;

class LearnMoreController extends Controller
{
    use FileImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learnMore = LearnMore::first();

        return view('admin.home-section.update-learn-more-section', compact('learnMore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'sub_title' => ['required'],
        ]);

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
        ];

        $image = $this->uploadFile($request, 'image', '/upload');
        if ($image) $data['image'] = $image;

        LearnMore::updateOrCreate(
            ['id' => 1],
            $data
        );

        Notify::updatedNotification();
        return redirect()->back();
    }
}
