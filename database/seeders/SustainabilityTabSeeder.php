<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use App\Models\Sustainability\SustainabilityTab;
use App\Models\Sustainability\SustainabilityTabItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'title_id' => 'Energi Terbarukan untuk Pendidikan',
                'items' => [
                    [
                        'image' => asset('assets/frontend/images/sustainability/social_tab_3.webp'),
                        'name' => 'Renewable Energy for Education',
                        'sort' => 1,
                        'align' => 'right',
                        'title_en' => 'Renewable Energy for Education',
                        'content_en' => '<p>CDI believes in providing clean energy access to educational institutions. By installing PLTS Rooftop (Langit Biru) at schools and Islamic boarding schools, CDI helps reduce electricity costs while promoting sustainable energy use.</p>',
                        'title_id' => 'Energi Terbarukan untuk Pendidikan',
                        'content_id' => '<p>CDI percaya dalam menyediakan akses energi bersih untuk institusi pendidikan. Dengan memasang PLTS Rooftop (Langit Biru) di sekolah dan pesantren, CDI membantu mengurangi biaya listrik sekaligus mempromosikan penggunaan energi yang berkelanjutan.</p>'
                    ]
                ]
            ],
            [
                'title_en' => 'Marine Conservation',
                'title_id' => 'Konservasi Laut',
                'items' => [
                    [
                        'image' => asset('assets/frontend/images/sustainability/social_tab_3.webp'),
                        'name' => 'Marine Conservation',
                        'sort' => 1,
                        'align' => 'right',
                        'title_en' => 'Marine Conservation',
                        'content_en' => '<p>To protect coastal ecosystems, CDI actively participates in coral reef conservation efforts, ensuring the preservation of marine biodiversity for future generations. </p>',
                        'title_id' => 'Konservasi Laut',
                        'content_id' => '<p>Untuk melindungi ekosistem pesisir, CDI secara aktif berpartisipasi dalam upaya konservasi terumbu karang, memastikan pelestarian keanekaragaman hayati laut untuk generasi mendatang. </p>'
                    ]
                ]
            ]
        ];

        foreach ($tabs as $key => $value) {
            $tab = SustainabilityTab::create([
                "category" => 'social',
                "title_en" => $value["title_en"],
                "title_id" => $value["title_id"]
            ]);

            foreach ($value['items'] as $index => $item) {

                $imageFields = ['image'];

                foreach ($imageFields as $field) {
                    if (!empty($item[$field])) {
                        $item[$field] = Helper::handleMoveImage($item[$field], 'sustainability/contents');

                    }
                }

                SustainabilityTabItem::create([
                    'name' => $value['title_en'] . " #" . ($index+1),
                    "sustainability_tab_id" => $tab->id,
                    "image" => $item['image'],
                    "heading_en" => @$item['heading_en'],
                    "heading_id" => @$item['heading_id'],
                    "heading_position" => @$item['heading_position'],
                    "tagline_en" => @$item['tagline_en'],
                    "tagline_id" => @$item['tagline_id'],
                    "title_en" => $item['title_en'],
                    "title_id" => $item['title_id'],
                    "align" => $item['align'],
                    "content_en" => $item['content_en'],
                    "content_id" => $item['content_id'],
                ]);
            }
        }
    }
}
