<?php
namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class StorageFile
{
    public static function upload($file, $location = "")
    {
        if (!$file) {
            return null;
        }

        $mimeType = $file->getMimeType();
        $allowedMimeTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-excel',
        ];

        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new \Exception('Invalid file type');
        }

        $name = $file->getClientOriginalName();
        if (str_contains($name, '.php')) {
            throw new \Exception('Invalid file type');
        }

        $extension = "." . $file->getClientOriginalExtension();
        $filename = Str::slug(str_replace($extension, "", $name)) . $extension;
        $fileUrl = Storage::disk('local')->putFileAs("{$location}", $file, $filename);

        return encrypt($fileUrl);
    }

    public static function preview($filename)
    {
        $disk = 'local';
        $cacheTime = 31536000; // 24 hour

        $mimeType = Cache::remember("file_mime_cache_{$filename}", $cacheTime, function () use ($disk, $filename) {
            return Storage::disk($disk)->mimeType($filename);
        });
        $fileContent = Cache::remember("file_cache_{$filename}", $cacheTime, function () use ($disk, $filename, $mimeType) {
            if (Storage::disk($disk)->exists($filename)) {
                return Storage::disk($disk)->get($filename); // Get file content
            }
            return null; // Return null if file doesn't exist
        });

        if (!$fileContent) {
            abort(404);
        }


        if (str_contains($mimeType, 'image/')) {
            $mimeType = 'image/webp';
        }
        $filenames = explode('/',$filename);
        $fileName = @$filenames[count($filenames)-1];

        return response($fileContent)
            ->withHeaders([
                'Content-Type' => $mimeType,
                'Cache-Control' => "public, max-age=$cacheTime,immutable",
                'Content-disposition' => 'filename="'.$fileName.'"'
            ]);
    }
}
