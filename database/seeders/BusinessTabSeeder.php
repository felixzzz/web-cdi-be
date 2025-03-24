<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\OurBusiness\OurBusinessContent;
use App\Models\OurBusiness\OurBusinessTab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ourbusiness_tabs = [
            // ENERGY
            [
                'our_business_id' => 1,
                'title_en' => 'Electricity Supply',
                'title_id' => 'Pasokan Listrik',
                'sub_title_en' => '',
                'sub_title_id' => '',
                'image' => '',
                'description_en' => '',
                'description_id' => '',
                'items' => [
                    [
                        'image' => asset('assets/frontend/images/ourbusiness/business_pillars_electricity_supply.webp'),
                        'heading_en' => '',
                        'heading_id' => '',
                        'heading_position' => '',
                        'tagline_en' => '',
                        'tagline_id' => '',
                        'title_en' => '',
                        'title_id' => '',
                        'align' => 'right',
                        'description_en' => '
                            <p>Electricity supply is the core business of KCE. This segment is supported by power plants with a total capacity of 120 MW. The company provides electricity to the Krakatau Industrial Estate (KIK) in Cilegon, Banten, covering over 4,700 hectares.  KCE serves 216 industrial, business, social, and government customers, along with 2,055 household customers.</p>
                            <p>For electricity generation, KCE utilizes Combined Cycle Power Plant (CCPP) technology, also known as a Gas Steam Power Plant (PLTGU) with a capacity of 120 MW.  The plant consists of two gas turbine generators, two heat recovery steam generators, and one steam turbine generator. Natural gas is the primary fuel used in the power plant. </p>
                            <p>KCE ensures that the electricity generated meets industry standards by implementing a compensator system designed to maintain voltage stability. This is evidenced by low SAIDI and SAIFI figures, with SAIDI at 0.10466 hours/customer/year and SAIFI at 0.1192 occurrences/customer/year. This system helps ensure the delivery of high-quality electricity that can be continuously regulated, providing the best experience for consumers.</p>
                        ',
                        'description_id' => '
                            <p>Pasokan listrik merupakan bisnis inti KCE. Segmen ini didukung oleh pembangkit listrik dengan total kapasitas 120 MW. Perusahaan ini menyediakan listrik untuk Kawasan Industri Krakatau (KIK) di Cilegon, Banten, yang mencakup lebih dari 4.700 hektar. KCE melayani 216 pelanggan industri, bisnis, sosial, dan pemerintah, serta 2.055 pelanggan rumah tangga.</p>
                            <p>Untuk pembangkitan listrik, KCE memanfaatkan teknologi Combined Cycle Power Plant (CCPP), yang juga dikenal sebagai Pembangkit Listrik Tenaga Gas Uap (PLTGU) dengan kapasitas 120 MW. Pembangkit ini terdiri dari dua generator turbin gas, dua generator uap pemulihan panas, dan satu generator turbin uap. Gas alam merupakan bahan bakar utama yang digunakan dalam pembangkit listrik tersebut.</p>
                            <p>KCE memastikan bahwa listrik yang dihasilkan memenuhi standar industri dengan menerapkan sistem kompensator yang dirancang untuk menjaga kestabilan tegangan. Hal ini dibuktikan dengan angka SAIDI dan SAIFI yang rendah, dengan SAIDI sebesar 0,10466 jam/pelanggan/tahun dan SAIFI sebesar 0,1192 kejadian/pelanggan/tahun. Sistem ini membantu memastikan penyediaan listrik berkualitas tinggi yang dapat diatur secara terus-menerus, sehingga memberikan pengalaman terbaik bagi konsumen.</p>
                        '
                    ]
                ]
            ],
            [
                'our_business_id' => 1,
                'title_en' => 'Electrical Services',
                'title_id' => 'Layanan Listrik',
                'sub_title_en' => 'Electrical Services',
                'sub_title_id' => 'Layanan Listrik',
                'image' => '',
                'description_en' => '<p>This business line is divided into three main segments: Operation & Maintenance of power plants; Engineering, Procurement and Construction (EPC) of electricity system; and Repair Overhaul services for transformers and electric motors. The services cater to a wide range of sectors, including industrial, business, social, government, and residential customers. The products offered from the three electricity service segments include:</p>',
                'description_id' => '<p>Lini bisnis ini terbagi menjadi tiga segmen utama: Operasi & Pemeliharaan pembangkit listrik; Rekayasa, Pengadaan, dan Konstruksi (EPC) sistem kelistrikan; dan layanan Perbaikan dan Perbaikan Trafo dan motor listrik. Layanan ini melayani berbagai sektor, termasuk pelanggan industri, bisnis, sosial, pemerintahan, dan perumahan. Produk yang ditawarkan dari ketiga segmen layanan kelistrikan tersebut meliputi:</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_operation.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => '',
                        "tagline_id" => '',
                        "title_en" => 'Operation & Maintenance (O&M) Power Generation & Power Distribution',
                        "title_id" => 'Operasi & Pemeliharaan (O&M) Pembangkitan Tenaga Listrik & Distribusi Tenaga Listrik',
                        "align" => 'left',
                        "description_en" => `
                            <ol class="list-disc">
                                <li>O&M Steam Power Plant, Combined Cycle Power Plant, Diesel Power Plant, and Gas Power Plant</li>
                                <li>O&M Power Distribution</li>
                                <li>Testing & Commissioning</li>
                                <li>System & Documentation</li>
                                <li>Training & Development</li>
                            </ol>
                        `,
                        "description_id" => `
                            <ol class="list-disc">
                                <li>O&M Pembangkit Listrik Tenaga Uap, Pembangkit Listrik Tenaga Gas, Pembangkit Listrik Tenaga Diesel, dan Pembangkit Listrik Tenaga Gas</li>
                                <li>O&M Distribusi Daya</li>
                                <li>Pengujian & Komisioning</li>
                                <li>Sistem & Dokumentasi</li>
                                <li>Pelatihan & Pengembangan</li>
                            </ol>
                        `
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_electrical_epc.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => '',
                        "tagline_id" => '',
                        "title_en" => 'Electrical EPC',
                        "title_id" => 'EPC Listrik',
                        "align" => 'right',
                        "description_en" => `
                            <ol class="list-disc">
                                <li>Construction and Installation of Substation Electricity Supply Installation</li>
                                <li>Construction and Installation of Medium Voltage Electricity Supply Installation</li>
                                <li>Construction and Installation of High Voltage Electricity Supply Installation</li>
                                <li>Construction and Installation of Panel & Solar PV System</li>
                            </ol>
                        `,
                        "description_id" => `
                            <ol class="list-disc">
                                <li>Pembangunan dan Pemasangan Instalasi Penyediaan Listrik Gardu Induk</li>
                                <li>Pembangunan dan Pemasangan Instalasi Penyediaan Listrik Tegangan Menengah</li>
                                <li>Pembangunan dan Pemasangan Instalasi Penyediaan Listrik Tegangan Tinggi</li>
                                <li>Pembangunan dan Pemasangan Panel & Sistem Tenaga Surya PV</li>
                            </ol>
                        `
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_electrical_services_workshop_services.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => '',
                        "tagline_id" => '',
                        "title_en" => 'Workshop services for Repair & Overhaul (Motor & Transformer)',
                        "title_id" => 'Layanan Bengkel untuk Perbaikan & Overhaul (Motor & Trafo)',
                        "align" => 'left',
                        "description_en" => `
                            <ol class="list-disc">
                                <li>Repair & Overhaul of LV & MV Motors</li>
                                <li>Power & Distribution Transformer Repair</li>
                                <li>Transformer Mobile Unit Services</li>
                                <li>Rental of Heavy Equipment & Test Equipment: Overhead Crane 100/10 Ton, Overhead Crane 30/5 Ton Electrical tools & Equipment Test</li>
                            </ol>
                        `,
                        "description_id" => `
                            <ol class="list-disc">
                                <li>Perbaikan & Overhaul Motor LV & MV</li>
                                <li>Perbaikan Trafo Daya & Distribusi</li>
                                <li>Layanan Unit Bergerak Trafo</li>
                                <li>Penyewaan Alat Berat & Peralatan Uji: Overhead Crane 100/10 Ton, Overhead Crane 30/5 Ton Alat Listrik & Pengujian Peralatan</li>
                            </ol>
                        `
                    ]
                ]
            ],
            [
                'our_business_id' => 1,
                'title_en' => 'Renewable Energy',
                'title_id' => 'Energi terbarukan',
                'sub_title_en' => 'Renewable Energy',
                'sub_title_id' => 'Energi terbarukan',
                'image' => '',
                'description_en' => '<p>KCE operating in the new and renewable energy sector by constructing and operating more than 2,200 kWp Solar Power Plant in December 2024. In the future, KCE plans to develop additional renewable energy solutions, service options that allows consumers to transition to cleaner energy alternatives. KCE provides four installation mechanisms for solar panels, including:</p>',
                'description_id' => '<p>KCE bergerak di sektor energi baru dan terbarukan dengan membangun dan mengoperasikan lebih dari 2.200 kWp Pembangkit Listrik Tenaga Surya pada bulan Desember 2024. Di masa mendatang, KCE berencana untuk mengembangkan solusi energi terbarukan tambahan, pilihan layanan yang memungkinkan konsumen untuk beralih ke alternatif energi yang lebih bersih. KCE menyediakan empat mekanisme pemasangan untuk panel surya, termasuk:</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_renewable_energy.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => '',
                        "tagline_id" => '',
                        "title_en" => 'O&M WWTP Biotreatment Blast Furnace Complex PT KS',
                        "title_id" => 'Kompleks Tanur Tinggi Biotreatment O&M WWTP PT KS',
                        "align" => 'right',
                        "description_en" => `
                            <ol class="list-disc">
                                <li>
                                    <b>Solar On Grid System:</b>
                                    <p>This system integrates solar panels with the power grid, allowing the energy generated to be directly transmitted through the grid without the need for battery backup storage.</p>
                                </li>
                                <li>
                                    <b>Solar Off Grid System:</b>
                                    <p>Operating autonomously without connection to the grid, this system requires energy and batteries, with usage dependent on the battery’s capacity.</p>
                                </li>
                                <li>
                                    <b>Solar Off Grid System:</b>
                                    <p>In this system, solar panels supply energy to the grid, while excess energy is stored in batteries to be used when sunlight is unavailable. </p>
                                </li>
                                <li>
                                    <b>Solar Hybrid System: </b>
                                    <p>This system combines multiple energy sources to meet the electricity needs of the building, enabling integration between different system for greater flexibility</p>
                                </li>
                            </ol>
                            <p>With these diverse options, KCE offers tailored solar panel installation solutions designed to meet the specific needs of each customer.</p>
                        `,
                        "description_id" => `
                            <ol class="list-disc">
                                <li>
                                    <b>Sistem Solar On Grid:</b>
                                    <p>Sistem ini mengintegrasikan panel surya dengan jaringan listrik, memungkinkan energi yang dihasilkan langsung disalurkan ke jaringan tanpa memerlukan penyimpanan baterai.</p>
                                </li>
                                <li>
                                    <b>Sistem Solar Off Grid:</b>
                                    <p>Beroperasi secara mandiri tanpa koneksi ke jaringan listrik, sistem ini membutuhkan energi dan baterai, dengan penggunaan yang bergantung pada kapasitas baterai.</p>
                                </li>
                                <li>
                                    <b>Sistem Solar Off Grid:</b>
                                    <p>Pada sistem ini, panel surya memasok energi ke jaringan, sementara kelebihan energi disimpan dalam baterai untuk digunakan saat sinar matahari tidak tersedia.</p>
                                </li>
                                <li>
                                    <b>Sistem Solar Hybrid:</b>
                                    <p>Sistem ini menggabungkan berbagai sumber energi untuk memenuhi kebutuhan listrik bangunan, memungkinkan integrasi antara berbagai sistem untuk fleksibilitas yang lebih besar.</p>
                                </li>
                            </ol>
                            <p>Dengan berbagai pilihan ini, KCE menawarkan solusi pemasangan panel surya yang disesuaikan untuk memenuhi kebutuhan spesifik setiap pelanggan.</p>

                        `
                    ]
                ]
            ],

            // WATER
            [
                'our_business_id' => 2,
                'title_en' => 'CLEAN WATER',
                'title_id' => 'AIR BERSIH',
                'sub_title_en' => 'Clean Water',
                'sub_title_id' => 'Air Bersih',
                'image' => '',
                'description_en' => '<p>Water supply services are the core business of KTI, which provides clean water to various industries, including Chandra Asri Group.</p>',
                'description_id' => '<p>Layanan penyediaan air bersih merupakan bisnis inti dari KTI, yang menyediakan air bersih untuk berbagai industri, termasuk Chandra Asri Group.</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_cidanau_river.webp'),
                        "heading_en" => '1. Raw Water Source',
                        "heading_id" => '1. Sumber Air Baku',
                        "heading_position" => 'start',
                        "tagline_en" => 'Raw Water Source',
                        "tagline_id" => 'Sumber Air Baku',
                        "title_en" => 'Cidanau River',
                        "title_id" => 'Sungai Cidanau',
                        "align" => 'left',
                        "description_en" => '
                            <p>Cidanau River is a vital river within the Cidanau Watershed (DAS), covering an area of 22,620 Ha. This river plays a crucial role in supporting the sustainable development in Banten Province. In addition to its significant water resources, the Cidanau watershed is home to an endemic conservation area, Lake Swamp (Rawa Danau). Rawa Danau, which spans 3,500 Ha and is designated as a nature reserve. </p>
                        ',
                        "description_id" => '
                            <p>Sungai Cidanau merupakan sungai vital yang berada di Daerah Aliran Sungai (DAS) Cidanau, dengan luas 22.620 Ha. Sungai ini memainkan peran penting dalam mendukung pembangunan berkelanjutan di Provinsi Banten. Selain sumber daya air yang signifikan, DAS Cidanau merupakan rumah bagi kawasan konservasi endemik, Rawa Danau. Rawa Danau, yang membentang seluas 3.500 Ha dan ditetapkan sebagai cagar alam. </p>
                        ',
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_cipasauran_river.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => 'Raw Water Source',
                        "tagline_id" => 'Sumber Air Baku',
                        "title_en" => 'Cipasauran River',
                        "title_id" => 'Sungai Cipasauran',
                        "align" => 'right',
                        "description_en" => '<p>The Cipasauran Watershed is located ±48 km from Cilegon towards Labuan, covering an area of 41.52 km².</p>',
                        "description_id" => '<p>Daerah Aliran Sungai Cipasauran terletak sekitar ±48 km dari Cilegon menuju Labuan, dengan luas wilayah 41,52 km².</p>',
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_raw_water_source_nadra_krenceng_reservoir.webp'),
                        "heading_en" => '',
                        "heading_id" => '',
                        "heading_position" => '',
                        "tagline_en" => 'Raw Water Source',
                        "tagline_id" => 'Sumber Air Baku',
                        "title_en" => 'Nadra Krenceng Reservoir',
                        "title_id" => 'Waduk Nadra Krenceng',
                        "align" => 'left',
                        "description_en" => '<p>Nadra Krenceng Reservoir serves as one of the raw water infrastructures, designed to store water for use during the dry season or to meet the operational demands of the Krenceng water treatment plant. Located in Kebonsari Village, Citangkil District, Cilegon City, Banten Province, this artificial lake is primarily fed by the Cidanau River, which is approximately 28 km away, with water delivered via pipelines.</p>
                        <p>The Nadra Krenceng Reservoir has the following specifications:</p>
                        <ol class="list-disc">
                            <li>Normal Water Level: +20.10 meters above sea level with an effective storage of 3,409,000 m³</li>
                            <li>Minimum Water Level: +17.5 meters above sea level with an effective storage of 731,000 m³</li>
                            <li>High Water Level: +21.70 meters above sea level with an effective storage of 5,359,000 m³</li>
                        </ol>',
                        "description_id" => '<p>Waduk Nadra Krenceng berfungsi sebagai salah satu infrastruktur air baku, dirancang untuk menyimpan air selama musim kemarau atau memenuhi kebutuhan operasional instalasi pengolahan air Krenceng. Waduk ini terletak di Kelurahan Kebonsari, Kecamatan Citangkil, Kota Cilegon, Provinsi Banten. Waduk buatan ini terutama menerima pasokan air dari Sungai Cidanau, yang berjarak sekitar 28 km, dengan air dialirkan melalui pipa.</p>
                        <p>Waduk Nadra Krenceng memiliki spesifikasi sebagai berikut:</p>
                        <ol class="list-disc">
                            <li>Tinggi Normal Air: +20,10 meter di atas permukaan laut dengan kapasitas penyimpanan efektif 3.409.000 m³</li>
                            <li>Tinggi Minimum Air: +17,5 meter di atas permukaan laut dengan kapasitas penyimpanan efektif 731.000 m³</li>
                            <li>Tinggi Maksimum Air: +21,70 meter di atas permukaan laut dengan kapasitas penyimpanan efektif 5.359.000 m³</li>
                        </ol>',
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_water_treatment_facilities_krenceng_water_treatment_plant.webp'),
                        "heading_en" => '2. Water Treatment Facilities',
                        "heading_id" => '2. Fasilitas Pengolahan Air',
                        "heading_position" => 'start',
                        "tagline_en" => 'Water Treatment Facilities',
                        "tagline_id" => 'Fasilitas Pengolahan Air',
                        "title_en" => 'Krenceng Water Treatment Plant (WTP)',
                        "title_id" => 'Instalasi Pengolahan Air Krenceng (IPA Krenceng)',
                        "align" => 'left',
                        "description_en" => '<p>Krenceng Water Treatment Plant was established in 1979 as one of the key water treatment facilities owned by PT Krakatau Steel (Persero) Tbk (KS). In 1996, it was incorporated as a subsidiary of KS under the name PT Krakatau Tirta Industri (KTI). The plant has an installed capacity of 2,000 liters/second and operates using water sourced from Cidanau River.</p>',
                        "description_id" => '<p>Instalasi Pengolahan Air Krenceng didirikan pada tahun 1979 sebagai salah satu fasilitas pengolahan air utama yang dimiliki oleh PT Krakatau Steel (Persero) Tbk (KS). Pada tahun 1996, fasilitas ini menjadi anak perusahaan KS dengan nama PT Krakatau Tirta Industri (KTI). Instalasi ini memiliki kapasitas terpasang sebesar 2.000 liter/detik dan beroperasi menggunakan air baku dari Sungai Cidanau.</p>',
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_water_treatment_facilities_cidanau_water_treatment_plant.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "Water Treatment Facilities",
                        "tagline_id" => "Fasilitas Pengolahan Air",
                        "title_en" => "Cidanau Water Treatment Plant (IPA)",
                        "title_id" => "Instalasi Pengolahan Air (IPA) Cidanau",
                        "align" => "right",
                        "description_en" => "
                            <p>The Cidanau Water Treatment Plant (IPA) began operations in 2018, utilizing raw water sourced from Cipasauran Dam. Raw water is pumped to the treatment unit located at Cidanau. The plant features 3 intake pump units, each with a capacity of 400 liters/second each. The Cipasauran Dam, situated approximately 45 km from Cilegon towards Labuan, serves to raise the water level of the Cipasauran river, allowing it to be directed to the Cidanau IPA which is managed by KTI. Cipasauran weir, completed in 2017, spans 30 meters in width and stands 6.5 meters tall. The IPA is equipped with an intake building, a flushing building, and a mud bag/sand trap channel, all located on the right side of the weir.</p>
                            <p>The water treatment system at Cidanau IPA follows a similar process to Krenceng IPA, utilizing conventional technology that includes coagulation, flocculation, sedimentation, filtration, neutralization, and disinfection processes. The difference between Cidanau IPA and Krenceng IPA is in the Hexagonal Flocculator and Dynasand Filter units. The treatment process begins with the addition of alum sulfate chemicals in the Distribution Chamber unit, then the floc formation process in the Hexagonal Flocculator unit, then the deposition of impurities in the Lamella Clarifier unit, and filtering using silica sand media in the Dynasand Filter unit. The process ensures the production of clean water that meets the quality standards outlined in PERMENKES No. 2 Year 2023.</p>
                        ",
                        "description_id" => "
                            <p>Instalasi Pengolahan Air (IPA) Cidanau mulai beroperasi pada tahun 2018, menggunakan air baku yang bersumber dari Bendungan Cipasauran. Air baku dipompa ke unit pengolahan yang terletak di Cidanau. Instalasi ini memiliki 3 unit pompa intake, masing-masing berkapasitas 400 liter/detik. Bendungan Cipasauran, yang terletak sekitar 45 km dari Cilegon menuju Labuan, berfungsi untuk menaikkan permukaan air Sungai Cipasauran agar dapat dialirkan ke IPA Cidanau yang dikelola oleh KTI. Bendungan Cipasauran, yang selesai dibangun pada tahun 2017, memiliki lebar 30 meter dan tinggi 6,5 meter. IPA ini dilengkapi dengan bangunan intake, bangunan flushing, serta saluran lumpur dan perangkap pasir yang terletak di sisi kanan bendungan.</p>
                            <p>Sistem pengolahan air di IPA Cidanau mengikuti proses serupa dengan IPA Krenceng, menggunakan teknologi konvensional yang mencakup proses koagulasi, flokulasi, sedimentasi, filtrasi, netralisasi, dan desinfeksi. Perbedaan antara IPA Cidanau dan IPA Krenceng terletak pada penggunaan unit Hexagonal Flocculator dan Dynasand Filter. Proses pengolahan dimulai dengan penambahan bahan kimia alum sulfat di unit Distribution Chamber, kemudian proses pembentukan flok di unit Hexagonal Flocculator, pengendapan kotoran di unit Lamella Clarifier, serta penyaringan menggunakan media pasir silika di unit Dynasand Filter. Proses ini memastikan produksi air bersih yang memenuhi standar kualitas sesuai dengan PERMENKES No. 2 Tahun 2023.</p>
                        ",
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_distribution_lines_pipeline_line.webp'),
                        "heading_en" => "3. Distribution Lines",
                        "heading_id" => "3. Jalur Distribusi",
                        "heading_position" => "start",
                        "tagline_en" => "Distribution Lines",
                        "tagline_id" => "Jalur Distribusi",
                        "title_en" => "Pipeline Line",
                        "title_id" => "Jalur Pipa",
                        "align" => "right",
                        "description_en" => "
                            <p>The clean water produced by KTI is delivered to customers through a pipeline network spanning over 100 km. The distribution system is organized into the following segments:</p>
                            <ol class='list-disc'>
                                <li><b>Western Region</b><p>The Western Region includes customers such as PT KS Production Unit, PT KS & Group, Pelindo Cigading, IP UBP Suralaya, Krakatau Industrial Estate, PT Asahimas Chemical, PT Chandra Asri Pacific Tbk, PT Dongjin Indonesia, PT Lautan Otsuka Chemical, PT Indorama Petrochemical, PT Permata Dunia Sukses Utama, PT Jawamanis Rafinasi, PT Sentra Usahatama Jaya, and others.</p></li>
                                <li><b>Eastern Region</b><p>The Eastern Region includes customers such as PT Krakatau Baja Konstruksi, Krakatau Medika Hospital, The Royale Krakatau Hotel, Krakatau Country Club, PT Krakatau Steel Office, PDAM Cilegon Mandiri, and others.</p></li>
                            </ol>
                        ",
                        "description_id" => "
                            <p>Air bersih yang diproduksi oleh KTI disalurkan kepada pelanggan melalui jaringan pipa yang membentang lebih dari 100 km. Sistem distribusi ini dibagi menjadi beberapa segmen berikut:</p>
                            <ol class='list-disc'>
                                <li><b>Wilayah Barat</b><p>Wilayah Barat mencakup pelanggan seperti Unit Produksi PT KS, PT KS & Group, Pelindo Cigading, IP UBP Suralaya, Kawasan Industri Krakatau, PT Asahimas Chemical, PT Chandra Asri Pacific Tbk, PT Dongjin Indonesia, PT Lautan Otsuka Chemical, PT Indorama Petrochemical, PT Permata Dunia Sukses Utama, PT Jawamanis Rafinasi, PT Sentra Usahatama Jaya, dan lainnya.</p></li>
                                <li><b>Wilayah Timur</b><p>Wilayah Timur mencakup pelanggan seperti PT Krakatau Baja Konstruksi, Rumah Sakit Krakatau Medika, The Royale Krakatau Hotel, Krakatau Country Club, Kantor PT Krakatau Steel, PDAM Cilegon Mandiri, dan lainnya.</p></li>
                            </ol>
                        ",
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_clean_water_distribution_pump_house.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "Distribution Lines",
                        "tagline_id" => "Jalur Distribusi",
                        "title_en" => "Pump House",
                        "title_id" => "Rumah Pompa",
                        "align" => "right",
                        "description_en" => "
                            <p>To meet the needs of the Western and Eastern Regions, there are several pump houses (PS/Pump Station) that operate to distribute clean water, among others:</p>
                            <ol class='list-disc'>
                                <li><b>Pump House III</b><p>There are 5 horizontal centrifugal pumps, 3 pumps are used to drain water to the tower with a water discharge capacity of 900 m3/hour, while 2 pumps are used to drain water to PS V (Secondary Pumping Station) with a capacity of 1,080 m3/hour.</p></li>
                                <li><b>Pump House IV</b><p>There are 7 vertical centrifugal pump units with a capacity of 900 m3/hour, to distribute water to PT Krakatau Steel, KIEC 1 Area, Krakatau Posco (KP), PT Krakatau Chandra Energi (KCE), PT Lotte Chemical Indonesia (LCI), and the rest for the Cigading area.</p></li>
                                <li><b>Pump House V</b><p>There are 3 horizontal centrifugal pump units with a capacity of 252 m3/hour and 2 pump units with a capacity of 504 m3/hour, which pump clean water from the 5,000 m3 Reservoir to the Krakatau Baja Konstruksi (KBK) Area, Krakatau Medika Hospital (RSKM), and KS Housing.</p></li>
                                <li><b>Pump House VI</b><p>There are 5 pump units with a capacity of 900 m3/hour, to distribute water to consumers in the Cigading-Ciwandan area and KIEC Area 2.</p></li>
                                <li><b>Pump House VIII WTP Cidanau</b><p>There are 4 pump units with a water discharge capacity of 210 liters/second to distribute water to consumers in the Ciwandan area.</p></li>
                            </ol>
                        ",
                        "description_id" => "
                            <p>Untuk memenuhi kebutuhan di Wilayah Barat dan Wilayah Timur, terdapat beberapa rumah pompa (PS/Pump Station) yang beroperasi untuk mendistribusikan air bersih, di antaranya:</p>
                            <ol class='list-disc'>
                                <li><b>Rumah Pompa III</b><p>Terdapat 5 pompa sentrifugal horizontal, 3 pompa digunakan untuk mengalirkan air ke menara dengan kapasitas debit air 900 m3/jam, sementara 2 pompa digunakan untuk mengalirkan air ke PS V (Secondary Pumping Station) dengan kapasitas 1.080 m3/jam.</p></li>
                                <li><b>Rumah Pompa IV</b><p>Terdapat 7 unit pompa sentrifugal vertikal dengan kapasitas 900 m3/jam, untuk mendistribusikan air ke PT Krakatau Steel, Area KIEC 1, Krakatau Posco (KP), PT Krakatau Chandra Energi (KCE), PT Lotte Chemical Indonesia (LCI), dan sisanya untuk area Cigading.</p></li>
                                <li><b>Rumah Pompa V</b><p>Terdapat 3 unit pompa sentrifugal horizontal dengan kapasitas 252 m3/jam dan 2 unit pompa dengan kapasitas 504 m3/jam, yang memompa air bersih dari Reservoir 5.000 m3 ke Area Krakatau Baja Konstruksi (KBK), Rumah Sakit Krakatau Medika (RSKM), dan Perumahan KS.</p></li>
                                <li><b>Rumah Pompa VI</b><p>Terdapat 5 unit pompa dengan kapasitas 900 m3/jam, untuk mendistribusikan air ke konsumen di area Cigading-Ciwandan dan Area KIEC 2.</p></li>
                                <li><b>Rumah Pompa VIII WTP Cidanau</b><p>Terdapat 4 unit pompa dengan kapasitas debit air 210 liter/detik untuk mendistribusikan air ke konsumen di area Ciwandan.</p></li>
                            </ol>
                        ",
                    ],
                ]
            ],
            [
                'our_business_id' => 2,
                'title_en' => 'DEMIN WATER',
                'title_id' => 'AIR DEMIN',
                'sub_title_en' => 'Demin Water',
                'sub_title_id' => 'Air Demin',
                'image' => '',
                'description_en' => '<p>In addition to supplying clean water for both industrial and community use. KTI through its subsidiary, PT Krakatau Tirta Operation & Maintenance (KTOP), also provides high-quality demineralized water for industrial applications. Utilizing advanced processes and state-of-the-art technology, the demineralized water produced is customized to meet specific requirements of each customer.</p>',
                'description_id' => '<p>Selain memasok air bersih untuk keperluan industri dan masyarakat. KTI melalui anak perusahaannya, PT Krakatau Tirta Operation & Maintenance (KTOP), juga menyediakan air demineralisasi berkualitas tinggi untuk keperluan industri. Memanfaatkan proses yang canggih dan teknologi mutakhir, air demineralisasi yang dihasilkan disesuaikan untuk memenuhi kebutuhan spesifik setiap pelanggan.</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_pt_mcci_demin.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "PT MCCI Demin WTP",
                        "title_id" => "WTP Demin PT MCCI",
                        "align" => "left",
                        "description_en" => "
                            <p>This Water Treatment Plant (WTP) was built to meet the demin water needs of PT Mitsubishi Chemical Indonesia (PT MCCI) with a demand of 220 m3/hour. The raw water used in the treatment process is sourced from clean water provided by KTI. Built by KTI under a Build, Operate, Own (BOO) business model, the WTP has a design capacity of 3 x 110 m3/hour (with 2 operational units and 1 standby unit) and has been operating continuously 24 hours a day since October 2014. The treated demin water product is then distributed to the PT MCCI plant through a dedicated pipeline network.</p>
                        ",
                        "description_id" => "
                            <p>Instalasi Pengolahan Air (WTP) ini dibangun untuk memenuhi kebutuhan air demineralisasi PT Mitsubishi Chemical Indonesia (PT MCCI) dengan permintaan sebesar 220 m3/jam. Air baku yang digunakan dalam proses pengolahan bersumber dari air bersih yang disediakan oleh KTI. Dibangun oleh KTI dengan model bisnis Build, Operate, Own (BOO), WTP ini memiliki kapasitas desain 3 x 110 m3/jam (dengan 2 unit operasional dan 1 unit cadangan) dan telah beroperasi selama 24 jam nonstop sejak Oktober 2014. Produk air demin yang telah diproses kemudian didistribusikan ke pabrik PT MCCI melalui jaringan pipa khusus.</p>
                        ",
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_pt_latinusa_tbk.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "WRP & WTP Demin PT Latinusa Tbk.",
                        "title_id" => "WRP & WTP Demin PT Latinusa Tbk.",
                        "align" => "right",
                        "description_en" => "
                            <p>The Water Recycle Plant (WRP) processes raw water sourced from wastewater generated by the Wastewater Treatment Plant (WWTP) of PT Pelat Timah Nusantara (PT Latinusa Tbk.). This wastewater comes from the electroplating process and tinplate sheet coating. After treatment at the PT Latinusa Tbk. WWTP, the water is used as the raw water for producing demin water. The WRP, built by KTI under a Build, Operate, Own (BOO) business model, has been operating continuously 24 hours a day since December 15, 2011. The plant is designed with a production capacity of 30 m3/hour of demin water.</p>
                            <p>Not only that, KTI also manages the Water Treatment Plant, WTP Demin PT Latinusa Tbk., which is operated by PT Krakatau Tirta Operations & Maintenance to supply demin water for PT Latinusa Tbk. The plant has a capacity of 48 m3/hour and has been operating continuously, 24 hours a day, since October 01, 2021. The technology used includes Ultrafiltration Membrane, Reverse Osmosis Membrane, and Ion Exchange Resin to ensure high-quality water production.</p>
                        ",
                        "description_id" => "
                            <p>Water Recycle Plant (WRP) mengolah air baku yang berasal dari limbah yang dihasilkan oleh Instalasi Pengolahan Air Limbah (WWTP) PT Pelat Timah Nusantara (PT Latinusa Tbk.). Limbah ini berasal dari proses elektroplating dan pelapisan lembaran timah. Setelah diolah di WWTP PT Latinusa Tbk., air tersebut digunakan sebagai air baku untuk produksi air demin. WRP yang dibangun oleh KTI dengan model bisnis Build, Operate, Own (BOO) telah beroperasi selama 24 jam nonstop sejak 15 Desember 2011. Pabrik ini dirancang dengan kapasitas produksi 30 m3/jam air demin.</p>
                            <p>Tidak hanya itu, KTI juga mengelola Instalasi Pengolahan Air, WTP Demin PT Latinusa Tbk., yang dioperasikan oleh PT Krakatau Tirta Operations & Maintenance untuk menyuplai air demin bagi PT Latinusa Tbk. Pabrik ini memiliki kapasitas 48 m3/jam dan telah beroperasi secara kontinu, 24 jam sehari, sejak 1 Oktober 2021. Teknologi yang digunakan mencakup Membran Ultrafiltrasi, Membran Reverse Osmosis, dan Resin Penukar Ion untuk memastikan produksi air berkualitas tinggi.</p>
                        ",
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_demin_water_demin_blast_furnace_complex.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "O&M WTP Demin Blast Furnace Complex PT Krakatau Steel (Persero) Tbk.",
                        "title_id" => "O&M WTP Demin Kompleks Blast Furnace PT Krakatau Steel (Persero) Tbk.",
                        "align" => "left",
                        "description_en" => "
                            <p>KTI conducts Operation & Maintenance (O&M) of the Demineralized Water Treatment Plant (WTP) at the Blast Furnace Complex of PT Krakatau Steel. This WTP utilizes ion exchange technology and has a design capacity of 150 m3/hour. KTI manages all aspects of the water treatment process, including the supply of chemicals and labor management, ensuring the smooth operation and maintenance of the plant.</p>
                        ",
                        "description_id" => "
                            <p>KTI melakukan Operasi & Pemeliharaan (O&M) Instalasi Pengolahan Air Demineralisasi (WTP) di Kompleks Blast Furnace PT Krakatau Steel. WTP ini menggunakan teknologi pertukaran ion dan memiliki kapasitas desain sebesar 150 m3/jam. KTI mengelola seluruh aspek proses pengolahan air, termasuk penyediaan bahan kimia dan manajemen tenaga kerja, guna memastikan kelancaran operasional dan pemeliharaan pabrik.</p>
                        ",
                    ],
                ]
            ],
            [
                'our_business_id' => 2,
                'title_en' => 'WASTEWATER TREATMENT',
                'title_id' => 'PENGOLAHAN AIR LIMBAH',
                'sub_title_en' => 'Wastewater Treatment',
                'sub_title_id' => 'Pengolahan Air Limbah',
                'image' => '',
                'description_en' => '<p>PT Krakatau Tirta Industri through KTOP serves wastewater treatment for industries and companies. This service ensures compliance with the environmental quality standards while enabling the reuse of treated wastewater, contributing to resource management.</p>',
                'description_id' => '<p>PT Krakatau Tirta Industri melalui KTOP melayani pengolahan air limbah untuk industri dan perusahaan. Layanan ini memastikan kepatuhan terhadap standar kualitas lingkungan sekaligus memungkinkan penggunaan kembali air limbah yang telah diolah, yang berkontribusi pada pengelolaan sumber daya.</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_wwtp_biotreatment.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "O&M WWTP Biotreatment Blast Furnace Complex PT KS",
                        "title_id" => "O&M WWTP Biotreatment Blast Furnace Complex PT KS",
                        "align" => "right",
                        "description_en" => "
                            <p>In addition to operating the WTP Demin Blast Furnace Complex of KS, KTI also manages operation & maintenance (O&M) of the Waste Water Treatment Plant (WWTP) Biotreatment Blast Furnace Complex PT KS. This WWTP has a capacity of 32 m3/hour using biological treatment technology. In this plant, KTI oversees all aspects of the facility, including water treatment process, chemical supply, and labor management, ensuring the efficient and sustainable treatment of wastewater.</p>
                        ",
                        "description_id" => "
                            <p>Selain mengoperasikan WTP Demin Blast Furnace Complex KS, KTI juga mengelola operasi & pemeliharaan (O&M) Instalasi Pengolahan Air Limbah (WWTP) Biotreatment Blast Furnace Complex PT KS. WWTP ini memiliki kapasitas 32 m3/jam dengan menggunakan teknologi pengolahan biologis. Di fasilitas ini, KTI menangani seluruh aspek pengolahan, termasuk proses pengolahan air, pasokan bahan kimia, dan manajemen tenaga kerja, guna memastikan pengolahan air limbah yang efisien dan berkelanjutan.</p>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_pt_krakatau_blue_water.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "PT Krakatau Blue Water (KBW)",
                        "title_id" => "PT Krakatau Blue Water (KBW)",
                        "align" => "left",
                        "description_en" => "
                            <p>KBW is a joint venture between KTI and Blue O&M Co. Ltd. Since its establishment in 2013, KBW has been responsible for operating the Final Wastewater Treatment facility, with a treatment capacity of 17,000 m3/day, and Reusing System, which has a capacity of 7,000 m3/day owned by PT Krakatau Posco. The plant utilizes both conventional and membrane technology to ensure efficient and sustainable wastewater treatment and reuse.</p>
                        ",
                        "description_id" => "
                            <p>KBW merupakan perusahaan patungan antara KTI dan Blue O&M Co. Ltd. Sejak didirikan pada tahun 2013, KBW bertanggung jawab atas pengoperasian fasilitas Pengolahan Air Limbah Akhir dengan kapasitas pengolahan 17.000 m3/hari, serta sistem pemanfaatan kembali air dengan kapasitas 7.000 m3/hari yang dimiliki oleh PT Krakatau Posco. Pabrik ini menggunakan teknologi konvensional dan membran untuk memastikan pengolahan air limbah yang efisien dan berkelanjutan.</p>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/business_pillars_wastewater_treatment_wrp_krakatau_steel_building_jakarta.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "WRP Krakatau Steel Building Jakarta",
                        "title_id" => "WRP Krakatau Steel Building Jakarta",
                        "align" => "right",
                        "description_en" => "
                            <p>The WRP is designed to treat water from building discharges, specifically from toilets, with a discharge of 2 m3/hour. The treated water is then reused for the building chiller system. The WRP built by KTI operates with a Build, Operate, Own (BOO) business scheme. This WRP utilizes advanced technologies such as Membrane Bio Reactor (MBR) and Ion Exchange (decolouration) technology to ensure an efficient treatment process and water use.</p>
                        ",
                        "description_id" => "
                            <p>WRP dirancang untuk mengolah air dari limbah bangunan, terutama dari toilet, dengan debit 2 m3/jam. Air hasil olahan kemudian digunakan kembali untuk sistem pendingin (chiller) bangunan. WRP yang dibangun oleh KTI ini beroperasi dengan skema bisnis Build, Operate, Own (BOO). WRP ini menggunakan teknologi canggih seperti Membrane Bio Reactor (MBR) dan Ion Exchange (decolouration) untuk memastikan proses pengolahan air yang efisien dan pemanfaatan air yang optimal.</p>
                        "
                    ]
                ]
            ],

            // PORT STORAGE
            [
                'our_business_id' => 3,
                'title_en' => 'PT Chandra Pelabuhan Nusantara',
                'title_id' => 'PT Chandra Pelabuhan Nusantara',
                'sub_title_en' => 'PT Chandra Pelabuhan Nusantara',
                'sub_title_id' => 'PT Chandra Pelabuhan Nusantara',
                'image' => '',
                'description_en' => "<p>PT Chandra Pelabuhan Nusantara (CPN) is a subsidiary PT Chandra Daya Investasi. Situated strategically in the Sunda Strait, CPN serves as a pivotal link connecting between the Java Sea, South China Sea, and Indian Ocean. With the goal of enhancing jetty services to customers in the Cilegon area, CPN operates three jetties that can accommodate vessels up to 80,000 DWT, supporting the transport of essential products such as  Naphtha, Ethylene, Propylene, Py-Gas, and more. Positioned in close proximity to refineries and chemical industries, CPN's jetties facilitate the reception of large crude carriers, serving the region’s key chemical companies efficiently.</p>",
                'description_id' => '<p>PT Chandra Pelabuhan Nusantara (CPN) adalah anak perusahaan PT Chandra Daya Investasi. Berlokasi strategis di Selat Sunda, CPN menjadi penghubung utama yang menghubungkan Laut Jawa, Laut Cina Selatan, dan Samudera Hindia. Dengan tujuan untuk meningkatkan layanan dermaga kepada pelanggan di wilayah Cilegon, CPN mengoperasikan tiga dermaga yang dapat mengakomodasi kapal hingga 80.000 DWT, mendukung pengangkutan produk-produk penting seperti Naphtha, Ethylene, Propylene, Py-Gas, dan banyak lagi. Diposisikan dekat dengan kilang dan industri kimia, dermaga CPN memfasilitasi penerimaan kapal pengangkut minyak mentah yang besar, melayani perusahaan-perusahaan kimia utama di kawasan ini secara efisien.</p>',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/cpn_key_assets_land_area.webp'),
                        "heading_en" => "Key Assets:",
                        "heading_id" => "Aset Utama:",
                        "heading_position" => "center",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Land Area",
                        "title_id" => "Luas Lahan",
                        "align" => "right",
                        "description_en" => "
                            <p>We operate on a 35.5 hectare land area located in Cilegon, providing ample space for our infrastructure and operations.</p>
                        ",
                        "description_id" => "
                            <p>Kami beroperasi di lahan seluas 35,5 hektar yang berlokasi di Cilegon, menyediakan ruang yang luas untuk infrastruktur dan operasional kami.</p>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/cpn_key_assets_jetty_facilities.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Jetty Facilities",
                        "title_id" => "Fasilitas Dermaga",
                        "align" => "left",
                        "description_en" => "
                            <p>We manage 3 strategically located jetties, designed to meet the operation needs of our shareholder:</p>
                            <ol>
                                <li>Jetty A: capacity to berth 80,000 DWT vessels for Naphtha, LP Propylene, and Py-Gas.</li>
                                <li>Jetty B: capacity to berth 6,000 DWT vessels for HP Propylene, LPG, and Naphtha.</li>
                                <li>Jetty C: capacity to berth 10,000 DWT vessels for Ethylene, Py-Gas, Raffinate-1, Butadiene, Naphtha, and PFO.</li>
                            </ol>
                        ",
                        "description_id" => "
                            <p>Kami mengelola 3 dermaga yang terletak secara strategis, dirancang untuk memenuhi kebutuhan operasional pemegang saham kami:</p>
                            <ol>
                                <li>Dermaga A: kapasitas menampung kapal hingga 80.000 DWT untuk Naphtha, LP Propylene, dan Py-Gas.</li>
                                <li>Dermaga B: kapasitas menampung kapal hingga 6.000 DWT untuk HP Propylene, LPG, dan Naphtha.</li>
                                <li>Dermaga C: kapasitas menampung kapal hingga 10.000 DWT untuk Ethylene, Py-Gas, Raffinate-1, Butadiene, Naphtha, dan PFO.</li>
                            </ol>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/cpn_key_assets_tank_farm.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Tank Farm",
                        "title_id" => "Gudang Tangki",
                        "align" => "right",
                        "description_en" => "
                            <p>We manage 53 tanks with a total storage capacity of 518,000 m3, including:</p>
                            <ol>
                                <li>Atmospheric tanks: Designed for liquid products such as Naphtha, MTBE, and methanol.</li>
                                <li>Pressurized tanks: Used for storing liquefied gases, including ethylene and propylene.</li>
                            </ol>
                        ",
                        "description_id" => "
                            <p>Kami mengelola 53 tangki dengan total kapasitas penyimpanan 518.000 m3, termasuk:</p>
                            <ol>
                                <li>Tangki atmosfer: Dirancang untuk produk cair seperti Naphtha, MTBE, dan metanol.</li>
                                <li>Tangki bertekanan: Digunakan untuk menyimpan gas cair, termasuk etilena dan propilena.</li>
                            </ol>
                        "
                    ]

                ]
            ],
            [
                'our_business_id' => 3,
                'title_en' => 'PT Redeco Petrolin Utama',
                'title_id' => 'PT Redeco Petrolin Utama',
                'sub_title_en' => 'PT Redeco Petrolin Utama',
                'sub_title_id' => 'PT Redeco Petrolin Utama',
                'image' => asset('assets/frontend/images/ourbusiness/redeco_overview.webp'),
                'description_en' => "
                    <p>CDI enhances its presence in the infrastructure sector, specifically in the ports & storage business category by holding a 50.75% stake in PT Redeco Petrolin Utama (RPU). The company officially began operating under CDI in 2023, after previously, in 2013, Chandra Asri, through SMI, increased its stake in RPU to 50.75%.</p>
                    <p>Recognized as a leading player in liquid bulk tank solutions, Redeco brings deep expertise in the design, construction, and maintenance of storage tanks. Established in 1986 in Banten, Redeco operates a terminal specializing in the storage of liquid bulk chemical products and efficiently manages the receipt, storage, and handling of chemicals, petrochemicals, and oil refinery products, using tanks designed to meet the specific needs of different substances. With a strong commitment to quality, environmental sustainability, and safety, Redeco holds relevant ISO certifications, ensuring compliance with the highest standards across all its operations.</p>
                ",
                'description_id' => "
                    <p>CDI memperkuat eksistensinya di sektor infrastruktur, khususnya di bidang usaha pelabuhan dan penyimpanan, dengan mengakuisisi 50,75% saham di PT Redeco Petrolin Utama (RPU). Perusahaan ini secara resmi mulai beroperasi di bawah CDI pada tahun 2023, setelah sebelumnya pada tahun 2013, Chandra Asri, melalui SMI, meningkatkan kepemilikan sahamnya di RPU menjadi 50,75%.</p>
                    <p>Dikenal sebagai pemain terkemuka dalam solusi tangki curah cair, Redeco memiliki keahlian yang mendalam dalam desain, konstruksi, dan pemeliharaan tangki penyimpanan. Didirikan pada tahun 1986 di Banten, Redeco mengoperasikan terminal yang berspesialisasi dalam penyimpanan produk kimia curah cair dan secara efisien mengelola penerimaan, penyimpanan, dan penanganan bahan kimia, petrokimia, dan produk kilang minyak, menggunakan tangki yang dirancang untuk memenuhi kebutuhan spesifik zat yang berbeda. Dengan komitmen yang kuat terhadap kualitas, kelestarian lingkungan, dan keselamatan, Redeco memegang sertifikasi ISO yang relevan, memastikan kepatuhan terhadap standar tertinggi di semua operasinya.</p>
                ",
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/redeco_key_assets_jetty.webp'),
                        "heading_en" => "Key Assets:",
                        "heading_id" => "Aset Utama:",
                        "heading_position" => "center",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Jetty",
                        "title_id" => "Dermaga",
                        "align" => "left",
                        "description_en" => "
                            <p>2 jetties with 100 meters LOA [1] each, suitable for 35,000 DWT vessel with 10 meters draft.</p>
                        ",
                        "description_id" => "
                            <p>2 dermaga dengan panjang 100 meter LOA [1] masing-masing, cocok untuk kapal 35.000 DWT dengan draft 10 meter.</p>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/redeco_key_assets_tank.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Tank",
                        "title_id" => "Tangki",
                        "align" => "right",
                        "description_en" => "
                            <p>72 tanks with a total capacity of 130,000 m3.</p>
                        ",
                        "description_id" => "
                            <p>72 tangki dengan total kapasitas 130.000 m3.</p>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/redeco_key_assets_supporting_assets.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Supporting Assets",
                        "title_id" => "Aset Pendukung",
                        "align" => "left",
                        "description_en" => "
                            <ol class='list-disc'>
                                <li>Centralized Filling Station (CFS) suitable for various types and sizes of road tankers.</li>
                                <li>Customer Order Service (COS) system for tailored-made product pick-up plans.</li>
                            </ol>
                        ",
                        "description_id" => "
                            <ol class='list-disc'>
                                <li>Stasiun Pengisian Terpusat (CFS) yang cocok untuk berbagai jenis dan ukuran truk tangki.</li>
                                <li>Sistem Layanan Pesanan Pelanggan (COS) untuk rencana pengambilan produk yang disesuaikan.</li>
                            </ol>
                        "
                    ],
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/redeco_key_assets_safety.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Safety",
                        "title_id" => "Keamanan",
                        "align" => "left",
                        "description_en" => "
                            <p>International standards of fire and safety, including an oil boom to handle any spillage.</p>
                        ",
                        "description_id" => "
                            <p>Standar internasional untuk keselamatan dan kebakaran, termasuk penghalang minyak untuk menangani tumpahan.</p>
                        "
                    ]

                ]
            ],

            // LOGISTIK
            [
                'our_business_id' => 4,
                'title_en' => 'Key Assets',
                'title_id' => 'Aset Utama',
                'sub_title_en' => '',
                'sub_title_id' => '',
                'image' => '',
                'description_en' => '',
                'description_id' => '',
                'items' => [
                    [
                        "image" => asset('assets/frontend/images/ourbusiness/key_assets.webp'),
                        "heading_en" => "",
                        "heading_id" => "",
                        "heading_position" => "",
                        "tagline_en" => "",
                        "tagline_id" => "",
                        "title_en" => "Key Assets:",
                        "title_id" => "Aset Utama:",
                        "align" => "left",
                        "description_en" => '
                            <ol class="list-disc">
                                <li>A fleet of 7 vessels with capacities ranging from  5,300 -to 8,800 DWT.</li>
                            </ol>
                        ',
                        "description_id" => '
                            <ol class="list-disc">
                                <li>Armada yang terdiri dari 7 kapal dengan kapasitas mulai dari 5.300 hingga 8.800 DWT.</li>
                            </ol>
                        ',
                    ]
                ]
            ]
        ];

        foreach ($ourbusiness_tabs as $key => $value) {
            $imageFields = ['image'];

            foreach ($imageFields as $field) {
                if (!empty($value[$field])) {
                    $value[$field] = Helper::handleMoveImage($value[$field], 'our-business/tabs');
                }
            }

            $tab = OurBusinessTab::create([
                "our_business_id" => $value["our_business_id"],
                "title_en" => $value["title_en"],
                "title_id" => $value["title_id"],
                "sub_title_en" => $value["sub_title_en"],
                "sub_title_id" => $value["sub_title_id"],
                "image" => $value["image"],
                "description_en" => $value["description_en"],
                "description_id" => $value["description_id"],
            ]);

            foreach ($value['items'] as $index => $item) {

                $imageFields = ['image'];

                foreach ($imageFields as $field) {
                    if (!empty($item[$field])) {
                        $item[$field] = Helper::handleMoveImage($item[$field], 'our-business/contents');

                    }
                }

                OurBusinessContent::create([
                    'name' => $value['title_en'] . " #" . ($index+1),
                    "our_business_id" => $value["our_business_id"],
                    "our_business_tab_id" => $tab->id,
                    "image" => $item['image'],
                    "heading_en" => $item['heading_en'],
                    "heading_id" => $item['heading_id'],
                    "heading_position" => $item['heading_position'],
                    "tagline_en" => $item['tagline_en'],
                    "tagline_id" => $item['tagline_id'],
                    "title_en" => $item['title_en'],
                    "title_id" => $item['title_id'],
                    "align" => $item['align'],
                    "description_en" => $item['description_en'],
                    "description_id" => $item['description_id'],
                ]);
            }
        }

    }
}
