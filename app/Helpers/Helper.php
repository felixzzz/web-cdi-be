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
}
