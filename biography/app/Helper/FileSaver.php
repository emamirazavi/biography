<?php

namespace App\Helper;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FileSaver
{
    public static function saveAvatar($request)
    {
        $extension = $request->avatar->extension();
        $name = Str::orderedUuid();
        $request->avatar->storeAs('/public', $name . "." . $extension);
        return $name . "." . $extension;
    }

    public static function deleteAvatar($oldAvatar)
    {
        if ($oldAvatar) {
            $path = storage_path('app/public/' . $oldAvatar);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
