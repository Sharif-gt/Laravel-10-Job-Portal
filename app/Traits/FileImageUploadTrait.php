<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileImageUploadTrait
{
    /**
     * Handle file image uploads
     */

    //   = '/upload/company-profile'
    //  ?string $oldPath = null,
    function uploadFile(Request $request, string $inputName,  string $path): string
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $name = hexdec(uniqid()) . '.' . $ext;

            $image->move(public_path($path), $name);

            return $path . '/' . $name;
        }
        return '';
    }
}
