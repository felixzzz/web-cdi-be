<?php

namespace App\Actions\Data;

use App\Helpers\StorageFile;
use Illuminate\Http\Request;
use App\Models\OurBusiness\OurBusiness;
use App\Repositories\Data\OurBusinessRepository;

class OurBusinessAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function update(Request $request, $ulid)
    {
        $business = OurBusiness::whereUlid($ulid)->first();
        $data = [
            'title_en' => $request->title_en,
            'title_id' => $request->title_id,
            'description_en' => $request->description_en,
            'description_id' => $request->description_id,
            'banner_title_en' => $request->banner_title_en,
            'banner_title_id' => $request->banner_title_id,
            'banner_description_en' => $request->banner_description_en,
            'banner_description_id' => $request->banner_description_id,
            'overview_title_en' => $request->overview_title_en,
            'overview_title_id' => $request->overview_title_id,
            'overview_description_en' => $request->overview_description_en,
            'overview_description_id' => $request->overview_description_id,
            'heading_tab_title_en' => $request->heading_tab_title_en,
            'heading_tab_title_id' => $request->heading_tab_title_id,
            'link_title_en' => $request->link_title_en,
            'link_title_id' => $request->link_title_id,
            'link_url' => $request->link_url,
            'json_ld_en' => $request->json_ld_en,
            'json_ld_id' => $request->json_ld_id,
            'meta_title_en' => $request->meta_title_en,
            'meta_title_id' => $request->meta_title_id,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_id' => $request->meta_description_id,
        ];

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = StorageFile::upload($request->file('banner_image'), 'our-business/'.$business->type);
        }
        if ($request->hasFile('overview_image')) {
            $data['overview_image'] = StorageFile::upload($request->file('overview_image'), 'our-business/'.$business->type);
        }
        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'our-business/'.$business->type);
        }

        OurBusiness::whereUlid($ulid)->update($data);

        // Sync to preferences table so SEO metadata remains unified
        $prefKeyMap = [
            'energy' => \App\Enums\PreferenceKey::meta_our_business_energy->value,
            'water' => \App\Enums\PreferenceKey::meta_our_business_water->value,
            'port_storage' => \App\Enums\PreferenceKey::meta_our_business_ports->value,
            'logistic' => \App\Enums\PreferenceKey::meta_our_business_logistics->value,
        ];

        if ($business && isset($prefKeyMap[$business->type])) {
            $prefKey = $prefKeyMap[$business->type];
            \App\Models\Preference::updateOrCreate(
                ['key' => $prefKey],
                [
                    'title_en' => $request->meta_title_en,
                    'title_id' => $request->meta_title_id,
                    'content_en' => $request->meta_description_en,
                    'content_id' => $request->meta_description_id,
                ]
            );

            $seoMetaKeys = \App\Enums\PreferenceKey::getSeoMetaKeys();
            \App\Helpers\Optimize::delete(\App\Helpers\Helper::getPreferenceCacheKey($seoMetaKeys, 'en'));
            \App\Helpers\Optimize::delete(\App\Helpers\Helper::getPreferenceCacheKey($seoMetaKeys, 'id'));
            \App\Helpers\Optimize::delete('api_seo_metadata');
        }

        (new OurBusinessRepository())->resetCache();

    }
}
