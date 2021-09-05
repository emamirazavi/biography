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

    public static function savePortfolio($request)
    {
        $extension = $request->img->extension();
        $name = Str::orderedUuid();
        $request->img->storeAs('/public', $name . "." . $extension);
        return $name . "." . $extension;
    }

    public static function deleteFile($oldPath)
    {
        if ($oldPath) {
            $path = storage_path('app/public/' . $oldPath);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
