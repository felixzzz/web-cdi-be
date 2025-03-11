<?php

namespace App\Http\Controllers\Admin\Utility;

use Illuminate\Support\Str;
use App\Helpers\StorageFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

class AdminEditorController extends AdminController
{
    public function token(Request $request)
    {
        return response(Str::uuid(), 200)->header('Content-Type', 'text/plain');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $url = StorageFile::upload($request->file('file'),'editor');
            $result = [
                '145' => previewFile($url),
                '225' => previewFile($url),
                'default' => previewFile($url)
            ];
            return response()->json($result);
        }
        return '';
    }
}
