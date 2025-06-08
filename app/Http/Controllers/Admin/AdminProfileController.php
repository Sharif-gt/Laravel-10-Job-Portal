<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\FileImageUploadTrait;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    use FileImageUploadTrait;

    public function index()
    {
        $admin = auth()->guard('admin')->user();

        return view('admin.profile.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'image' => ['nullable', 'max:2000', 'image']
        ]);

        $image = $this->uploadFile($request, 'image', '/upload');

        $data = auth()->guard('admin')->user();
        $data->name = $request->name;
        $data->email = $request->email;
        if ($image) $data->image = $image;
        $data->save();

        Notify::updatedNotification();
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $data = auth()->guard('admin')->user();
        $data->password = bcrypt($request->password);
        $data->save();

        Notify::updatedNotification();
        return redirect()->back();
    }
}
