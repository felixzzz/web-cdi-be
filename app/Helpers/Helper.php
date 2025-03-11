<?php

namespace App\Helpers;

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
        $menuItems = config('menus.admin');

        return self::menuToObjects($menuItems);
    }

    private static function menuToObjects(array $items)
    {
        return array_map(function ($item) {
            // Convert sub items if they exist
            if (isset($item['sub']) && is_array($item['sub'])) {
                $item['sub'] = self::menuToObjects($item['sub']);
            }
            // Convert route name to URL if route is specified
            if (!empty($item['route'])) {
                $item['route'] = route($item['route']);
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
}
