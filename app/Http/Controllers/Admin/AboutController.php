<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use FileImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::first();

        return view('admin.home-section.update-about-us', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'short_description' => ['required', 'max:255'],
            'description' => ['required'],
            'link' => ['nullable'],
        ]);

        $image = $this->uploadFile($request, 'image', '/upload');

        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'link' => $request->link,
        ];

        if ($image) $data['image'] = $image;

        AboutUs::updateOrCreate(
            ['id' => 1],
            $data
        );

        Notify::updatedNotification();
        return redirect()->back();
    }
}
