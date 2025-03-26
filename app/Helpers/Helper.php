<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Helper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function menuAdmin()
    {
        $menuItems = config('menu');

        foreach ($menuItems as $key => $value) {
            $menuItems[$key] = self::menuToObjects($value); // Simpan hasil konversi
        }

        return $menuItems;
    }

    private static function menuToObjects(array $items)
    {
        return array_map(function ($item) {
            // Convert sub items if they exist
            if (isset($item['sub']) && is_array($item['sub'])) {
                $sub = self::menuToObjects($item['sub']);
                $item['sub'] = $sub;
            } else {
                $item['sub'] = [];
            }
            // Convert route name to URL if route is specified
            if (!empty($item['route'])) {
                if (!empty($item['route_params'])) {
                    $item['route'] = route($item['route'], @$item['route_params']);
                } else {
                    $item['route'] = route($item['route']);
                }
            }
            return (object) $item;
        }, $items);
    }

    public static function getTitleTypeGovernance($type)
    {
        switch ($type) {
            case 'policy':
                return 'Policy';
                break;
            case 'risk-management':
                return 'Risk Management';
                break;
            case 'code-of-conduct':
                return 'Code of Conduct';
                break;
            case 'she-regulation':
                return 'SHE Regulation';
                break;

            default:
                return '';
                break;
        }
    }

    public static function shortEncrypt($value)
    {
        $key = substr(config('app.key'), 0, 16); // Ambil 16 karakter pertama dari APP_KEY
        $iv = '1234567890123456'; // IV tetap, pastikan 16 karakter
        $encrypted = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);

        return rtrim(strtr(base64_encode($encrypted), '+/', '-_'), '='); // Buat lebih pendek
    }

    public static function shortDecrypt($encryptedValue)
    {
        $key = substr(config('app.key'), 0, 16);
        $iv = '1234567890123456';
        $decoded = base64_decode(strtr($encryptedValue, '-_', '+/'));

        return openssl_decrypt($decoded, 'AES-128-CBC', $key, 0, $iv);
    }

    public static function handleMoveImage($value, $path)
    {
        if (!empty($value)) {
            // Debugging
            Log::info("Original Value: " . $value);

            // Ambil nama file asli
            $originalPath = parse_url($value, PHP_URL_PATH);
            if (!$originalPath) {
                Log::error("Error: Invalid file path - " . $value);
                return null;
            }

            Log::info("Parsed Path: " . $originalPath);

            $filename = pathinfo($originalPath, PATHINFO_BASENAME);
            Log::info("Filename: " . $filename);

            // Buat nama file baru yang dienkripsi
            $newFilename = Str::random(40) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
            $storagePath = "{$path}/{$newFilename}";
            $localPath = public_path($originalPath);

            Log::info("Local Path: " . $localPath);

            if (file_exists($localPath)) {
                try {
                    Storage::disk('local')->put($storagePath, file_get_contents($localPath));
                    return self::shortEncrypt($storagePath);
                } catch (\Exception $e) {
                    Log::error("Storage Error: " . $e->getMessage());
                    return null;
                }
            } else {
                Log::error("File does not exist: " . $localPath);
                return null;
            }
        }

        return null;
    }

    public static function getPreferenceCacheKey($keys = [])
    {
        $hashedKeys = hash('sha256', json_encode($keys));
        $cacheKey = "preference-keys-{$hashedKeys}-" . App::getLocale();
        return $cacheKey;
    }

    public static function makePagination($data)
    {
        if(!$data->total()){
            return [];
        }
        $currentPage = intval($data->currentPage());
        $lastPage = intval($data->lastPage());
        $params = request()->query();
        $links = $data->onEachSide(1)
            ->appends($params)
            ->linkCollection()
            ->map(function ($row) {
                $row['params'] = getQueryParam($row['url']);
                return $row;
            });
        return [
            [
                'url' => $currentPage == 1 ? null : request()->url()."?page=1",
                'label' => 'First',
                'active' => false,
                'params' => [
                        ...$params,
                        'page' => '1'
                ]
            ],
            ...$links,
            [
                'url' => $currentPage == $lastPage ? null : request()->url()."?page=$lastPage",
                'label' => 'Last',
                'active' => false,
                'params' => [
                        ...$params,
                        'page' => "$lastPage"
                ]
            ],
        ];
    }
}
