<?php

namespace Database\Seeders;

use App\Models\Data\Institution;
use App\Models\Data\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offices = [
            [
                "name" => "PT Chandra Daya Investasi Tbk",
                "main" => [
                    "location_name_en" => "Head Office",
                    "location_name_id" => "Kantor Utama",
                    "address_en" => "Wisma Barito Pacific Tower A, Lt. 7 Jl. Let. Jend. S. Parman Kav. 62-63, Jakarta 11410, Indonesia",
                    "address_id" => "Wisma Barito Pacific Tower A, Lt. 7 Jl. Let. Jend. S. Parman Kav. 62-63, Jakarta 11410, Indonesia",
                    "phone" => "(62-21) 530 7950",
                    "fax" => "(62-21) 530 8930"
                ],
                "branchs" => [],
                "is_main" => 1
            ],
            [
                "name" => "Petrochemical Plant Ciwandan Site",
                "main" => [
                    "location_name_en" => "",
                    "location_name_id" => "",
                    "address_en" => "Puloampel Site, Desa Mangunreja, Kecamatan Puloampel, Kabupaten Serang, Banten 42456, Indonesia",
                    "address_id" => "Puloampel Site, Desa Mangunreja, Kecamatan Puloampel, Kabupaten Serang, Banten 42456, Indonesia",
                    "phone" => "(62-21) 530 7950",
                    "fax" => "(62-21) 530 8930",
                ],
                "branchs" => [],
                "is_main" => 0
            ],
            [
                "name" => "Petrochemical Pulo Ampel Site",
                "main" => [
                    "location_name_en" => "",
                    "location_name_id" => "",
                    "address_en" => "Puloampel Site, Desa Mangunreja, Kecamatan Puloampel, Kabupaten Serang, Banten 42456, Indonesia",
                    "address_id" => "Puloampel Site, Desa Mangunreja, Kecamatan Puloampel, Kabupaten Serang, Banten 42456, Indonesia",
                    "phone" => "(62-21) 530 7950",
                    "fax" => "(62-21) 530 8930",
                ],
                "branchs" => [],
                "is_main" => 0
            ],
            [
                "name" => "Chandra Asri Trading Company Pte. Ltd.",
                "main" => [
                    "location_name_en" => "",
                    "location_name_id" => "",
                    "address_en" => "1 Kim Seng Promenade #09-07, Great World City, Singapore 237994",
                    "address_id" => "1 Kim Seng Promenade #09-07, Great World City, Singapore 237994",
                    "phone" => "",
                    "fax" => "",
                ],
                "branchs" => [],
                "is_main" => 0
            ],
            [
                "name" => "PT Redeco Petrolin Utama",
                "sub_title_en" => "(A subsidiary of SMI)",
                "sub_title_id" => "(Anak perusahaan SMI)",
                "main" => [
                    "location_name_en" => "",
                    "location_name_id" => "",
                    "address_en" => "Plaza Sentral Lt. 18 Jl. Jend. Sudirman No.47 Jakarta 12930, Indonesia",
                    "address_id" => "Plaza Sentral Lt. 18 Jl. Jend. Sudirman No.47 Jakarta 12930, Indonesia",
                    "phone" => "(62-21) 571 0004",
                    "fax" => "(62-21) 578 52209",
                ],
                "branchs" => [],
                "is_main" => 0
            ],
            [
                "name" => "PT Synthetic Rubber Indonesia",
                "sub_title_en" => "(Associate company of SMI)",
                "sub_title_id" => "(Perusahaan rekanan SMI)",
                "main" => [
                    "location_name_en" => "Head Office",
                    "location_name_id" => "Kantor Utama",
                    "address_en" => "Wisma Barito Pacific Tower A, Lt. 7 Jl. Let. Jend. S. Parman Kav. 62-63, Jakarta 11410, Indonesia",
                    "address_id" => "Wisma Barito Pacific Tower A, Lt. 7 Jl. Let. Jend. S. Parman Kav. 62-63, Jakarta 11410, Indonesia",
                    "phone" => "(62-21) 304 33 999",
                    "fax" => "(62-21) 304 33 999",
                ],
                "branchs" => [
                    [
                        "location_name_en" => "Plant",
                        "location_name_id" => "Pabrik",
                        "address_en" => "Jl. Raya Anyer KM 123, Gunung Sugih, Ciwandan, Cilegon, Indonesia",
                        "address_id" => "Jl. Raya Anyer KM 123, Gunung Sugih, Ciwandan, Cilegon, Indonesia",
                        "phone" => "(62-254) 269 400",
                        "fax" => "(62-254) 269 404",
                    ]
                ],
                "is_main" => 0
            ]
        ];

        foreach ($offices as $key => $value) {
            Office::create($value);
        }

        $insititutions = [
            [
                "name" => "PT Raya Saham Registra",
                "main" => [
                    "location_name_en" => "SHARE REGISTRAR",
                    "location_name_id" => "PENCATAT SAHAM",
                    "address_en" => "Gedung Plaza Sentral Lt.2, Jl. Jend Sudirman Kav. 47-48 Jakarta 12930, Indonesia",
                    "address_id" => "Gedung Plaza Sentral Lt.2, Jl. Jend Sudirman Kav. 47-48 Jakarta 12930, Indonesia",
                    "phone" => "Tel. (62-21) 252 5666",
                    "fax" => "Fax. (62-21) 252 5028",
                ],
                "branchs" => []
            ],
            [
                "name" => "Liana Ramon Xenia and Partners Registered Public Accountants",
                "main" => [
                    "location_name_en" => "PUBLIC ACCOUNTING FIRM",
                    "location_name_id" => "KANTOR AKUNTAN PUBLIK",
                    "address_en" => "(Member of Deloitte Touche Tohmatsu Limited) The Plaza Office Tower Lt. 32 Jl. M. H. Thamrin Kav. 28 – 30 Jakarta 10350",
                    "address_id" => "(Anggota dari Deloitte Touche Tohmatsu Limited) The Plaza Office Tower Lt. 32 Jl. M. H. Thamrin Kav. 28 - 30 Jakarta 10350",
                    "phone" => "Tel. (62-21) 5081 8000",
                    "fax" => "Fax. (62-21) 2992 8200",
                ],
                "branchs" => []
            ],
            [
                "name" => "PT Pemeringkat Efek Indonesia (PEFINDO)",
                "main" => [
                    "location_name_en" => "RATING AGENCY",
                    "location_name_id" => "LEMBAGA PEMERINGKAT",
                    "address_en" => "Equity Tower Lt. 30 Sudirman Central Business District, Lot. 9 Jl. Jend. Sudirman Kav. 52-53 Jakarta 12190, Indonesia",
                    "address_id" => "Equity Tower Lt. 30 Sudirman Central Business District, Lot. 9 Jl. Jend. Sudirman Kav. 52-53 Jakarta 12190, Indonesia",
                    "phone" => "Tel. (62-21) 509 68469",
                    "fax" => "Fax. (62-21) 509 68468",
                ],
                "branchs" => []
            ],
            [
                "name" => "PT Bank Tabungan Negara (Persero) Tbk",
                "main" => [
                    "location_name_en" => "TRUSTEE",
                    "location_name_id" => "WALI AMANAT",
                    "address_en" => "Menara Bank BTN Jl. Gajah Mada No. 1 Jakarta 10130, Indonesia",
                    "address_id" => "Menara Bank BTN Jl. Gajah Mada No. 1 Jakarta 10130, Indonesia",
                    "phone" => "Tel. (62-21) 633 6789",
                    "fax" => "Fax. (62-21) 633 6719",
                ],
                "branchs" => []
            ]
        ];

        foreach ($insititutions as $key => $value) {
            Institution::create($value);
        }
    }
}
