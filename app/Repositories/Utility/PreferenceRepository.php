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

    public function getAllContentPage($type, $paramKeys = [])
    {
        $keys = [];
        if ($type == 'home') {
            $keys = PreferenceKey::getAllHomeKey();
        }

        if ($type == 'about-us-who-we-are') {
            $keys = PreferenceKey::getAllAboutUsKey('who-we-are');
        }

        if ($type == 'about-us-management') {
            $keys = PreferenceKey::getAllAboutUsKey('management');
        }

        if ($type == 'about-us-award') {
            $keys = PreferenceKey::getAllAboutUsKey('award');
        }

        if ($type == 'investor') {
            $keys = PreferenceKey::getAllInvestorKey();
        }

        if ($type == 'governance') {
            $keys = PreferenceKey::getAllGovernanceKey();
        }

        if ($type == '') {
            $keys = $paramKeys;
        }

        $data = [];

        foreach ($keys as $key => $value) {
            $preference = Preference::query()->where("key", $value)->first();
            $data[$value] = $preference;
        }

        return (object)$data;
    }
}
