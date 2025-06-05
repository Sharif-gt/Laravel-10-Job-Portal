<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use FileImageUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:sections']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSection = Hero::first();

        return view('admin.home-section.update-home-section', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'bg_image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
        ]);

        $image = $this->uploadFile($request, 'image', '/upload');
        $bgImage = $this->uploadFile($request, 'bg_image', '/upload');

        $heroData = [];
        if ($image) $heroData['image'] = $image;
        if ($bgImage) $heroData['bg_image'] = $bgImage;
        $heroData['title'] = $request->title;
        $heroData['sub_title'] = $request->sub_title;

        Hero::updateOrCreate(
            ['id' => 1],
            $heroData
        );

        Notify::updatedNotification();
        return to_route('admin.hero.index');
    }
}
