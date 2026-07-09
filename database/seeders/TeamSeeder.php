<?php

namespace Database\Seeders;

use App\Enums\TeamType;
use App\Helpers\Helper;
use App\Models\Data\Team;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [
            'type' => TeamType::AUDIT,
            'name' => '',
            'position' => '',
            'image' => '',
            'image_hero' => '',
            'description_en' => '',
            'description_id' => '',
        ];

        $data = [
            [
                'type' => TeamType::BOD,
                'name' => 'Fransiskus Ruly Aryawan',
                'position' => 'President Director',
                'image' => asset('assets/frontend/images/about/bod_1.webp'),
                'image_hero' => asset('assets/frontend/images/about/bod_1_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOD,
                'name' => 'Jonathan Kandinata',
                'position' => 'Director',
                'image' => asset('assets/frontend/images/about/bod_2.webp'),
                'image_hero' => asset('assets/frontend/images/about/bod_2_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOD,
                'name' => 'Saksit Suntharekanon',
                'position' => 'Director',
                'image' => asset('assets/frontend/images/about/bod_3.webp'),
                'image_hero' => asset('assets/frontend/images/about/bod_3_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],

            [
                'type' => TeamType::BOC,
                'name' => 'Erry Riyana Hardjapamekas',
                'position' => 'President Commissioner',
                'image' => asset('assets/frontend/images/about/boc-1.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_1_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOC,
                'name' => "Edi Riva'i",
                'position' => 'Commissioner',
                'image' => asset('assets/frontend/images/about/boc-2.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_2_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOC,
                'name' => 'Erwin Ciputra',
                'position' => 'Commissioner',
                'image' => asset('assets/frontend/images/about/boc-3.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_3_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOC,
                'name' => 'Andre Khor Kah Hin',
                'position' => 'Commissioner',
                'image' => asset('assets/frontend/images/about/boc-4.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_4_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOC,
                'name' => 'Thawat Hirancarukorn',
                'position' => 'Commissioner',
                'image' => asset('assets/frontend/images/about/boc-5.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_5_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::BOC,
                'name' => 'Prasit Laohawirapap',
                'position' => 'Commissioner',
                'image' => asset('assets/frontend/images/about/boc-6.webp'),
                'image_hero' => asset('assets/frontend/images/about/boc_6_hero-removebg-preview.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::AUDIT,
                'name' => 'Erwin Ciputra',
                'position' => 'Chairman and concurrently serving as Vice President Commissioner & Independent Commissioner',
                'image' => asset('assets/frontend/images/governance/audit_1.webp'),
                'image_hero' => asset('assets/frontend/images/governance/audit_1.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::AUDIT,
                'name' => 'Erwin Ciputra',
                'position' => 'Member',
                'image' => asset('assets/frontend/images/governance/audit_1.webp'),
                'image_hero' => asset('assets/frontend/images/governance/audit_1.webp'),
                'description_en' => '',
                'description_id' => '',
            ],
            [
                'type' => TeamType::AUDIT,
                'name' => 'Erwin Ciputra',
                'position' => 'Member',
                'image' => asset('assets/frontend/images/governance/audit_1.webp'),
                'image_hero' => asset('assets/frontend/images/governance/audit_1.webp'),
                'description_en' => '',
                'description_id' => '',
            ]
        ];

        foreach ($data as $key => $value) {
            $imageFields = ['image', 'image_hero'];

            foreach ($imageFields as $field) {
                if (!empty($value[$field])) {
                    // Ambil nama file asli
                    $originalPath = parse_url($value[$field], PHP_URL_PATH);
                    $originalPath = str_replace("cdi-compro/public/", "", $originalPath);
                    $filename = pathinfo($originalPath, PATHINFO_BASENAME);

                    // Buat nama file baru yang dienkripsi
                    $newFilename = Str::random(40) . '.' . pathinfo($filename, PATHINFO_EXTENSION);

                    // Copy file ke storage lokal
                    $storagePath = "page-contents/{$newFilename}";
                    $localPath = public_path($originalPath); // Path asli dari public folder

                    if (file_exists($localPath)) {
                        Storage::disk('local')->put($storagePath, file_get_contents($localPath));
                        $value[$field] = Helper::shortEncrypt($storagePath);
                    }
                }
            }

            Team::create($value);
        }
    }
}
