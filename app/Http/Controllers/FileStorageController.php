<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\StorageFile;
use Illuminate\Http\Request;

class FileStorageController extends Controller
{
    public function preview(Request $request,$file){
        if (!$file) return null;
        try{
            $file = str_replace('.webp','',$file);
            $file = Helper::shortDecrypt($file);
            return StorageFile::preview($file);
        }catch(\Exception $e){}
        return null;
    }

    public function download(Request $request, $file)
    {
        if (!$file) return null;
        try {
            $file = str_replace('.webp', '', $file);
            $file = Helper::shortDecrypt($file);
            return StorageFile::download($file);
        } catch (\Exception $e) {}
        return null;
    }

}
