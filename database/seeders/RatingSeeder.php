<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Enums\RatingRecognitionType;
use App\Models\Sustainability\RatingRecognition;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'Score Report Climate Change 2023',
                'name_id' => 'Laporan Skor Perubahan Iklim 2023',
                'image' => asset('assets/frontend/images/sustainability/logo_cdp.webp'),
                'sort' => 1
            ],
            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'Score Report Climate Change 2024',
                'name_id' => 'Laporan Skor Perubahan Iklim 2024',
                'image' => asset('assets/frontend/images/sustainability/logo_msci.webp'),
                'sort' => 2
            ],
            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'ESG Risk Rating 2024',
                'name_id' => 'Peringkat Risiko ESG 2024',
                'image' => asset('assets/frontend/images/sustainability/logo_sustainalytics.webp'),
                'sort' => 3
            ],

            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'B score (Management)',
                'name_id' => 'B score (Management)',
                'image' => asset('assets/frontend/images/sustainability/award_1.webp'),
                'sort' => 4,
                'content_en' => '<p>B score (Management) means the Company has implemented specific actionsto address the climate change issue.</p>',
                'content_id' => '<p>B score (Management) means the Company has implemented specific actionsto address the climate change issue.</p>',
            ],
            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'Increase compared to last year',
                'name_id' => 'Increase compared to last year',
                'image' => asset('assets/frontend/images/sustainability/award_2.webp'),
                'sort' => 5,
                'content_en' => '<p>Places in the top 20-35% of companies in the commodity chemical sub-sector.</p>',
                'content_id' => '<p>Places in the top 20-35% of companies in the commodity chemical sub-sector.</p>',
            ],
            [
                'type' => RatingRecognitionType::Rating,
                'name_en' => 'Risk is lower compared to last year',
                'name_id' => 'Risk is lower compared to last year',
                'image' => asset('assets/frontend/images/sustainability/award_3.webp'),
                'sort' => 6,
                'content_en' => '<p>Places in the 1st percentile globally in the commodity chemicals sub-industry.</p>',
                'content_id' => '<p>Places in the 1st percentile globally in the commodity chemicals sub-industry.</p>',
            ],

            [
                'type' => RatingRecognitionType::Recognition,
                'name_en' => 'Top Rated Badge',
                'name_id' => 'Top Rated Badge',
                'image' => asset('assets/frontend/images/sustainability/recognition_1.webp'),
                'sort' => 1,
                'content_en' => '<p>Top-rated badge affirms our commitment to sustainability excellence, highlighting our transparent approach to ESG performance and our proactive management of ESG-related risks.</p>',
                'content_id' => '<p>Top-rated badge affirms our commitment to sustainability excellence, highlighting our transparent approach to ESG performance and our proactive management of ESG-related risks.</p>',
            ],
            [
                'type' => RatingRecognitionType::Recognition,
                'name_en' => 'PROPER Gold',
                'name_id' => 'PROPER Gold',
                'image' => asset('assets/frontend/images/sustainability/recognition_2.webp'),
                'sort' => 2,
                'content_en' => '<p>PROPER Gold is the highest award in the Company Performance Rating Program in Environmental Management (PROPER) by the Ministry of Environment and Forestry (KLHK) of the Republic of Indonesia.</p>',
                'content_id' => '<p>PROPER Gold is the highest award in the Company Performance Rating Program in Environmental Management (PROPER) by the Ministry of Environment and Forestry (KLHK) of the Republic of Indonesia.</p>',
            ]
        ];

        foreach ($data as $key => $value) {
            $imageFields = ['image'];

            foreach ($imageFields as $field) {
                if (!empty($value[$field])) {
                    // Ambil nama file asli
                    $originalPath = parse_url($value[$field], PHP_URL_PATH);
                    $originalPath = str_replace("cdi-compro/public/", "", $originalPath);
                    $filename = pathinfo($originalPath, PATHINFO_BASENAME);

                    // Buat nama file baru yang dienkripsi
                    $newFilename = Str::random(40) . '.' . pathinfo($filename, PATHINFO_EXTENSION);

                    // Copy file ke storage lokal
                    $storagePath = "rating-recognitions/{$newFilename}";
                    $localPath = public_path($originalPath); // Path asli dari public folder

                    if (file_exists($localPath)) {
                        Storage::disk('local')->put($storagePath, file_get_contents($localPath));
                        $value[$field] = Helper::shortEncrypt($storagePath);
                    }
                }
            }

            RatingRecognition::create($value);
        }
    }
}
