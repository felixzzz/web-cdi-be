<?php

use App\Enums\PreferenceKey;
use App\Helpers\LlmsDefaultContent;
use App\Models\Utility\Preference;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $defaults = [
            PreferenceKey::llms_txt->value => [
                'title_en' => 'llms.txt',
                'title_id' => 'llms.txt',
                'content_en' => LlmsDefaultContent::llmsTxt(),
            ],
            PreferenceKey::llms_full_txt->value => [
                'title_en' => 'llms-full.txt',
                'title_id' => 'llms-full.txt',
                'content_en' => LlmsDefaultContent::llmsFullTxt(),
            ],
        ];

        foreach ($defaults as $key => $values) {
            $enumCase = PreferenceKey::tryFrom($key);
            if ($enumCase) {
                Preference::updateOrCreate(['key' => $key], [
                    'type' => $enumCase->type(),
                    'title_en' => $values['title_en'],
                    'title_id' => $values['title_id'],
                    'content_en' => $values['content_en'],
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
        Preference::whereIn('key', [
            PreferenceKey::llms_txt->value,
            PreferenceKey::llms_full_txt->value,
        ])->delete();
    }
};
