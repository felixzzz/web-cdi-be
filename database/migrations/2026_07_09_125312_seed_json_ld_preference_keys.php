<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $keys = [
            'json_ld_homepage',
            'json_ld_about_us',
            'json_ld_governance',
            'json_ld_sustainability',
            'json_ld_contact_us',
            'json_ld_our_business',
        ];
        
        foreach ($keys as $key) {
            $enumCase = \App\Enums\PreferenceKey::tryFrom($key);
            if ($enumCase) {
                \App\Models\Utility\Preference::firstOrCreate(['key' => $key], [
                    'type' => $enumCase->type(),
                    'title_en' => 'JSON-LD Schema',
                    'title_id' => 'Skema JSON-LD',
                    'content_en' => '',
                    'content_id' => '',
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $keys = [
            'json_ld_homepage',
            'json_ld_about_us',
            'json_ld_governance',
            'json_ld_sustainability',
            'json_ld_contact_us',
            'json_ld_our_business',
        ];
        \App\Models\Utility\Preference::whereIn('key', $keys)->delete();
    }
};
