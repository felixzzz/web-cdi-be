<?php

use App\Enums\AdditionalFileType;
use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Models\Utility\AdditionalFile;
use App\Models\Utility\Preference;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $preferences = [
            'governance_guideline' => [
                'type' => PreferenceType::TextContent,
                'title_en' => 'Guideline',
                'title_id' => 'Panduan',
                'content_en' => '',
                'content_id' => '',
            ],
            'governance_guideline_show' => [
                'type' => PreferenceType::TextContent,
                'title_en' => 'Disclaimer',
                'title_id' => 'Penafian',
                'content_en' => 'show',
                'content_id' => '',
            ],
        ];

        foreach ($preferences as $key => $val) {
            Preference::firstOrCreate(['key' => $key], $val);
        }

        AdditionalFile::firstOrCreate(
            [
                'type' => AdditionalFileType::GovernanceGuideline,
                'unique_key' => 'affiliate_transaction_implementation_guidelines',
            ],
            [
                'name_en' => 'Affiliate Transaction Implementation Guidelines',
                'name_id' => 'Pedoman Pelaksanaan Transaksi Afiliasi',
                'show_on_governance' => 1,
                'sort' => 1,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Preference::whereIn('key', ['governance_guideline', 'governance_guideline_show'])->delete();
        AdditionalFile::where('unique_key', 'affiliate_transaction_implementation_guidelines')
            ->where('type', AdditionalFileType::GovernanceGuideline)
            ->delete();
    }
};
