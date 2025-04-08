<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Sustainability\SustainabilityContent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SustainabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [
            'name' => '',
            'category' => 'governance',
            'type' => '',
            'grid_type' => '',
            'title_en' => '',
            'title_id' => '',
            'content_en' => '',
            'content_id' => '',
            'content_json_en' => [],
            'content_json_id' => [],
            'align' => 'left',
            'image' => '',
            'file_information' => null,
            'background' => 'normal',
            'grid_direction' => 'row',
            'grid_pattern' => 'normal',
            'sort' => '',
        ];

        $data = [

            [
                'name' => 'Environment 1',
                'category' => 'environment',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Energy & Emission',
                'title_id' => 'Energi & Emisi',
                'content_en' => '<p>At PT Chandra Daya Investasi Tbk (CDI), we are committed to advancing Indonesia’s transition towards renewable energy. CDI’s subsidiary, PT Krakatau Chandra Energi (KCE), plays a crucial role in this effort by providing clean energy solutions.</p>',
                'content_id' => '<p>Di PT Chandra Daya Investasi Tbk (CDI), kami berkomitmen untuk memajukan transisi Indonesia menuju energi terbarukan. Anak perusahaan CDI, PT Krakatau Chandra Energi (KCE), memainkan peran penting dalam upaya ini dengan menyediakan solusi energi bersih.</p>',
                'align' => 'right',
                'image' => asset('assets/frontend/images/sustainability/energy_emission.webp'),
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 1,
                'content_json_en' => [],
                'content_json_id' => []
            ],
            [
                'name' => 'Environment 2',
                'category' => 'environment',
                'type' => 'grid',
                'grid_type' => 'icon_list_card',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_solar_panel_05.svg'),
                        "title" => '',
                        "description" => '
                            <p>Currently, CDI’s installed capacity of renewable energy sources reaches 2.199, 82 kWp, with plans to scale up CDI’s  Solar Power Plant (PLTS) to 3 MWp. These initiatives contribute to an estimated 40% reduction in electricity costs while lowering carbon emissions by 730,73 tons of CO₂ annually.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_tree.svg'),
                        "title" => '',
                        "description" => '
                            <p>More trees By 2024, PT Krakatau Chandra Energi employees will have planted 214 trees in the KCE area. This is part of a program to reduce carbon emissions.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_chimney.svg'),
                        "title" => '',
                        "description" => '
                            <p>CDI also has implemented the Continuous Emission Monitoring System (CEMS) to track air emissions in real time, ensuring compliance with government regulations. On top of that, CDI’s Dry Low NOx Burner (DLN) technology helps reduce NOx emissions, supporting a cleaner and healthier atmosphere.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_award_3.svg'),
                        "title" => '',
                        "description" => '
                            <p>Recognizing CDI’s leadership in energy transition, CDI was awarded the "Private Sector Energy Provider in Energy Transition" by the National Energy Council in 2023.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_solar_panel_05.svg'),
                        "title" => '',
                        "description" => '
                            <p>Saat ini, kapasitas terpasang sumber energi terbarukan CDI mencapai 2.199,82 kWp, dengan rencana untuk meningkatkan Pembangkit Listrik Tenaga Surya (PLTS) CDI menjadi 3 MWp. Inisiatif ini berkontribusi terhadap pengurangan biaya listrik sebesar 40% sekaligus menurunkan emisi karbon sebesar 730,73 ton CO₂ per tahun.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_tree.svg'),
                        "title" => '',
                        "description" => '
                            <p>Lebih banyak pohon Pada tahun 2024, karyawan PT Krakatau Chandra Energi akan menanam 214 pohon di area KCE. Hal ini merupakan bagian dari program pengurangan emisi karbon.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_chimney.svg'),
                        "title" => '',
                        "description" => '
                            <p>CDI juga telah menerapkan Sistem Pemantauan Emisi Berkelanjutan (CEMS) untuk melacak emisi udara secara real time, memastikan kepatuhan terhadap peraturan pemerintah.Selain itu, teknologi Dry Low NOx Burner (DLN) CDI membantu mengurangi emisi NOx, sehingga mendukung atmosfer yang lebih bersih dan sehat.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_award_3.svg'),
                        "title" => '',
                        "description" => '
                            <p>Sebagai pengakuan atas kepemimpinan CDI dalam transisi energi, CDI dianugerahi penghargaan sebagai “Penyedia Energi Sektor Swasta dalam Transisi Energi” oleh Dewan Energi Nasional pada tahun 2023.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 2,
            ],
            [
                'name' => 'Environment 3',
                'category' => 'environment',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Waste Management',
                'title_id' => 'Pengelolaan Limbah',
                'content_en' => "<p>As part of CDI’s waste reduction strategy, CDI supports plastic waste recycling through the third-party program of PT Krakatau Chandra Energi's Fostered Waste Bank, namely Yayasan Al Busniyah. CDI’s commitment to sustainability extends to achieving zero waste to landfills, ensuring that all waste is reused or treated responsibly. And every 3 month delivered recycle garbage for Bank Sampah Al Bustaniyah.</p>
                        <p>The Waste Bank was built to handle waste processing and make people aware of a healthy, clean and neat environment.</p>",
                'content_id' => "<p>Sebagai bagian dari strategi pengurangan sampah CDI, CDI mendukung daur ulang sampah plastik melalui program pihak ketiga Bank Sampah Binaan PT Krakatau Chandra Energi, yaitu Yayasan Al Busniyah. Komitmen CDI terhadap keberlanjutan mencakup pencapaian nol sampah di tempat pembuangan akhir, memastikan bahwa semua sampah digunakan kembali atau diolah secara bertanggung jawab. Dan setiap 3 bulan mengirimkan sampah daur ulang untuk Bank Sampah Al Bustaniyah.</p>
                        <p>Bank Sampah dibangun untuk menangani pengolahan sampah dan menyadarkan masyarakat akan lingkungan yang sehat, bersih, dan rapi.</p>",
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/waste_management.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 3,
            ],
            [
                'name' => 'Environment 4',
                'category' => 'environment',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Climate Resilience',
                'title_id' => 'Ketahanan Iklim',
                'content_en' => "<p>Amid rising climate concerns, society is embracing a low-carbon future, with stakeholders ranging from governments to eco-conscious consumers driving sustainability efforts. Globally, commitments from UN Climate Change Conference (COP) 26 and Indonesia's ENDC are accelerating actions to cut greenhouse gas emissions. Notably, at COP 27, accountability for climate action now includes businesses such as CDI, which as Indonesia’s leading chemical and infrastructure company, committed to lead in sustainability and integrate green practices into growth strategies.</p>
                        <p>For CDI, climate resilience strategy starts with climate risk assessment, leading to a decarbonization roadmap that support Indonesia’s Net Zero Emission Target, aligned with  ENDC and LTS-LCCR 2050. We chart an additional course, preparing for rigorous regulations and stakeholder expectations while striving to adhere to science-based targets (SBT).</p>",
                'content_id' => "<p>Di tengah meningkatnya kekhawatiran iklim, masyarakat merangkul masa depan rendah karbon, dengan para pemangku kepentingan mulai dari pemerintah hingga konsumen yang peduli lingkungan yang mendorong upaya keberlanjutan. Secara global, komitmen dari Konferensi Perubahan Iklim PBB (COP) 26 dan ENDC Indonesia mempercepat tindakan untuk memangkas emisi gas rumah kaca. Khususnya, di COP 27, akuntabilitas untuk aksi iklim kini mencakup bisnis seperti CDI, yang sebagai perusahaan kimia dan infrastruktur terkemuka di Indonesia, berkomitmen untuk memimpin dalam keberlanjutan dan mengintegrasikan praktik ramah lingkungan ke dalam strategi pertumbuhan.</p>
                        <p>Bagi CDI, strategi ketahanan iklim dimulai dengan penilaian risiko iklim, yang mengarah pada peta jalan dekarbonisasi yang mendukung Target Emisi Nol Bersih Indonesia, yang selaras dengan ENDC dan LTS-LCCR 2050. Kami memetakan arah tambahan, mempersiapkan regulasi yang ketat dan harapan pemangku kepentingan sambil berusaha mematuhi target berbasis sains (SBT).</p>",
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'right',
                'image' => asset('assets/frontend/images/sustainability/climate_resilience.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 4
            ],
            [
                'name' => 'Environment 5',
                'category' => 'environment',
                'type' => 'grid',
                'grid_type' => 'icon_content_card',
                'title_en' => 'Decarbonisation Strategy',
                'title_id' => 'Strategi Dekarbonisasi',
                'content_en' => '',
                'content_id' => '',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_a.svg'),
                        "title" => 'Abate existing emission through energy efficiency',
                        "description" => '
                            <p>Process modification, equipment substitution, waste- heat recovery, digitalization, loss reduction, energy consumption management, and increasing operational efficiency.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_b.svg'),
                        "title" => 'Balance future emission by incorporated green business',
                        "description" => '
                            <p>Business expansion with lower emission, expanding renewable energy business, study on green or sustainable product development, circular plastic, a new chemical pathway, and potential business from nature-based solution</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_c.svg'),
                        "title" => 'Control Emission Through Green Technology Application',
                        "description" => '
                            <p>Study on low carbon fuel application such as blue/green H2, RDF and CCUS implementation in collaboration with technology and service providers.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_d.svg'),
                        "title" => 'Decarbonize Through Nature Based Solution',
                        "description" => '
                            <p>Providing nature-based solutions such as forestry practices, blue carbon, restorative agriculture, and marine practices</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_a.svg'),
                        "title" => 'Mengurangi emisi yang ada melalui efisiensi energi',
                        "description" => '
                            <p>Modifikasi proses, penggantian peralatan, pemulihan panas limbah, digitalisasi, pengurangan kehilangan, manajemen konsumsi energi, dan peningkatan efisiensi operasional.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_b.svg'),
                        "title" => 'Menyeimbangkan emisi masa depan dengan bisnis hijau yang terintegrasi',
                        "description" => '
                            <p>Ekspansi bisnis dengan emisi rendah, perluasan bisnis energi terbarukan, studi tentang pengembangan produk hijau atau berkelanjutan, plastik sirkular, jalur kimia baru, dan potensi bisnis dari solusi berbasis alam</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_c.svg'),
                        "title" => 'Pengendalian Emisi Melalui Penerapan Teknologi Hijau',
                        "description" => '
                            <p>Studi tentang aplikasi bahan bakar rendah karbon seperti H2 biru/hijau, implementasi RDF dan CCUS bekerja sama dengan penyedia teknologi dan layanan.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/icon_text_d.svg'),
                        "title" => 'Dekarbonisasi Melalui Solusi Berbasis Alam',
                        "description" => '
                            <p>Menyediakan solusi berbasis alam seperti praktik kehutanan, karbon biru, pertanian restoratif, dan praktik kelautan</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/decarbonisation_strategy.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 4
            ],
            [
                'name' => 'Environment 6',
                'category' => 'environment',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Advancing Sustainability through the Circular Economy',
                'title_id' => 'Memajukan Keberlanjutan melalui Ekonomi Sirkular',
                'content_en' => '<p>CDI adopts a dual circularity approach, with an internal strategy dedicated to enhancing waste management within operational processes and an external strategy focusing on community-level material use management.</p>',
                'content_id' => '<p>CDI mengadopsi pendekatan sirkularitas ganda, dengan strategi internal yang didedikasikan untuk meningkatkan pengelolaan limbah dalam proses operasional dan strategi eksternal yang berfokus pada pengelolaan penggunaan material di tingkat komunitas.</p>',
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/circular_economy.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 6
            ],
            [
                'name' => 'Environment 7',
                'category' => 'environment',
                'type' => 'grid',
                'grid_type' => 'box_icon_card',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_biomass_energy.svg'),
                        "title" => 'Ensuring Circularity Across Our Operations',
                        "description" => '
                            <p>We are incorporating circular economy principles internally into our operational strategy to reduce waste and promote material reuse. By using the 4R approach—reduce, reuse, recycle, and recover—we aim to minimize waste generation and encourage a circular flow of resources. Our goal is to enhance waste management practices and move towards a more sustainable operational model.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_eco_energy.svg'),
                        "title" => 'Promoting External Circularity with Communities',
                        "description" => '
                            <p>The second aspect of CDI’s circularity strategy focuses on managing material use at the community level. This includes efforts to promote plastic waste management in the community through educational outreach initiatives aimed at raising awareness about the importance of plastic recycling and the advantages of a circular economy.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_rec_le_01.svg'),
                        "title" => 'Plastic Asphalt Road Journey',
                        "description" => '
                            <p>Since its inception in 2018, the program has exceeded target of 100 kg of roads using plastic waste materials in 2023, demonstrating CDI’s commitment to sustainability and environmental responsibility. Furthermore, 2024 onwards focusing on stakeholder collaboration for plastic asphalt road implementation. Each kilometre of the plastic asphalt road incorporates approximately 1.6 tons of plastic waste, equivalent to recycling approximately 1.2 million plastic bags, showcasing tangible environmental impact and community engagement.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_biomass_energy.svg'),
                        "title" => 'Memastikan Sirkularitas di Seluruh Operasional Kami',
                        "description" => '
                            <p>Kami menggabungkan prinsip ekonomi sirkular secara internal ke dalam strategi operasional kami untuk mengurangi limbah dan mendorong penggunaan kembali material. Dengan menggunakan pendekatan 4R—kurangi, gunakan kembali, daur ulang, dan pulihkan—kami bertujuan untuk meminimalkan timbulan limbah dan mendorong aliran sumber daya yang sirkular. Sasaran kami adalah untuk meningkatkan praktik pengelolaan limbah dan bergerak menuju model operasional yang lebih berkelanjutan.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_eco_energy.svg'),
                        "title" => 'Mempromosikan Sirkularitas Eksternal dengan Komunitas',
                        "description" => '
                            <p>Aspek kedua dari strategi sirkularitas CDI berfokus pada pengelolaan penggunaan material di tingkat masyarakat. Ini termasuk upaya untuk mempromosikan pengelolaan limbah plastik di masyarakat melalui inisiatif penjangkauan pendidikan yang bertujuan untuk meningkatkan kesadaran tentang pentingnya daur ulang plastik dan keuntungan ekonomi sirkular.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_rec_le_01.svg'),
                        "title" => 'Perjalanan Jalan Aspal Plastik',
                        "description" => '
                            <p>Sejak dimulai pada tahun 2018, program ini telah melampaui target 100 kg jalan menggunakan bahan limbah plastik pada tahun 2023, yang menunjukkan komitmen CDI terhadap keberlanjutan dan tanggung jawab lingkungan. Selanjutnya, pada tahun 2024 dan seterusnya, fokusnya adalah pada kolaborasi pemangku kepentingan untuk penerapan jalan aspal plastik. Setiap kilometer jalan aspal plastik mengandung sekitar 1,6 ton limbah plastik, yang setara dengan daur ulang sekitar 1,2 juta kantong plastik, yang menunjukkan dampak lingkungan yang nyata dan keterlibatan masyarakat.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 7,
            ],

            [
                'name' => 'Social 1',
                'category' => 'social',
                'type' => 'simple_text_information',
                'grid_type' => '',
                'title_en' => 'Health and Safety Culture',
                'title_id' => 'Budaya Kesehatan dan Keselamatan',
                'content_en' => '<p>CDI’s safety commitment is reflected in the SMK3-certified Occupational Health & Safety System, also complemented by the ISO 45001:2018 certification. Through strict safety protocols, CDI has maintained a zero Lost Time Accident (LTA) record for three consecutive years (2021-2024).</p>
                        <p>In recognition of CDI’s workplace safety excellence, CDI received the Zero Accident Award from the Banten Provincial Manpower and Transmigration Office, and Ministry of Manpower.</p>',
                'content_id' => '<p>Komitmen keselamatan CDI tercermin dalam Sistem Keselamatan dan Kesehatan Kerja (K3) bersertifikasi SMK3, yang juga dilengkapi dengan sertifikasi ISO 45001:2018. Melalui protokol keselamatan yang ketat, CDI telah mempertahankan rekor nihil Lost Time Accident (LTA) selama tiga tahun berturut-turut (2021-2024).</p>
                        <p>Sebagai pengakuan atas keunggulan keselamatan kerja CDI, CDI menerima Penghargaan Kecelakaan Nihil dari Dinas Tenaga Kerja dan Transmigrasi Provinsi Banten, dan Kementerian Ketenagakerjaan.</p>',
                'content_json_en' => [
                    [
                        "icon" => '',
                        "title" => 'ZERO',
                        "description" => 'Lost Time Accident 2021-2024'
                    ],
                    [
                        "icon" => '',
                        "title" => '100%',
                        "description" => 'Certified ISO 45001'
                    ],
                    [
                        "icon" => '',
                        "title" => 'ZERO',
                        "description" => 'Accident'
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => '',
                        "title" => 'ZERO',
                        "description" => 'Kecelakaan Waktu Hilang 2021-2024'
                    ],
                    [
                        "icon" => '',
                        "title" => '100%',
                        "description" => 'Bersertifikat ISO 45001'
                    ],
                    [
                        "icon" => '',
                        "title" => 'ZERO',
                        "description" => 'Kecelakaan'
                    ]
                ],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/health_and_safety_culture_background.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 1,
            ],
            [
                'name' => 'Social 2',
                'category' => 'social',
                'type' => 'grid',
                'grid_type' => 'box_icon_card',
                'title_en' => 'Human Capital',
                'title_id' => 'Sumber Daya Manusia',
                'content_en' => '',
                'content_id' => '',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_user_ai.svg'),
                        "title" => 'Competency & Career Development',
                        "description" => '
                            <ol><li>Significant emphasis on providing learning opportunities, competency training, and advancement avenues for all employees, regardless of gender. </li>
                            <li>Diverse training programs are offered using the 70:20:10 learning model, including self-learning, coaching, and job-specific training. </li>
                            <li>Aimed at enhancing skills and driving career growth for employees.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_task_done_01.svg'),
                        "title" => 'Employee Engagement',
                        "description" => '
                            <ol><li>Surveys are conducted to gauge employee engagement across various dimensions like career development, performance management, and recognition. </li>
                            <li>Feedback is used to continuously improve human resources management strategies. </li>
                            <li>Focused on ensuring employee satisfaction and productivity.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_approximately_equal_circle.svg'),
                        "title" => 'Diversity',
                        "description" => '
                            <ol><li>Chandra Asri Group focuses on empowering all employees and providing equal opportunities for career progression. </li>
                            <li>Programs like CA Women and initiatives promoting work-life balance are implemented. </li>
                            <li>Aims to ensure personal and professional growth for all individuals, regardless of gender or social background.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_job_share.svg'),
                        "title" => 'Industrial Relations',
                        "description" => '
                            <ol><li>Transparent communication channels are fostered between management and employees to ensure rights and obligations are upheld.</li>
                            <li>Monthly meetings and coordination sessions are held for formal discussions on workplace matters.</li>
                            <li>Focuses on creating a collaborative and supportive work environment.</li></ol>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_user_ai.svg'),
                        "title" => 'Kompetensi & Pengembangan Karir',
                        "description" => '
                            <ol><li>Penekanan signifikan pada penyediaan kesempatan belajar, pelatihan kompetensi, dan jalur pengembangan bagi semua karyawan, tanpa memandang jenis kelamin.  </li>
                            <li>Beragam program pelatihan ditawarkan menggunakan model pembelajaran 70:20:10, termasuk pembelajaran mandiri, pembinaan, dan pelatihan khusus pekerjaan.  </li>
                            <li>Ditujukan untuk meningkatkan keterampilan dan mendorong pertumbuhan karier bagi karyawan.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_task_done_01.svg'),
                        "title" => 'Keterlibatan Karyawan',
                        "description" => '
                            <ol><li>Survei dilakukan untuk mengukur keterlibatan karyawan di berbagai dimensi seperti pengembangan karier, manajemen kinerja, dan pengakuan. </li>
                            <li>Umpan balik digunakan untuk terus meningkatkan strategi manajemen sumber daya manusia. </li>
                            <li>Berfokus pada memastikan kepuasan dan produktivitas karyawan.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_approximately_equal_circle.svg'),
                        "title" => 'Keberagaman',
                        "description" => '
                            <ol><li>Chandra Asri Group berfokus pada pemberdayaan semua karyawan dan menyediakan kesempatan yang sama untuk kemajuan karier. </li>
                            <li>Program seperti CA Women dan inisiatif yang mempromosikan keseimbangan kehidupan dan pekerjaan dilaksanakan. </li>
                            <li>Bertujuan untuk memastikan pertumbuhan pribadi dan profesional bagi semua individu, tanpa memandang jenis kelamin atau latar belakang sosial.</li></ol>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_job_share.svg'),
                        "title" => 'Hubungan Industrial',
                        "description" => '
                            <ol><li>Saluran komunikasi yang transparan dibangun antara manajemen dan karyawan untuk memastikan hak dan kewajiban ditegakkan.</li>
                            <li>Pertemuan bulanan dan sesi koordinasi diadakan untuk diskusi formal mengenai masalah di tempat kerja.</li>
                            <li>Berfokus pada penciptaan lingkungan kerja yang kolaboratif dan suportif.</li></ol>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 2,
            ],
            [
                'name' => 'Social 3',
                'category' => 'social',
                'type' => 'file_information',
                'grid_type' => '',
                'title_en' => 'Human Rights',
                'title_id' => 'Hak asasi Manusia',
                'content_en' => '<p>CDI’s places significant emphasis on respecting human rights and fostering justice in the workplace, guided by fundamental principles of equality and fairness without bias. We hold ourselves to international human rights norms and are committed to equitable treatment, equal opportunities, and a supportive workplace culture that values employee contributions. This is ensured through training on human rights for everyone who works for or with CDI.</p>
                        <p>Our Human Rights Policy showcases a deep commitment to upholding essential human rights that are aligned with the United Nations Universal as well as the International Labor Organization. This policy reflects stringent business ethics standards and includes a Whistleblowing Management Policy, providing a secure channel for employees and stakeholders to report concerns of discrimination or unfair treatment confidentially, fostering a culture of support and respect within the organization.</p>',
                'content_id' => '<p>CDI sangat menekankan penghormatan terhadap hak asasi manusia dan pembinaan keadilan di tempat kerja, yang dipandu oleh prinsip-prinsip dasar kesetaraan dan keadilan tanpa bias. Kami menjunjung tinggi norma-norma hak asasi manusia internasional dan berkomitmen untuk memberikan perlakuan yang adil, kesempatan yang sama, dan budaya tempat kerja yang mendukung yang menghargai kontribusi karyawan. Hal ini dipastikan melalui pelatihan tentang hak asasi manusia bagi setiap orang yang bekerja untuk atau bersama CDI.</p>
                        <p>Kebijakan Hak Asasi Manusia kami menunjukkan komitmen yang mendalam untuk menegakkan hak asasi manusia yang penting yang sejalan dengan Perserikatan Bangsa-Bangsa dan Organisasi Perburuhan Internasional. Kebijakan ini mencerminkan standar etika bisnis yang ketat dan mencakup Kebijakan Manajemen Pengungkapan Pelanggaran, yang menyediakan saluran yang aman bagi karyawan dan pemangku kepentingan untuk melaporkan masalah diskriminasi atau perlakuan tidak adil secara rahasia, serta membina budaya dukungan dan rasa hormat dalam organisasi.</p>',
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'darkest',
                'grid_direction' => 'col',
                'grid_pattern' => 'normal',
                'sort' => 3,
            ],
            [
                'name' => 'Social 4',
                'category' => 'social',
                'type' => 'grid',
                'grid_type' => 'image_content_card',
                'title_en' => 'Practices of Occupational Health and Safety',
                'title_id' => 'Praktik Kesehatan dan Keselamatan Kerja',
                'content_en' => '<p>CDI implements employment practices grounded in occupational health and safety (OHS) principles, ensuring that every employee works in a safe and healthy environment that complies with OHS regulations and standards. Our top priority is to foster a workplace culture that emphasizes safety and well-being for all employees. </p>
                        <p>We enhance workplace safety protocols and maintain a healthy environment through proactive measures and ongoing training initiatives, supporting the optimal performance and welfare of our workforce.</p>',
                'content_id' => '<p>CDI menerapkan praktik ketenagakerjaan yang berlandaskan pada prinsip-prinsip kesehatan dan keselamatan kerja (K3), memastikan bahwa setiap karyawan bekerja di lingkungan yang aman dan sehat yang mematuhi peraturan dan standar K3. Prioritas utama kami adalah menumbuhkan budaya tempat kerja yang menekankan keselamatan dan kesejahteraan bagi semua karyawan. </p>
                        <p>Kami meningkatkan protokol keselamatan tempat kerja dan menjaga lingkungan yang sehat melalui langkah-langkah proaktif dan inisiatif pelatihan berkelanjutan, yang mendukung kinerja dan kesejahteraan optimal tenaga kerja kami.</p>',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/images/sustainability/ohs_management_system_image.webp'),
                        "title" => 'Compliance with OHS Management System',
                        "description" => '
                            <p>We adopt the Occupational Health and Safety Management System (OHSMS) to prevent work accidents and environmental pollution. OHSMS is applied to 100% to all our employees and business partners, guided by national regulations and global standards.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/images/sustainability/life_saving_rules_image.webp'),
                        "title" => 'Life Saving Rules',
                        "description" => '
                            <p>These are the golden rules, we adopt for a workplace safety program with mandatory safety regulations for everyone in the company, along with penalties for violations. These rules are recognize that workplace safety is a shared responsibility that requires the contributions, vigilance, and care of all employees.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/images/sustainability/process_safety_management_image.webp'),
                        "title" => 'Process Safety Management',
                        "description" => '
                            <p>CDI has established a process safety management (PSM) system to prevent catastrophic incidents. This system employs various hazard management techniques to mitigate the risks associated with the release of hydrocarbons, chemicals, or other energy sources.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/images/sustainability/ohs_management_system_image.webp'),
                        "title" => 'Kepatuhan terhadap Sistem Manajemen K3',
                        "description" => '
                            <p>Kami menerapkan Sistem Manajemen Keselamatan dan Kesehatan Kerja (SMK3) untuk mencegah kecelakaan kerja dan pencemaran lingkungan. SMK3 diterapkan 100% kepada seluruh karyawan dan mitra bisnis kami, dengan berpedoman pada peraturan nasional dan standar global.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/images/sustainability/life_saving_rules_image.webp'),
                        "title" => 'Aturan Penyelamatan Jiwa',
                        "description" => '
                            <p>Ini adalah aturan emas yang kami terapkan untuk program keselamatan di tempat kerja dengan peraturan keselamatan wajib bagi setiap orang di perusahaan, beserta sanksi atas pelanggaran. Aturan ini mengakui bahwa keselamatan di tempat kerja adalah tanggung jawab bersama yang membutuhkan kontribusi, kewaspadaan, dan kepedulian dari semua karyawan.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/images/sustainability/process_safety_management_image.webp'),
                        "title" => 'Manajemen Keamanan Proses',
                        "description" => '
                            <p>CDI telah menetapkan sistem manajemen keselamatan proses (PSM) untuk mencegah insiden bencana. Sistem ini menggunakan berbagai teknik manajemen bahaya untuk mengurangi risiko yang terkait dengan pelepasan hidrokarbon, bahan kimia, atau sumber energi lainnya.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'col',
                'grid_pattern' => 'normal',
                'sort' => 4
            ],
            [
                'name' => 'Social 5',
                'category' => 'social',
                'type' => 'grid',
                'grid_type' => 'box_icon_card',
                'title_en' => 'Product Responsibility',
                'title_id' => 'Tanggung Jawab Produk',
                'content_en' => '<p>The Company realizes that the service of quality product to customers is an important key to the ongoing success of business. Therefore, the Company actively builds an effective communication line with the customers and coupled with a strict production supervision to ensure the product quality comply with the standards.</p>',
                'content_id' => '<p>Perusahaan menyadari bahwa layanan produk berkualitas kepada pelanggan merupakan kunci penting bagi keberhasilan bisnis yang berkelanjutan. Oleh karena itu, Perusahaan secara aktif membangun jalur komunikasi yang efektif dengan pelanggan dan disertai dengan pengawasan produksi yang ketat untuk memastikan kualitas produk sesuai dengan standar.</p>',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_frameworks_outline.svg'),
                        "title" => 'Product Management Framework',
                        "description" => '
                            <p>CDI employs several product management systems, including Responsible Care®, SNI, Halal, and ISO 9001, to ensure product safety throughout its lifecycle. These management systems encompass not only regulatory compliance but also strategies to mitigate risks related to health, safety, and environmental factors.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_idea_outline.svg'),
                        "title" => 'Customer-Centric Solutions',
                        "description" => '
                            <p>Every customer of CDI is a priority stakeholder who can strongly influence business continuity. Understanding this importance, we implement a proactive service to assure service satisfaction at all times.&nbsp.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_test_tube_outline.svg'),
                        "title" => 'Chemical and Product Stewardship',
                        "description" => '
                            <p>To ensure that the use and handling of chemicals are carried out following applicable requirements, CDI undertakes activities including chemical hazard assessment, chemical registration, chemical hazards emergency response, and marketing and products labelling.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_renewable_energy_outline.svg'),
                        "title" => 'Sustainable Products',
                        "description" => '
                            <p>Our sustainability is demonstrated by the integration of clean technologies and principles, and environmentally friendly product innovations within our green business endeavours. Achieving the International Sustainability & Carbon Certification (ISCC) for our products is a significant milestone for us. With ISCC certification, we are optimistic about exploring opportunities to transition to the use of bio-feedstock as an alternative feedstock.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_frameworks_outline.svg'),
                        "title" => 'Kerangka Manajemen Produk',
                        "description" => '
                            <p>CDI menggunakan beberapa sistem manajemen produk, termasuk Responsible Care®, SNI, Halal, dan ISO 9001, untuk memastikan keamanan produk sepanjang siklus hidupnya. Sistem manajemen ini tidak hanya mencakup kepatuhan terhadap peraturan tetapi juga strategi untuk mengurangi risiko yang terkait dengan faktor kesehatan, keselamatan, dan lingkungan.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_idea_outline.svg'),
                        "title" => 'Solusi Berpusat pada Pelanggan',
                        "description" => '
                            <p>Setiap pelanggan CDI merupakan pemangku kepentingan prioritas yang dapat memengaruhi kelangsungan bisnis secara signifikan. Memahami pentingnya hal ini, kami menerapkan layanan proaktif untuk memastikan kepuasan layanan setiap saat.&nbsp.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_test_tube_outline.svg'),
                        "title" => 'Pengelolaan Bahan Kimia dan Produk',
                        "description" => '
                            <p>Untuk memastikan bahwa penggunaan dan penanganan bahan kimia dilakukan sesuai dengan persyaratan yang berlaku, CDI melakukan kegiatan termasuk penilaian bahaya bahan kimia, pendaftaran bahan kimia, tanggap darurat bahaya bahan kimia, serta pemasaran dan pelabelan produk.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_renewable_energy_outline.svg'),
                        "title" => 'Produk Berkelanjutan',
                        "description" => '
                            <p>Keberlanjutan kami ditunjukkan dengan integrasi teknologi dan prinsip bersih, serta inovasi produk ramah lingkungan dalam usaha bisnis hijau kami. Meraih Sertifikasi Keberlanjutan & Karbon Internasional (ISCC) untuk produk kami merupakan tonggak penting bagi kami. Dengan sertifikasi ISCC, kami optimis dalam mengeksplorasi peluang untuk beralih ke penggunaan bahan baku hayati sebagai bahan baku alternatif.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'darkest',
                'grid_direction' => 'row',
                'grid_pattern' => 'zig-zag',
                'sort' => 5,
            ],

            [
                'name' => 'Governance 1',
                'category' => 'governance',
                'type' => 'file_information',
                'grid_type' => '',
                'title_en' => 'Business Ethics',
                'title_id' => 'Etika Bisnis',
                'content_en' => "<p>PT Chandra Daya Investasi Tbk (CDI) upholds strong Business Ethics standards to ensure integrity, transparency, and accountability across all operations. Guided by a Code of Conduct emphasizing honesty, fairness, and respect, employees undergo training to uphold ethical standards and report any concerns through the Company's Whistleblowing System. Individual behaviour is regulated by our iSTAR values and internal Code of Conduct, both of which emphasize professionalism, integrity, and ethical conduct at every level. This commitment to Business Ethics and the Code of Conduct fosters a culture of responsibility, compliance, and ethical business practices essential for optimal governance and sustainable operations.</p>",
                'content_id' => "<p>PT Chandra Daya Investasi Tbk (CDI) menjunjung tinggi standar Etika Bisnis yang kuat untuk memastikan integritas, transparansi, dan akuntabilitas di semua operasi. Dipandu oleh Kode Etik yang menekankan kejujuran, keadilan, dan rasa hormat, karyawan menjalani pelatihan untuk menegakkan standar etika dan melaporkan setiap masalah melalui Sistem Pengungkapan Pelanggaran Perusahaan. Perilaku individu diatur oleh nilai-nilai iSTAR dan Kode Etik internal kami, yang keduanya menekankan profesionalisme, integritas, dan perilaku etis di setiap level. Komitmen terhadap Etika Bisnis dan Kode Etik ini menumbuhkan budaya tanggung jawab, kepatuhan, dan praktik bisnis yang etis yang penting untuk tata kelola yang optimal dan operasi yang berkelanjutan.</p>",
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/business_ethics.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 1,
            ],
            [
                'name' => 'Governance 2',
                'category' => 'governance',
                'type' => 'list_information',
                'grid_type' => '',
                'title_en' => 'Anti-Corruption and Anti-Bribery',
                'title_id' => 'Anti Korupsi dan Anti Penyuapan',
                'content_en' => '<p>CDI firmly rejects all forms of corrupt practices and is dedicated to combating these throughout our operations. The commitment to combating corruption involves continuous enhancements to the Code of Conduct to ensure the highest standards of governance.  </p>',
                'content_id' => '<p>CDI dengan tegas menolak segala bentuk praktik korupsi dan berkomitmen untuk memberantasnya di seluruh operasi kami. Komitmen untuk memberantas korupsi melibatkan penyempurnaan berkelanjutan terhadap Kode Etik untuk memastikan standar tata kelola tertinggi.</p>',
                'content_json_en' => [
                    [
                        "title" => "Policy Framework",
                        "description" => "Embedding anti-corruption policies in our Code of Ethics and the Collective Labor Agreement, CDI upholds these principles through the iSTAR values, particularly focusing on integrity and accountability."
                    ],
                    [
                        "title" => "Training and Awareness",
                        "description" => "CDI conducts regular awareness campaigns for employees, business partners, and customers."
                    ],
                    [
                        "title" => "Whistleblower Mechanism",
                        "description" => "Employees and external parties involved are encouraged to report instances of fraud or ethical violations through the established Whistleblower mechanism, where reports are meticulously investigated by the Whistleblower Committee."
                    ]
                ],
                'content_json_id' => [
                    [
                        "title" => "Kerangka Kebijakan",
                        "description" => "Dengan menanamkan kebijakan antikorupsi dalam Kode Etik dan Perjanjian Kerja Bersama, CDI menegakkan prinsip-prinsip ini melalui nilai-nilai iSTAR, terutama berfokus pada integritas dan akuntabilitas."
                    ],
                    [
                        "title" => "Pelatihan dan Kesadaran",
                        "description" => "CDI menyelenggarakan kampanye kesadaran rutin bagi karyawan, mitra bisnis, dan pelanggan."
                    ],
                    [
                        "title" => "Mekanisme Pelapor Pelanggaran",
                        "description" => "Karyawan dan pihak eksternal yang terlibat didorong untuk melaporkan kejadian penipuan atau pelanggaran etika melalui mekanisme Whistleblower yang telah ditetapkan, di mana laporan akan diselidiki secara cermat oleh Komite Whistleblower."
                    ]
                ],
                'align' => 'right',
                'image' => asset('assets/frontend/images/sustainability/anti_corruption_and_anti_bribery.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 2,
            ],
            [
                'name' => 'Governance 3',
                'category' => 'governance',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Grievance Mechanism',
                'title_id' => 'Mekanisme Pengaduan',
                'content_en' => '<p>Grievance System provides employees with a confidential mechanism to address concerns within the realm of industrial relations. The Company ensures informant confidentiality, allowing individuals to report complaints without fear of repercussions. Reports are taken seriously and investigated promptly, with appropriate sanctions enforced for proven violations.</p>
                        <p>We promptly and fairly address grievances to create a transparent and supportive work environment. We have established clear procedures for submitting complaints, conducting investigations, and providing resolution guidelines. We believe that effective grievance mechanisms help us identify and resolve issues, enhance employee satisfaction, and ensure compliance with legal and ethical standards.</p>',
                'content_id' => '<p>Sistem Pengaduan menyediakan mekanisme rahasia bagi karyawan untuk menangani masalah dalam ranah hubungan industrial. Perusahaan memastikan kerahasiaan informan, yang memungkinkan individu untuk melaporkan pengaduan tanpa takut akan akibat hukum. Laporan ditanggapi dengan serius dan diselidiki dengan segera, dengan sanksi yang sesuai diberlakukan untuk pelanggaran yang terbukti.</p>
                        <p>Kami menangani pengaduan dengan segera dan adil untuk menciptakan lingkungan kerja yang transparan dan mendukung. Kami telah menetapkan prosedur yang jelas untuk mengajukan pengaduan, melakukan investigasi, dan memberikan pedoman penyelesaian. Kami percaya bahwa mekanisme pengaduan yang efektif membantu kami mengidentifikasi dan menyelesaikan masalah, meningkatkan kepuasan karyawan, dan memastikan kepatuhan terhadap standar hukum dan etika.</p>',
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/grievance_mechanism.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 3,
            ],
            [
                'name' => 'Governance 4',
                'category' => 'governance',
                'type' => 'grid',
                'grid_type' => 'box_icon_card',
                'title_en' => 'Sustainable Procurement',
                'title_id' => 'Pengadaan Berkelanjutan',
                'content_en' => '<p>CDI places a strong emphasis on sustainable procurement by integrating ESG (Environmental, Social, and Governance) considerations into its supply chain processes.</p>',
                'content_id' => '<p>CDI menempatkan penekanan kuat pada pengadaan berkelanjutan dengan mengintegrasikan pertimbangan ESG (Lingkungan, Sosial, dan Tata Kelola) ke dalam proses rantai pasokannya.</p>',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_product_loading.svg'),
                        "title" => '',
                        "description" => '
                            <p>In terms of governance, we ensure equal treatment for all potential suppliers, regardless of their origin, and expects compliance with our Code of Conduct. The procurement process involves the Contracts and Procurement Department working in conjunction with the Contracts Committee, overseen by the Board of Directors. Prospective suppliers undergo a pre-qualification stage before participating in the tender process, with evaluations based on various criteria like legal suitability, quality control systems, and adherence to safety regulations.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_health.svg'),
                        "title" => '',
                        "description" => '
                            <p>Additionally, Chandra Daya Investasi maintains a Contractor Safety, Health, and Environment Plan to prioritize operational safety for workers and mitigate environmental impacts. We require our work partners to abide by environmental regulations and uphold safety standards, demonstrating a commitment to human rights and workplace justice in all business partnerships.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_product_loading.svg'),
                        "title" => '',
                        "description" => '
                            <p>Dalam hal tata kelola, kami memastikan perlakuan yang sama untuk semua calon pemasok, terlepas dari asal mereka, dan mengharapkan kepatuhan terhadap Kode Etik kami. Proses pengadaan melibatkan Departemen Kontrak dan Pengadaan yang bekerja sama dengan Komite Kontrak, yang diawasi oleh Dewan Direksi. Calon pemasok menjalani tahap pra-kualifikasi sebelum berpartisipasi dalam proses tender, dengan evaluasi berdasarkan berbagai kriteria seperti kesesuaian hukum, sistem kendali mutu, dan kepatuhan terhadap peraturan keselamatan.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_health.svg'),
                        "title" => '',
                        "description" => '
                            <p>Selain itu, Chandra Daya Investasi juga memiliki Rencana Keselamatan, Kesehatan, dan Lingkungan Kontraktor untuk memprioritaskan keselamatan operasional bagi pekerja dan mengurangi dampak lingkungan. Kami mewajibkan mitra kerja kami untuk mematuhi peraturan lingkungan dan menegakkan standar keselamatan, yang menunjukkan komitmen terhadap hak asasi manusia dan keadilan di tempat kerja dalam semua kemitraan bisnis.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'darkest',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 4,
            ],
            [
                'name' => 'Governance 5',
                'category' => 'governance',
                'type' => 'grid',
                'grid_type' => 'box_icon_card',
                'title_en' => 'Cyber Security',
                'title_id' => 'Keamanan Siber',
                'content_en' => '<p>Chandra Daya Investasi prioritizes information security within its governance framework, recognizing the critical importance of information and IT systems as essential business assets. We emphasize the availability, integrity, and confidentiality of information to ensure our competitive edge, profitability, legal compliance, and reputation.</p>',
                'content_id' => '<p>Chandra Daya Investasi mengutamakan keamanan informasi dalam kerangka tata kelolanya, dengan menyadari pentingnya informasi dan sistem TI sebagai aset bisnis yang penting. Kami menekankan ketersediaan, integritas, dan kerahasiaan informasi untuk memastikan keunggulan kompetitif, profitabilitas, kepatuhan hukum, dan reputasi kami.</p>',
                'content_json_en' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_security_password.svg'),
                        "title" => 'Policy Management',
                        "description" => '
                            <p>We have implemented IT policies and a User Access and Security Policy to ensure business continuity, minimize the impact of security incidents as well as to protect the privacy of personal information.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_computer_protection.svg'),
                        "title" => 'Security Operation System Initiatives',
                        "description" => '
                            <p>A key initiative to enhance cybersecurity is the establishment of a Security Operations Center. This center proactively monitors the IT infrastructure, allowing for the timely detection of cybersecurity alerts and incidents.</p>
                        '
                    ]
                ],
                'content_json_id' => [
                    [
                        "icon" => asset('assets/frontend/icons/ic_security_password.svg'),
                        "title" => 'Manajemen Kebijakan',
                        "description" => '
                            <p>Kami telah menerapkan kebijakan TI dan Kebijakan Akses Pengguna dan Keamanan untuk memastikan kelangsungan bisnis, meminimalkan dampak insiden keamanan, serta melindungi privasi informasi pribadi.</p>
                        '
                    ],
                    [
                        "icon" => asset('assets/frontend/icons/ic_computer_protection.svg'),
                        "title" => 'Inisiatif Sistem Operasi Keamanan',
                        "description" => '
                            <p>Salah satu inisiatif utama untuk meningkatkan keamanan siber adalah pembentukan Pusat Operasi Keamanan. Pusat ini secara proaktif memantau infrastruktur TI, sehingga memungkinkan deteksi dini terhadap peringatan dan insiden keamanan siber.</p>
                        '
                    ]
                ],
                'align' => 'left',
                'image' => asset('assets/frontend/images/sustainability/sustainable_procurement_background.webp'),
                'file_information' => null,
                'background' => 'darkest',
                'grid_direction' => 'col',
                'grid_pattern' => 'normal',
                'sort' => 5
            ],
            [
                'name' => 'Governance 6',
                'category' => 'governance',
                'type' => 'swiper',
                'grid_type' => '',
                'title_en' => 'Three fundamental components of information security management',
                'title_id' => 'Tiga komponen fundamental manajemen keamanan informasi',
                'content_en' => '',
                'content_id' => '',
                'content_json_en' => [
                    [
                        "number" => 1,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_confidentiality.webp'),
                        "title" => 'Confidentiality',
                        "description" => '<p>Safeguarding sensitive information from unauthorized access or disclosure.</p>'
                    ],
                    [
                        "number" => 2,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_integrity.webp'),
                        "title" => 'Integrity',
                        "description" => '<p>Ensuring the accuracy and completeness of information and software.</p>'
                    ],
                    [
                        "number" => 3,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_availability.webp'),
                        "title" => 'Availability',
                        "description" => '<p>Making certain that critical information and services are accessible to users only when required.</p>'
                    ],
                    [
                        "number" => 4,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_4.webp'),
                        "title" => 'Accountability',
                        "description" => '<p>Ensuring that actions and changes in the system can be traced back to responsible entities, preventing denial of responsibility</p>'
                    ]
                ],
                'content_json_id' => [
                    [
                        "number" => 1,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_confidentiality.webp'),
                        "title" => 'Kerahasiaan',
                        "description" => '<p>Melindungi informasi sensitif dari akses atau pengungkapan yang tidak sah.</p>'
                    ],
                    [
                        "number" => 2,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_integrity.webp'),
                        "title" => 'Integritas',
                        "description" => '<p>Memastikan keakuratan dan kelengkapan informasi dan perangkat lunak.</p>'
                    ],
                    [
                        "number" => 3,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_security_availability.webp'),
                        "title" => 'Tersedianya',
                        "description" => '<p>Memastikan bahwa informasi dan layanan penting dapat diakses oleh pengguna hanya saat diperlukan.</p>'
                    ],
                    [
                        "number" => 4,
                        "icon" => asset('assets/frontend/images/sustainability/three_fundamental_4.webp'),
                        "title" => 'Akuntabilitas',
                        "description" => '<p>Memastikan bahwa tindakan dan perubahan dalam sistem dapat ditelusuri kembali ke entitas yang bertanggung jawab, mencegah penyangkalan tanggung jawab</p>'
                    ]
                ],
                'align' => 'left',
                'image' => '',
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 6
            ],
            [
                'name' => 'Governance 7',
                'category' => 'governance',
                'type' => 'content',
                'grid_type' => '',
                'title_en' => 'Governance Performance',
                'title_id' => 'Kinerja Tata Kelola',
                'content_en' => '<p>In terms of governance, our performance is guided by our Code of Conduct and includes thorough supply chain assessments to ensure ethical practices across our operations.</p>
                        <p>We are committed to maintaining high governance standards by regularly evaluating compliance with our ethical guidelines, which enhances transparency and accountability while mitigating risks.</p>',
                'content_id' => '<p>Dalam hal tata kelola, kinerja kami dipandu oleh Kode Etik kami dan mencakup penilaian rantai pasokan yang menyeluruh untuk memastikan praktik etis di seluruh operasi kami.</p>
                        <p>Kami berkomitmen untuk mempertahankan standar tata kelola yang tinggi dengan mengevaluasi kepatuhan terhadap pedoman etika kami secara berkala, yang meningkatkan transparansi dan akuntabilitas sekaligus mengurangi risiko.</p>',
                'content_json_en' => [],
                'content_json_id' => [],
                'align' => 'right',
                'image' => asset('assets/frontend/images/sustainability/governance_performance.webp'),
                'file_information' => null,
                'background' => 'normal',
                'grid_direction' => 'row',
                'grid_pattern' => 'normal',
                'sort' => 7
            ]
        ];

        foreach ($data as $key => $value) {
            $imageFields = ['image'];

            foreach ($imageFields as $field) {
                if (!empty($value[$field])) {
                    $value[$field] = Helper::handleMoveImage($value[$field], 'sustainability/contents');
                }
            }

            foreach ($value['content_json_en'] as $index => $item) {

                $imageFields = ['image'];

                foreach ($imageFields as $field) {
                    if (!empty($item[$field])) {
                        $item[$field] = Helper::handleMoveImage($item[$field], 'sustainability/contents');
                    }
                }
            }

            foreach ($value['content_json_id'] as $index => $item) {

                $imageFields = ['image'];

                foreach ($imageFields as $field) {
                    if (!empty($item[$field])) {
                        $item[$field] = Helper::handleMoveImage($item[$field], 'sustainability/contents');
                    }
                }
            }

            // Simpan ke database
            SustainabilityContent::create($value);
            sleep(.2);
        }
    }
}
