<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\StorageFile;
use App\Models\Governance\GovernanceCommitte;
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
            if ($type == 'committe') {
                $field = app()->currentLocale() == 'en' ? 'tab_title_en' : 'tab_title_id';
                $row = GovernanceCommitte::where($field, $key)->first();
                $file = $row->file;
                $file = Helper::shortDecrypt($file['path']);
                return StorageFile::preview($file);
            } else {
                $row = AdditionalFile::where("type", $type)->where("unique_key", $key)->first();
                if ($lang !=  'default') {
                    $file = $lang == 'id' ? $row->file_id : $row->file_en;
                    $file = Helper::shortDecrypt($file['path']);
                } else {
                    $file = json_decode($row->file);
                    $file = Helper::shortDecrypt($file->path);
                }
                return StorageFile::preview($file);
            }
        }catch(\Exception $e){}
        return null;
    }

    public function fileDownload($lang = 'default', $type = null, $key = null)
    {
        try{
            $fileName = null;
            if ($type == 'committe') {
                $field = app()->currentLocale() == 'en' ? 'tab_title_en' : 'tab_title_id';
                $row = GovernanceCommitte::where($field, $key)->first();
                $file = $row->file;
                $file = Helper::shortDecrypt($file['path']);
                $fileName = $key;
            } else {
                $row = AdditionalFile::where("type", $type)->where("unique_key", $key)->first();
                if ($lang !=  'default') {
                    $fileName = $lang == 'id' ? $row->name_id : $row->name_en;
                    $file = $lang == 'id' ? $row->file_id : $row->file_en;
                    $file = Helper::shortDecrypt($file['path']);
                } else {
                    $fileName = $row->name;
                    $file = json_decode($row->file);
                    $file = Helper::shortDecrypt($file->path);
                }
            }
            return StorageFile::download($file, $fileName);
        }catch(\Exception $e){}
        return null;
    }

}
