<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\StorageFile;
use App\Models\Utility\AdditionalFile;
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

    public function filePreview($lang = 'default', $type = null, $key = null)
    {
        try{
            $row = AdditionalFile::where("type", $type)->where("unique_key", $key)->first();
            if ($lang !=  'default') {
                $file = $lang == 'id' ? $row->file_id : $row->file_en;
                $file = Helper::shortDecrypt($file['path']);
            } else {
                $file = json_decode($row->file);
                $file = Helper::shortDecrypt($file->path);
            }
            return StorageFile::preview($file);
        }catch(\Exception $e){}
        return null;
    }

    public function fileDownload($lang = 'default', $type = null, $key = null)
    {
        try{
            $row = AdditionalFile::where("type", $type)->where("unique_key", $key)->first();
            if ($lang !=  'default') {
                $file = $lang == 'id' ? $row->file_id : $row->file_en;
                $file = Helper::shortDecrypt($file['path']);
            } else {
                $file = json_decode($row->file);
                $file = Helper::shortDecrypt($file->path);
            }
            return StorageFile::download($file);
        }catch(\Exception $e){}
        return null;
    }

}
