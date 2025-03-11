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

        $links = [
            [
                'category' => QuickLinkCategory::Home,
                'name_en' => 'Job Search',
                'name_id' => 'Pencarian Kerja',
                'url' => config('services.career_url'),
            ],
            [
                'category' => QuickLinkCategory::Home,
                'name_en' => 'Management & Structure',
                'name_id' => 'Struktur Manajemen',
                'url' => route('about-us.management'),
            ],
            [
                'category' => QuickLinkCategory::Home,
                'name_en' => 'Investor Relations',
                'name_id' => 'Hubungan Investor',
                'url' => route('investor.publications-for-investors'),
            ],
            [
                'category' => QuickLinkCategory::Home,
                'name_en' => 'Environment',
                'name_id' => 'Lingkungan',
                'url' => route('sustainability.environment'),
            ],
            [
                'category' => QuickLinkCategory::Home,
                'name_en' => 'Governance',
                'name_id' => 'Tata Kelola',
                'url' => route('governance.index'),
            ],


            [
                'category' => QuickLinkCategory::Governance,
                'name_en' => 'Job Search',
                'name_id' => 'Pencarian Kerja',
                'url' => config('services.career_url'),
            ],
            [
                'category' => QuickLinkCategory::Governance,
                'name_en' => 'Management & Structure',
                'name_id' => 'Struktur Manajemen',
                'url' => route('about-us.management'),
            ],
            [
                'category' => QuickLinkCategory::Governance,
                'name_en' => 'Investor Relations',
                'name_id' => 'Hubungan Investor',
                'url' => route('investor.publications-for-investors'),
            ],
            [
                'category' => QuickLinkCategory::Governance,
                'name_en' => 'Environment',
                'name_id' => 'Lingkungan',
                'url' => route('sustainability.environment'),
            ],
            [
                'category' => QuickLinkCategory::Governance,
                'name_en' => 'Governance',
                'name_id' => 'Tata Kelola',
                'url' => route('governance.index'),
            ],

            [
                'category' => QuickLinkCategory::AboutUs,
                'name_en' => 'Job Search',
                'name_id' => 'Pencarian Kerja',
                'url' => config('services.career_url'),
            ],
            [
                'category' => QuickLinkCategory::AboutUs,
                'name_en' => 'Management & Structure',
                'name_id' => 'Struktur Manajemen',
                'url' => route('about-us.management'),
            ],
            [
                'category' => QuickLinkCategory::AboutUs,
                'name_en' => 'Investor Relations',
                'name_id' => 'Hubungan Investor',
                'url' => route('investor.publications-for-investors'),
            ],
            [
                'category' => QuickLinkCategory::AboutUs,
                'name_en' => 'Environment',
                'name_id' => 'Lingkungan',
                'url' => route('sustainability.environment'),
            ],
            [
                'category' => QuickLinkCategory::AboutUs,
                'name_en' => 'Governance',
                'name_id' => 'Tata Kelola',
                'url' => route('governance.index'),
            ],
        ];

        foreach ($links as $link) {
            QuickLink::create($link);
        }
    }
}
