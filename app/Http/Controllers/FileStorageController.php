<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\StorageFile;
use Illuminate\Http\Request;

class FileStorageController extends Controller
{
    public function preview(Request $request,$file){
        try{
            $file = str_replace('.webp','',$file);
            $file = Helper::shortDecrypt($file);
            return StorageFile::preview($file);
        }catch(\Exception $e){}
        return null;
    }
}
