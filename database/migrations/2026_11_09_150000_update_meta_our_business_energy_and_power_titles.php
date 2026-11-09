<?php

use App\Enums\PreferenceKey;
use App\Helpers\Helper;
use App\Helpers\Optimize;
use App\Models\OurBusiness\OurBusiness;
use App\Models\Utility\Preference;
use App\Repositories\Data\OurBusinessRepository;
use App\Services\FrontendRevalidationService;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Update preferences table for meta_our_business_energy
        Preference::where('key', PreferenceKey::meta_our_business_energy->value)
            ->update([
                'title_en' => 'Power Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Daya | Chandra Daya Investasi',
                'content_en' => "CDI Group's power infrastructure through KCE delivers power supply, electricity services, and renewable energy for industry and the public.",
                'content_id' => "Solusi infrastruktur Daya CDI Group melalui KCE menghadirkan penyediaan listrik, layanan kelistrikan, dan energi terbarukan untuk industri & publik.",
            ]);

        // 2. Update home_infrastructure_energy in preferences
        Preference::where('key', PreferenceKey::home_infrastructure_energy->value)
            ->update([
                'title_en' => 'Power',
                'title_id' => 'Daya',
            ]);

        // 3. Update our_businesses table for type = 'energy'
        OurBusiness::where('type', 'energy')
            ->update([
                'title_en' => 'Power',
                'title_id' => 'Daya',
                'meta_title_en' => 'Power Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Daya | Chandra Daya Investasi',
                'meta_description_en' => "CDI Group's power infrastructure through KCE delivers power supply, electricity services, and renewable energy for industry and the public.",
                'meta_description_id' => "Solusi infrastruktur Daya CDI Group melalui KCE menghadirkan penyediaan listrik, layanan kelistrikan, dan energi terbarukan untuk industri & publik.",
            ]);

        // 4. Invalidate caches so APIs immediately return fresh data
        $seoMetaKeys = PreferenceKey::getSeoMetaKeys();
        Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'en'));
        Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'id'));
        Optimize::delete('api_seo_metadata');

        (new OurBusinessRepository())->resetCache();

        // 5. Trigger frontend cache revalidation
        if (class_exists(FrontendRevalidationService::class)) {
            FrontendRevalidationService::trigger('/our-business/power', 'seo-metadata', 'page', false);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Preference::where('key', PreferenceKey::meta_our_business_energy->value)
            ->update([
                'title_en' => 'Energy Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Energi | Chandra Daya Investasi',
            ]);

        Preference::where('key', PreferenceKey::home_infrastructure_energy->value)
            ->update([
                'title_en' => 'Energy',
                'title_id' => 'Energi',
            ]);

        OurBusiness::where('type', 'energy')
            ->update([
                'title_en' => 'Energy',
                'title_id' => 'Energi',
                'meta_title_en' => 'Energy Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Energi | Chandra Daya Investasi',
            ]);

        $seoMetaKeys = PreferenceKey::getSeoMetaKeys();
        Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'en'));
        Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'id'));
        Optimize::delete('api_seo_metadata');

        (new OurBusinessRepository())->resetCache();
    }
};

