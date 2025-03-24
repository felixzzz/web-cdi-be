<?php

namespace Database\Seeders;

use App\Enums\QuickLinkCategory;
use App\Models\Article\ArticleCategory;
use App\Models\Utility\QuickLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleCategory::create([
            'name_en' => 'Sustainability',
            'name_id' => 'Keberlanjutan',
            'is_sustainability' => 1
        ]);

        $this->call(QuickLinkSeeder::class);
        $this->call(ResponsibleSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(BusinessTabSeeder::class);
    }
}
