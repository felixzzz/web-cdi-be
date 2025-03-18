<?php

namespace App\Actions\PageManagement;

use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Helpers\StorageFile;
use App\Models\Utility\Preference;
use Illuminate\Http\Request;

class HomeContentAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        $keys = PreferenceKey::getAllHomeKey();

        (new PageManagementAction())->store($request, $keys, 'page-management/home');
        // $keys = [
        //     'home_banner',
        //     'home_about_section',
        //     'home_infrastructure_title',
        //     'home_infrastructure_energy',
        //     'home_infrastructure_water',
        //     'home_infrastructure_port_storage',
        //     'home_infrastructure_logistic',
        //     'home_discover_title',
        //     'home_discover_sustainability',
        //     'home_discover_our_business',
        //     'home_discover_investor',
        //     'home_discover_career',
        //     'home_journey_tagline',
        //     'home_journey_content',
        //     'home_journey_info_1',
        //     'home_journey_info_2',
        //     'home_journey_info_3'
        // ];

        // foreach ($keys as $key) {
        //     $file = $request->hasFile("{$key}_file")
        //     ? StorageFile::upload($request->file("{$key}_file"), 'page-management/home')
        //     : null;

        //     $data = array_filter([
        //         'type' => PreferenceKey::{$key}->type(),
        //         'title_en' => $request->input("{$key}_title_en"),
        //         'title_id' => $request->input("{$key}_title_id"),
        //         'content_en' => $request->input("{$key}_content_en"),
        //         'content_id' => $request->input("{$key}_content_id"),
        //         'file' => $file
        //     ], fn($value) => filled($value));

        //     Preference::updateOrCreate(['key' => $key], $data);
        // }

    }
}
