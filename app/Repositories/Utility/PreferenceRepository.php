<?php

namespace App\Repositories\Utility;

use App\Enums\PreferenceKey;
use App\Models\Utility\Preference;

class PreferenceRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllContentPage($type)
    {
        $keys = [];
        if ($type == 'home') {
            $keys = PreferenceKey::getAllHomeKey();
        }

        $data = [];

        foreach ($keys as $key => $value) {
            $preference = Preference::query()->where("key", $value)->first();
            $data[$value] = $preference;
        }

        return (object)$data;
    }
}
