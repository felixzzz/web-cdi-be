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
            // Image
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'image/webp',
            'image/svg+xml',
            'image/bmp',
            'image/tiff',
            'image/x-icon',

            // Video
            'video/mp4',
            'video/mpeg',
            'video/ogg',
            'video/webm',
            'video/x-msvideo', // AVI
            'video/quicktime', // MOV
            'video/x-ms-wmv',  // WMV
            'video/3gpp',
            'video/3gpp2',

            // Document
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

        return Helper::shortEncrypt($fileUrl);
    }

    public static function uploadWithDetails($file, $location = "")
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
            'image/webp',
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

        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug(pathinfo($name, PATHINFO_FILENAME)) . '.' . $extension;
        $filePath = Storage::disk('local')->putFileAs("{$location}", $file, $filename);
        $fileSize = self::formatSize($file->getSize());

        return [
            'path' => Helper::shortEncrypt($filePath),
            'size' => $fileSize,
            'format' => $extension,
        ];
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

    private static function formatSize($size)
    {
        if ($size >= 1048576) { // Lebih dari 1MB
            return round($size / 1048576, 2) . ' MB';
        } elseif ($size >= 1024) { // Lebih dari 1KB
            return round($size / 1024, 2) . ' KB';
        }
        return $size . ' B'; // Dalam byte
    }


}
