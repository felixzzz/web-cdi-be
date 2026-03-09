<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Helpers\StorageFile;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminEditorController extends AdminController
{
    public function token(Request $request)
    {
        return response(Str::uuid(), 200)->header('Content-Type', 'text/plain');
    }

    public function upload(Request $request)
    {
        $file = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
        } elseif ($request->hasFile('upload')) {
            $file = $request->file('upload');
        }

        if ($file) {
            $url = StorageFile::upload($file, 'editor');

            $result = [
                '145' => previewFile($url),
                '225' => previewFile($url),
                'default' => previewFile($url),
            ];

            return response()->json($result);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
