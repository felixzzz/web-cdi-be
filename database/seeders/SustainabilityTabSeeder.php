<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SustainabilityTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabs = [
            [
                'title_en' => 'Healthcare & Well-being',
                'title_id' => 'Kesehatan & Kesejahteraan',
                'items' => [
                    [
                        'image' => asset('assets/frontend/images/sustainability/healthcare_well_being.webp'),
                        'name' => 'Healthcare & Well-being',
                        'sort' => 1,
                        'align' => 'right',
                        'title_en' => 'Healthcare & Well-being',
                        'content_en' => '<p>CDI provides BPJS Health Insurance assistance to 40 residents in Cilegon, ensuring access to essential medical services. CDI’s free medical check-up program has reached 217 residents in the Cikerai and Cinangka areas, offering health consultations and blood sugar screening.</p>',
                        'title_id' => 'Kesehatan & Kesejahteraan',
                        'content_id' => '<p>CDI memberikan bantuan Asuransi BPJS Kesehatan kepada 40 warga di Cilegon, memastikan akses ke layanan medis yang penting. Program pemeriksaan kesehatan gratis CDI telah menjangkau 217 warga di daerah Cikerai dan Cinangka, menawarkan konsultasi kesehatan dan pemeriksaan gula darah.</p>'
                    ]
                ]
            ],
            [
                'title_en' => 'Waste Management & Community Empowerment',
                'title_id' => 'Pengelolaan Sampah & Pemberdayaan Masyarakat',
                'items' => [
                    [
                        'image' => asset('assets/frontend/images/sustainability/waste_management_community_empowerment.webp'),
                        'name' => 'Waste Management & Community Empowerment',
                        'sort' => 1,
                        'align' => 'right',
                        'title_en' => 'Waste Management & Community Empowerment',
                        'content_en' => '
                        <p>In collaboration with local communities, CDI have established:</p>

                        <ol>
                            <li>Maggot Farming at Al Bustaniyah Islamic Boarding School, enabling organic waste recycling.</li>
                            <li>Bank Sampah initiatives, empowering the community to manage inorganic waste </li>
                        </ol>
                        ',
                        'title_id' => 'Pengelolaan Sampah & Pemberdayaan Masyarakat',
                        'content_id' => '
                        <p>CDI telah berkolaborasi dengan komunitas lokal:</p>

                        <ol>
                            <li>Peternakan Belatung di Pondok Pesantren Al Bustaniyah, memungkinkan daur ulang sampah organik.</li>
                            <li>Inisiatif Bank Sampah, memberdayakan masyarakat untuk mengelola sampah anorganik </li>
                        </ol>'
                    ]
                ]
            ],
            [
                'title_en' => 'Renewable Energy for Education',
                'title_id' => 'Energi Terbarukan untuk Pendidikan'
            ],
            [
                'title_en' => 'Marine Conservation',
                'title_id' => 'Konservasi Laut'
            ]
        ];
    }
}
