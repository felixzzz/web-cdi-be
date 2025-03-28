<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\OurBusiness\OurBusiness;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "image" => asset('assets/frontend/images/ourbusiness/our_business_what_we_do_energy.webp'),
                "type" => "energy",
                "title_en" => 'Energy',
                "title_id" => 'Energi',
                "description_en" => "
                    <p>Our energy business and operations are managed under PT Krakatau Chandra Energi (KCE), in which we hold a 70% stake, acquired from PT Krakatau Sarana Infrastruktur, a subsidiary of PT Krakatau Steel (Persero) Tbk, in 2023. This acquisition strengthens our ability to support strategic sectors in Indonesia, while offering synergies and providing the necessary supporting utilities for future growth and expansion. The targeted growth also includes renewable energy (EBT) businesses, where CDI, through KCE, is committed to becoming a pioneer in driving the energy transition toward a more sustainable future, supporting the government's target of achieving net zero emissions by 2060.</p>
                ",
                "description_id" => "
                    <p>Bisnis dan operasi energi kami dikelola oleh PT Krakatau Chandra Energi (KCE), di mana kami memegang 70% saham, yang diakuisisi dari PT Krakatau Sarana Infrastruktur, anak perusahaan PT Krakatau Steel (Persero) Tbk, pada tahun 2023. Akuisisi ini memperkuat kemampuan kami untuk mendukung sektor-sektor strategis di Indonesia, sekaligus menawarkan sinergi dan menyediakan utilitas pendukung yang diperlukan untuk pertumbuhan dan ekspansi di masa mendatang. Pertumbuhan yang ditargetkan juga mencakup bisnis energi terbarukan (EBT), di mana CDI, melalui KCE, berkomitmen untuk menjadi pelopor dalam mendorong transisi energi menuju masa depan yang lebih berkelanjutan, yang mendukung target pemerintah untuk mencapai emisi nol bersih pada tahun 2060.</p>
                ",
                "banner_image" => asset('assets/frontend/images/ourbusiness/our_business_energy_hero_image.webp'),
                "banner_title_en" => "Eco-friendly Electricity and Renewable Energy Provider",
                "banner_title_id" => "Penyedia Listrik Ramah Lingkungan dan Energi Terbarukan",
                "overview_title_en" => "Overview",
                "overview_title_id" => "Overview",
                "overview_description_en" => "
                    <p>CDI energy business and operations are managed by PT Krakatau Chandra Energi (KCE), which focuses on energy provider, electrical services, and renewable energy solutions.</p>
                    <p>KCE's energy solutions are supported by two subsidiaries, PT Krakatau Sarana Energi (KSE) and PT Krakatau Posco Energy (KPE). KSE focuses on developing fuel stations and vehicles to expand electric vehicle (EV) charging stations, supporting renewable energy development. KPE collectively generates 210 MWe to meet the energy needs of internal operations, industries, and the local community in the Cilegon region.</p>
                    <p>In the future, CDI plans to develop power plants that will utilize renewable energy sources, including solar and hydropower, to further support sustainable energy solutions.</p>
                ",
                "overview_description_id" => "
                    <p>Bisnis dan operasi energi CDI dikelola oleh PT Krakatau Chandra Energi (KCE), yang berfokus pada penyedia energi, layanan kelistrikan, dan solusi energi terbarukan.</p>
                    <p>Solusi energi KCE didukung oleh dua anak perusahaan, PT Krakatau Sarana Energi (KSE) dan PT Krakatau Posco Energy (KPE). KSE berfokus pada pengembangan stasiun pengisian bahan bakar dan kendaraan untuk memperluas stasiun pengisian kendaraan listrik (EV), yang mendukung pengembangan energi terbarukan. KPE secara kolektif menghasilkan 210 MWe untuk memenuhi kebutuhan energi operasi internal, industri, dan masyarakat setempat di wilayah Cilegon.</p>
                    <p>Di masa mendatang, CDI berencana untuk mengembangkan pembangkit listrik yang akan memanfaatkan sumber energi terbarukan, termasuk tenaga surya dan tenaga air, untuk lebih mendukung solusi energi berkelanjutan.</p>
                ",
                "overview_image" => asset('assets/frontend/images/ourbusiness/energy_overview.webp'),
                "heading_tab_title_en" => "Business Pillars",
                "heading_tab_title_id" => "Pilar Bisnis"
            ],

            [
                "image" => asset('assets/frontend/images/ourbusiness/our_business_what_we_do_water.webp'),
                "type" => "water",
                "title_en" => 'Water',
                "title_id" => 'Air',
                "description_en" => "
                    <p>Our water business and activities are operated by our affiliate company <b>PT Krakatau Tirta Industri (KTI)</b>, in which we hold a <b>49% stake acquired</b> from <b>PT Krakatau Sarana Infrastruktur</b>, a subsidiary of PT Krakatau Steel (Persero) Tbk, in <b>2023</b>. Our industrial water business includes: clean water, demineralized water, and wastewater management.</p>
                ",
                "description_id" => "
                    <p>Bisnis dan kegiatan air kami dioperasikan oleh perusahaan afiliasi kami <b>PT Krakatau Tirta Industri (KTI)</b>, di mana kami memegang <b>49% saham yang diakuisisi</b> dari <b>PT Krakatau Sarana Infrastruktur</b>, anak perusahaan PT Krakatau Steel (Persero) Tbk, pada <b>2023</b>. Bisnis air industri kami meliputi: air bersih, air demineralisasi, dan pengelolaan air limbah.</p>
                ",
                "banner_image" => asset('assets/frontend/images/ourbusiness/our_business_water_hero_image.webp'),
                "banner_title_en" => "Water",
                "banner_title_id" => "Air",
                "overview_title_en" => "Overview",
                "overview_title_id" => "Overview",
                "overview_description_en" => "
                    <p>KTI has expanded its business capabilities to meet market demands by developing and operating various water treatment facilities.  These include Demineralized Water Treatment Plants, Water Recycling Plants, Wastewater Treatment Plants that utilize advanced technologies such as membrane, ultrafiltration, ion exchange, and biological treatment. KTI's business line include: Clean water, demin water, and wastewater treatment.</p>
                ",
                "overview_description_id" => "
                    <p>KTI telah memperluas kemampuan bisnisnya untuk memenuhi permintaan pasar dengan mengembangkan dan mengoperasikan berbagai fasilitas pengolahan air. Fasilitas ini meliputi Instalasi Pengolahan Air Demineralisasi, Instalasi Daur Ulang Air, Instalasi Pengolahan Air Limbah yang memanfaatkan teknologi canggih seperti membran, ultrafiltrasi, pertukaran ion, dan pengolahan biologis. Lini bisnis KTI meliputi: Air bersih, air demineralisasi, dan pengolahan air limbah.</p>
                ",
                "overview_image" => asset('assets/frontend/images/ourbusiness/water_overview.webp'),
                "heading_tab_title_en" => "Business Pillars",
                "heading_tab_title_id" => "Pilar Bisnis"
            ],

            [
                "image" => asset('assets/frontend/images/ourbusiness/our_business_what_we_do_ports_storage.webp'),
                "type" => "port_storage",
                "title_en" => 'Ports & Storage',
                "title_id" => 'Pelabuhan & Penyimpanan',
                "description_en" => "
                    <p>CDI also operates  a portfolio of ports and tank services specializing in  refined chemical and petroleum products.  CDI subsidiary which operate in this sector are <b>PT Chandra Samudera Port (CSP) and PT Redeco Petrolin Utama (RPU)</b>. CDI serves <b>reputable multinational clients with potential growth from key global traders such as Aramco, Glencore, Shell and other players.</b></p>
                ",
                "description_id" => "
                    <p>CDI juga mengoperasikan portofolio pelabuhan dan layanan tangki yang mengkhususkan diri dalam produk kimia dan minyak bumi olahan. Anak perusahaan CDI yang beroperasi di sektor ini adalah <b>PT Chandra Samudera Port (CSP) dan PT Redeco Petrolin Utama (RPU)</b>. CDI melayani <b>klien multinasional terkemuka dengan potensi pertumbuhan dari pedagang global utama seperti Aramco, Glencore, Shell, dan pemain lainnya.</b></p>
                ",
                "banner_image" => asset('assets/frontend/images/ourbusiness/our_business_port_storage_hero_image.webp'),
                "banner_title_en" => "Petrochemical Raw Material Port Logistics and Storage Services",
                "banner_title_id" => "Layanan Logistik dan Penyimpanan Pelabuhan Bahan Baku Petrokimia",
                "overview_title_en" => "Overview",
                "overview_title_id" => "Overview",
                "overview_description_en" => "
                    <p>CDI manages its own port services, including deep-sea jetties and liquid bulk storage facilities available for rental to support efficient handling of raw materials and finished products. In response to Indonesia's increasing demand for imported chemicals and processed petrochemical products, our port operations offer tailored solutions for leading clients to ensure smooth logistics and supply chain management.</p>
                ",
                "overview_description_id" => "
                    <p>CDI mengelola layanan pelabuhannya sendiri, termasuk dermaga laut dalam dan fasilitas penyimpanan curah cair yang tersedia untuk disewa guna mendukung penanganan bahan baku dan produk jadi yang efisien. Sebagai respons terhadap meningkatnya permintaan Indonesia akan bahan kimia impor dan produk petrokimia olahan, operasi pelabuhan kami menawarkan solusi khusus bagi klien terkemuka guna memastikan kelancaran logistik dan manajemen rantai pasokan.</p>
                ",
                "overview_image" => asset('assets/frontend/images/ourbusiness/port_storage_overview.webp'),
                "heading_tab_title_en" => "Business Pillars",
                "heading_tab_title_id" => "Pilar Bisnis"
            ],

            [
                "image" => asset('assets/frontend/images/ourbusiness/our_business_what_we_do_logistic.webp'),
                "type" => "logistic",
                "title_en" => 'Logistic',
                "title_id" => 'Logistik',
                "description_en" => "
                    <p>We are advancing in the shipping and warehousing sector, focusing on meeting the needs of Chandra Asri Group, with plans to extend services to potential external clients in the future. Our logistics operation include <b>PT Chandra Shipping International (CSI), PT Marina Indah Maritim (MIM), and PT Chandra Cold Chain (CCC).</b></p>
                ",
                "description_id" => "
                    <p>Kami tengah bergerak maju di sektor perkapalan dan pergudangan, dengan fokus pada pemenuhan kebutuhan Chandra Asri Group, dengan rencana untuk memperluas layanan kepada klien eksternal potensial di masa mendatang. Operasi logistik kami meliputi <b>PT Chandra Shipping International (CSI), PT Marina Indah Maritim (MIM), dan PT Chandra Cold Chain (CCC).</b></p>
                ",
                "banner_image" => asset('assets/frontend/images/ourbusiness/our_business_logistics_hero_image.webp'),
                "banner_title_en" => "LOGISTICS",
                "banner_title_id" => "Logistik",
                "overview_title_en" => "Overview",
                "overview_title_id" => "Overview",
                "overview_description_en" => '
                    <p>In 2024, CDI expanded its infrastructure business in the logistic and cold chain sector with the establishment of PT Chandra Shipping International (CSI), PT Chandra Cold Chain (CCC), and acquisition of PT Marina Indah Maritim (MIM). CSI and MIM are active in the shipping industry and currently manage a fleet of 7 chemical and LPG transport vessels. </p>
                ',
                "overview_description_id" => '
                    <p>Pada tahun 2024, CDI memperluas bisnis infrastrukturnya di sektor logistik dan rantai dingin dengan mendirikan PT Chandra Shipping International (CSI), PT Chandra Cold Chain (CCC), dan mengakuisisi PT Marina Indah Maritim (MIM). CSI dan MIM bergerak di industri pelayaran dan saat ini mengelola armada 7 kapal pengangkut bahan kimia dan LPG.</p>
                ',
                "overview_image" => asset('assets/frontend/images/ourbusiness/logistics_overview.webp'),
                "heading_tab_title_en" => "",
                "heading_tab_title_id" => ""
            ]

        ];

        foreach ($data as $key => $value) {
            $imageFields = ['image', 'banner_image', 'overview_image'];

            foreach ($imageFields as $field) {
                if (!empty($value[$field])) {
                    // Ambil nama file asli
                    $originalPath = parse_url($value[$field], PHP_URL_PATH);
                    $originalPath = str_replace("cdi-compro/public/", "", $originalPath);
                    $filename = pathinfo($originalPath, PATHINFO_BASENAME);

                    // Buat nama file baru yang dienkripsi
                    $newFilename = Str::random(40) . '.' . pathinfo($filename, PATHINFO_EXTENSION);

                    // Copy file ke storage lokal
                    $storagePath = "ourbusiness/{$newFilename}";
                    $localPath = public_path($originalPath); // Path asli dari public folder

                    if (file_exists($localPath)) {
                        Storage::disk('local')->put($storagePath, file_get_contents($localPath));
                        $value[$field] = Helper::shortEncrypt($storagePath);
                    }
                }
            }

            // Simpan ke database
            OurBusiness::create([
                'type' => $value['type'],
                'title_en' => $value['title_en'],
                'title_id' => $value['title_id'],
                'description_en' => $value['description_en'],
                'description_id' => $value['description_id'],
                'image' => $value['image'],
                'banner_image' => $value['banner_image'],
                'banner_title_en' => $value['banner_title_en'],
                'banner_title_id' => $value['banner_title_id'],
                'overview_image' => $value['overview_image'],
                'overview_title_en' => $value['overview_title_en'],
                'overview_title_id' => $value['overview_title_id'],
                'overview_description_en' => $value['overview_description_en'],
                'overview_description_id' => $value['overview_description_id'],
                'heading_tab_title_en' => $value['heading_tab_title_en'],
                'heading_tab_title_id' => $value['heading_tab_title_id']
            ]);
            sleep(.5);
        }
    }
}
