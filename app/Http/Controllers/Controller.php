<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($file, $dir)
    {
        //$file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $filename = uniqid() . '_' . time() . '.' . $extension;

        $file->move("uploads/{$dir}", $filename);
        return $filename;
    }

    public function deleteImage($path)
    {
        return File::delete('uploads/' . $path);
    }

    public function isSelected($val1, $val2)
    {
        if (is_array($val2)) {
            if (in_array($val1, $val2)) {
                return "selected";
            } else {
                return "";
            }
        } else {
            if ($val1 == $val2) {
                return "selected";
            } else {
                return "";
            }
        }
    }
}
