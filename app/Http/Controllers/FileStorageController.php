<?php

namespace App\Http\Controllers;

use App\Helpers\StorageFile;
use Illuminate\Http\Request;

class FileStorageController extends Controller
{
    public function preview(Request $request,$file){
        try{
            $file = str_replace('.webp','',$file);
            $file = decrypt($file);
            return StorageFile::preview($file);
        }catch(\Exception $e){}
        return null;
    }
}
