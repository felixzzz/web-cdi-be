<?php

namespace Database\Seeders;

use App\Enums\PreferenceKey;
use App\Helpers\Helper;
use App\Helpers\Optimize;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Utility\Preference;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [
            'file' => '',
            'title_en' => '',
            'title_id' => '',
            'content_en' => '',
            'content_id' => '',
        ];

        [
            'lang_en' => '',
            'lang_id' => '',
            'sub_lang_en' => '',
            'sub_lang_id' => ''
        ];

        $tableCorporate = [
            'headers' => [
                ['lang_en' => 'Name of Companies', 'lang_id' => 'Nama Perusahaan'],
                ['lang_en' => 'Ownership (%)', 'lang_id' => 'Kepemilikan (%)'],
                ['lang_en' => 'Line of Business', 'lang_id' => 'Bidang Usaha'],
                ['lang_en' => 'Status', 'lang_id' => 'Status'],
                ['lang_en' => 'Domicile', 'lang_id' => 'Domisili']
            ],
            'tableData' => [
                [['lang_en' => 'Chandra Asri Trading Company Pte. Ltd. (CATCO)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '100', 'lang_id' => '', 'sub_lang_en' => 'Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Petrochemical Products and Naphtha Trade', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Singapore', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'Chandra Asri Capital Pte. Ltd. (CAC)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '100', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Investment Company', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Singapore', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Synthetic Rubber Indonesia (SRI)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '45', 'lang_id' => '', 'sub_lang_en' => 'Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Artificial Rubber Manufacture', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Cilegon', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Chandra Daya Investasi (CDI)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '70', 'lang_id' => '', 'sub_lang_en' => 'Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Consultancy Management Activities', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Krakatau Chandra Energi (KCE)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '70', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Electricity Industry and Electricity Services', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Cilegon', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Krakatau Sarana Energi (KSE)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '68.07', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Wholesale & Retail Trade, Real Estate, Electricity Support Activities', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Cilegon', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Krakatau Posco Energy (KPE)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '45', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Electrical Generation', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Cilegon', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Krakatau Tirta Industri (KTI)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '49', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Water Management Industry', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Cilegon', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Redeco Petrolin Utama (RPU)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '50.75', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Wholesale Trade of Chemical Products & Warehousing', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Chandra Samudera Port (CSP)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '99.99', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Holding & Consultancy Management Activities', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Chandra Shipping International (CSI)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '49', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Sea Transportation', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Marina Indah Maritim (MIM)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '49', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Sea Transportation', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Operating', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Chandra Asri Perkasa (CAP2)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '99.99', 'lang_id' => '', 'sub_lang_en' => 'Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Chemical Manufacture and Wholesale Trade', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Development', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']],
                [['lang_en' => 'PT Chandra Asri Alkali (CAA)', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => '99.99', 'lang_id' => '', 'sub_lang_en' => 'Non-Direct Ownership', 'sub_lang_id' => ''], ['lang_en' => 'Chemical Manufacture, Wholesale Trade, and Consultancy Management Activities', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Development', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => ''], ['lang_en' => 'Jakarta', 'lang_id' => '', 'sub_lang_en' => '', 'sub_lang_id' => '']]
            ]
        ];

        $data = [
            'home_banner' => [
                'file' => asset('assets/frontend/videos/homepage.mp4'),
                'title_en' => 'Sustainable Infrastructure for a Better Tomorrow',
                'title_id' => 'Infrastruktur Berkelanjutan untuk Masa Depan yang Lebih Baik',
                'content_en' => '<p>We invest in projects that deliver long-term value for communities and the environment</p>',
                'content_id' => '<p>Kami berinvestasi dalam proyek yang memberikan nilai jangka panjang bagi masyarakat dan lingkungan</p>',
            ],
            'home_about_section' => [
                'file' => asset('assets/frontend/images/homepage/expanding_business.webp'),
                'title_en' => 'Expanding Business Horizons In Infrastructure Development',
                'title_id' => 'Memperluas Cakrawala Bisnis dalam Pengembangan Infrastruktur',
                'content_en' => '
                    <p>Recognize significant opportunity to develop infrastructure business in Cilegon, where the demand for robust infrastructure is rapidly growing.  Leveraging Cilegon’s strategic position as an industrial hub, CDI is poised to expand its influence and contribute to the region’s development.</p>
                    <p>CDI’s asset are secured by long-term contracts with reputable stable cash flow and a high pass-through capability. This provides company with enhanced margin-generation potential, positioning CDI for long-term success in the infrastructure sector. With diversified portfolio spanning industrial water, energy, port and storage services, and logistics, CDI is building a strong presence in key infrastructure. </p>
                ',
                'content_id' => '
                    <p>Melihat peluang signifikan untuk mengembangkan bisnis infrastruktur di Cilegon, di mana permintaan akan infrastruktur yang tangguh tengah berkembang pesat. Dengan memanfaatkan posisi strategis Cilegon sebagai pusat industri, CDI siap memperluas pengaruhnya dan berkontribusi terhadap pembangunan kawasan tersebut.</p>
                    <p>Aset CDI dijamin oleh kontrak jangka panjang dengan arus kas stabil yang bereputasi baik dan kemampuan pass-through yang tinggi. Hal ini memberi perusahaan potensi peningkatan perolehan margin, memposisikan CDI untuk meraih kesuksesan jangka panjang di sektor infrastruktur. Dengan portofolio yang beragam yang mencakup layanan air industri, energi, pelabuhan dan penyimpanan, serta logistik, CDI membangun kehadiran yang kuat di infrastruktur utama.</p>
                ',
            ],
            'home_infrastructure_title' => [
                'file' => '',
                'title_en' => 'Infrastructure Solutions for Efficient Industrial Growth',
                'title_id' => 'Solusi Infrastruktur untuk Pertumbuhan Industri yang Efisien',
                'content_en' => '',
                'content_id' => '',
            ],
            'home_infrastructure_energy' => [
                'file' => asset('assets/frontend/images/homepage/energy.webp'),
                'title_en' => 'Energy',
                'title_id' => 'Energi',
                'content_en' => '<p>Our energy business and operations are managed by CDI and run by PT. Krakatau Chandra Energi (KCE)</p>',
                'content_id' => '<p>Bisnis dan operasi energi kami dikelola oleh CDI dan dijalankan oleh PT. Krakatau Chandra Energi (KCE)</p>',
            ],
            'home_infrastructure_water' => [
                'file' => asset('assets/frontend/images/homepage/water.webp'),
                'title_en' => 'Water',
                'title_id' => 'Air',
                'content_en' => '<p>We have a 49% stake acquired from PT Krakatau Sarana Infrastruktur who handled our water business</p>',
                'content_id' => '<p>Kami memiliki saham sebesar 49% yang diakuisisi dari PT Krakatau Sarana Infrastruktur yang menangani bisnis air kami</p>',
            ],
            'home_infrastructure_port_storage' => [
                'file' => asset('assets/frontend/images/homepage/ports_storage.webp'),
                'title_en' => 'Ports & Storage',
                'title_id' => 'Pelabuhan & Penyimpanan',
                'content_en' => '<p>Provides ports and tank services business for refined chemical and petroleum products</p>',
                'content_id' => '<p>Menyediakan layanan pelabuhan dan tangki untuk produk kimia dan minyak bumi olahan</p>',
            ],
            'home_infrastructure_logistic' => [
                'file' => asset('assets/frontend/images/homepage/logistics.webp'),
                'title_en' => 'Logistics',
                'title_id' => 'Logistik',
                'content_en' => '<p>CDI pioneers in shipping and warehousing, serving company needs and future customers</p>',
                'content_id' => '<p>CDI merupakan pelopor dalam pengiriman dan pergudangan, melayani kebutuhan perusahaan dan pelanggan masa depan</p>',
            ],
            'home_discover_title' => [
                'file' => '',
                'title_en' => 'Discover the Latest Thing',
                'title_id' => 'Temukan Hal Terbaru',
                'content_en' => '',
                'content_id' => '',
            ],
            'home_discover_sustainability' => [
                'file' => asset('assets/frontend/images/homepage/discover_sustainability.webp'),
                'title_en' => 'Sustainability',
                'title_id' => 'Keberlanjutan',
                'content_en' => '<p>Long-term sustainability initiatives to achieve climate resilience and enhance societal well-being</p>',
                'content_id' => '<p>Inisiatif keberlanjutan jangka panjang untuk mencapai ketahanan iklim dan meningkatkan kesejahteraan masyarakat</p>',
            ],
            'home_discover_our_business' => [
                'file' => asset('assets/frontend/images/homepage/discover_our_business.webp'),
                'title_en' => 'Our Business',
                'title_id' => 'Bisnis kami',
                'content_en' => '<p>Essential chemicals and infrastructure solutions to support key sectors across Indonesia.</p>',
                'content_id' => '<p>Bahan kimia penting dan solusi infrastruktur untuk mendukung sektor utama di seluruh Indonesia.</p>',
            ],
            'home_discover_investor' => [
                'file' => asset('assets/frontend/images/homepage/discover_investors.webp'),
                'title_en' => 'Investors',
                'title_id' => 'Investor',
                'content_en' => '<p>Timely, reliable, and relevant investment information for institutional and individual investors.</p>',
                'content_id' => '<p>Informasi investasi yang tepat waktu, dapat diandalkan, dan relevan bagi investor institusional dan individu.</p>',
            ],
            'home_discover_career' => [
                'file' => asset('assets/frontend/images/homepage/discover_careers.webp'),
                'title_en' => 'Careers',
                'title_id' => 'Karir',
                'content_en' => '<p>Discover your purpose and make an impact as you grow what truly matters in your career.</p>',
                'content_id' => '<p>Temukan tujuan Anda dan buatlah dampak saat Anda mengembangkan apa yang benar-benar penting dalam karier Anda.</p>',
            ],
            'home_journey_tagline' => [
                'file' => '',
                'title_en' => 'Journey',
                'title_id' => 'Perjalanan',
                'content_en' => '',
                'content_id' => '',
            ],
            'home_journey_content' => [
                'file' => asset('assets/frontend/images/homepage/journey.png'),
                'title_en' => 'Expanding Infrastructure, Powering Progress',
                'title_id' => 'Memperluas Infrastruktur, Mendorong Kemajuan',
                'content_en' => '<p>Chandra Asri Group, through its subsidiary CDI, is driving infrastructure development in Cilegon, a rapidly growing industrial hub. With a diversified portfolio in industrial water, energy, port & storage services, and logistics, CDI is strategically positioned for long-term success. Supported by stable cash flows from long-term contracts with reputable partners, CDI ensures sustainable growth and enhanced margins.</p>',
                'content_id' => '<p>Chandra Asri Group, melalui anak perusahaannya CDI, tengah mendorong pembangunan infrastruktur di Cilegon, pusat industri yang berkembang pesat. Dengan portofolio yang beragam dalam bidang air industri, energi, layanan pelabuhan & penyimpanan, dan logistik, CDI diposisikan secara strategis untuk meraih kesuksesan jangka panjang. Didukung oleh arus kas yang stabil dari kontrak jangka panjang dengan mitra yang memiliki reputasi baik, CDI memastikan pertumbuhan yang berkelanjutan dan peningkatan margin.</p>',
            ],
            'home_journey_info_1' => [
                'file' => '',
                'title_en' => '$194M',
                'title_id' => '$194M',
                'content_en' => '<p>EGCO Group acquired a 30% stake in CDI, fueling expansion and innovation.</p>',
                'content_id' => '<p>EGCO Group mengakuisisi 30% saham di CDI, mendorong ekspansi dan inovasi.</p>',
            ],
            'home_journey_info_2' => [
                'file' => '',
                'title_en' => '$200M',
                'title_id' => '$200M',
                'content_en' => '<p>Investment in Krakatau Posco Energy strengthens CDI’s presence in the power sector.</p>',
                'content_id' => '<p>Investasi di Krakatau Posco Energy memperkuat kehadiran CDI di sektor kelistrikan.</p>',
            ],
            'home_journey_info_3' => [
                'file' => '',
                'title_en' => '95 kWp',
                'title_id' => '95 kWp',
                'content_en' => '<p>Solar panel plant installed to drive sustainable operations</p>',
                'content_id' => '<p>Pemasangan panel surya untuk mendorong operasi berkelanjutan</p>',
            ],
            'about_us_banner' => [
                'file' => asset('assets/frontend/images/about/about_us_hero_image.webp'),
                'title_en' => 'Management and Organization Structure',
                'title_id' => 'Struktur Manajemen dan Organisasi',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_company_overview_tagline' => [
                'file' => asset('assets/frontend/logo_cdi_footer.svg'),
                'title_en' => '#Your Growth Partner',
                'title_id' => '#Mitra Pertumbuhan Anda',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_company_overview' => [
                'file' => asset('assets/frontend/images/about/company_overview.webp'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '
                    <p><b>PT Chandra Daya Investasi (CDI)</b> is an infrastructure investment arm of <b>Chandra Asri Group</b>, a leading provider of energy chemicals and infrastructure solutions in Southeast Asia and ECGO, a holding company which focuses on power business investment in Thailand. CDI operates primarily in the infrastructure sector, concentrating on providing solutions that support industrial growth throughout Southeast Asia.</p>
                    <p>CDI’s diverse operations span several interconnected businesses pillars, including water supply and treatment, energy, port & storage, and logistics. CDI is committed to contributing the development and fulfillment of critical infrastructure needs, driving sustainable economic growth in the region.</p>
                    <p>As a forward-thinking company, CDI continues to work towards becoming a leader in the infrastructure sector in both Indonesia and Southeast Asia.  Innovation, efficiency, and sustainability are at the core of  all its business pillars.</p>
                    <p>CDI has formed strategic partnerships with reputable domestic and global leaders, such as Krakatau Steel Group, Salim Group and Posco, adding value and expertise to its operations and strengthening its market position</p>
                ',
                'content_id' => '
                    <p><b>PT Chandra Daya Investasi (CDI)</b> merupakan bagian dari investasi infrastruktur <b>Chandra Asri Group</b>, penyedia bahan kimia energi dan solusi infrastruktur terkemuka di Asia Tenggara dan ECGO, perusahaan induk yang berfokus pada investasi bisnis ketenagalistrikan di Thailand. CDI beroperasi terutama di sektor infrastruktur, dengan fokus pada penyediaan solusi yang mendukung pertumbuhan industri di seluruh Asia Tenggara.</p>
                    <p>Beragam operasi CDI mencakup beberapa pilar bisnis yang saling terkait, termasuk penyediaan dan pengolahan air, energi, pelabuhan & penyimpanan, dan logistik. CDI berkomitmen untuk berkontribusi dalam pengembangan dan pemenuhan kebutuhan infrastruktur penting, yang mendorong pertumbuhan ekonomi berkelanjutan di kawasan tersebut.</p>
                    <p>Sebagai perusahaan yang berpikiran maju, CDI terus berupaya untuk menjadi pemimpin di sektor infrastruktur baik di Indonesia maupun Asia Tenggara. Inovasi, efisiensi, dan keberlanjutan merupakan inti dari semua pilar bisnisnya.</p>
                    <p>CDI telah membentuk kemitraan strategis dengan para pemimpin domestik dan global yang memiliki reputasi baik, seperti Krakatau Steel Group, Salim Group, dan Posco, yang menambah nilai dan keahlian pada operasinya serta memperkuat posisi pasarnya.</p>
                ',
            ],
            'about_us_company_overview_background' => [
                'file' => asset('assets/frontend/images/about/company_overview_background.webp'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_vision_mission_tagline' => [
                'file' => '',
                'title_en' => 'The Heart of Our Journey',
                'title_id' => 'Inti Perjalanan Kita',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_vision' => [
                'file' => asset('assets/frontend/icons/icon_vision.svg'),
                'title_en' => 'Our Vision',
                'title_id' => 'Visi Kami',
                'content_en' => 'Southeast Asia’s preferred infrastructure solutions company',
                'content_id' => 'Perusahaan solusi infrastruktur pilihan di Asia Tenggara',
            ],
            'about_us_mission' => [
                'file' => asset('assets/frontend/icons/icon_mission.svg'),
                'title_en' => 'Our Mission',
                'title_id' => 'Misi Kami',
                'content_en' => 'Create Value through partnerships and maximize the company’s asset to pursue growth opportunities for a sustainable future ',
                'content_id' => 'Menciptakan Nilai melalui kemitraan dan memaksimalkan aset perusahaan untuk mengejar peluang pertumbuhan demi masa depan yang berkelanjutan',
            ],
            'about_us_milestone' => [
                'file' => asset('assets/frontend/images/about/milestone_background.webp'),
                'title_en' => 'From Then to Now',
                'title_id' => 'Dari Dulu hingga Sekarang',
                'content_en' => '<p>Explore Chandra Daya Investasi key milestones over the years.</p>',
                'content_id' => '<p>Jelajahi pencapaian penting Chandra Daya Investasi selama bertahun-tahun.</p>',
            ],
            'about_us_company_profile' => [
                'file' => '',
                'title_en' => 'Curious to learn more about Chandra Daya Investasi?',
                'title_id' => 'Penasaran untuk mempelajari lebih lanjut tentang Chandra Daya Investasi?',
                'content_en' => '<p>Gain deeper insights into our story, growth, and latest achievements by downloading our company profile</p>',
                'content_id' => '<p>Dapatkan wawasan lebih dalam tentang cerita, pertumbuhan, dan pencapaian terbaru kami dengan mengunduh profil perusahaan kami</p>',
            ],
            'about_us_management_banner' => [
                'file' => asset('assets/frontend/images/about/management_hero_image.webp'),
                'title_en' => 'Management and Organization Structure',
                'title_id' => 'Struktur Manajemen dan Organisasi',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_management_overview' => [
                'file' => '',
                'title_en' => 'The People Behind Our Success',
                'title_id' => 'Orang-Orang di Balik Kesuksesan Kami',
                'content_en' => '<p>Chandra Daya Investasi leadership team made up of seasoned professionals from diverse backgrounds, brings extensive expertise to guide strategic corporate actions and foster innovation. Meanwhile, our well-defined management structure is crucial ensuring effective decision-making, clear lines of accountability, and the efficient execution of strategic initiatives. All of these drive our overall growth.</p>',
                'content_id' => '<p>Tim pimpinan Chandra Daya Investasi yang terdiri dari para profesional berpengalaman dari berbagai latar belakang, membawa keahlian yang luas untuk memandu berbagai tindakan korporat yang strategis dan mendorong inovasi. Sementara itu, struktur manajemen kami yang terdefinisi dengan baik sangat penting untuk memastikan pengambilan keputusan yang efektif, garis pertanggungjawaban yang jelas, dan pelaksanaan inisiatif strategis yang efisien. Semua ini mendorong pertumbuhan kami secara keseluruhan.</p>',
            ],
            'about_us_organization_structure' => [
                'file' => asset('assets/frontend/images/about/organization_structure.webp'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_corporate_structure' => [
                'file' => asset('assets/frontend/images/about/company_structure.jpg'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_corporate_structure_table' => [
                'file' => '',
                'title_en' => 'List of Subsidiaries & Associate Companies',
                'title_id' => 'Daftar Anak Perusahaan & Perusahaan Asosiasi',
                'content_en' => '',
                'content_id' => '',
                'content_table' => $tableCorporate
            ],
            'about_us_guideline' => [
                'file' => '',
                'title_en' => 'Good Corporate Governance',
                'title_id' => 'Tata Kelola Perusahaan yang Baik',
                'content_en' => '<p>Review the Guidelines of Work for the Board of Directors and Board of Commissioners.</p>',
                'content_id' => '<p>Menelaah Pedoman Kerja Direksi dan Dewan Komisaris.</p>',
            ],
            'about_us_award_banner' => [
                'file' => asset('assets/frontend/images/about/awards_hero_image.webp'),
                'title_en' => 'Awards & Certification',
                'title_id' => 'Penghargaan & Sertifikasi',
                'content_en' => '',
                'content_id' => '',
            ],
            'about_us_award_overview' => [
                'file' => '',
                'title_en' => 'We are proud to be recognized for our commitment',
                'title_id' => 'Kami bangga diakui atas komitmen kami',
                'content_en' => "<p>PT Chandra Daya Investasi Tbk (CDI) has been honored with some of Indonesia's and the reqion's most prestigious awards, recognizing our achievements in product quality, commitment to operational excellence, financial resilience and sustainability.</p>",
                'content_id' => "<p>PT Chandra Daya Investasi Tbk (CDI) telah mendapatkan beberapa penghargaan paling bergengsi di Indonesia dan kawasan ini, yang mengakui pencapaian kami dalam kualitas produk, komitmen terhadap keunggulan operasional, ketahanan keuangan, dan keberlanjutan.</p>",
            ],
            'investor_report_banner' => [
                'file' => asset('assets/frontend/images/investor/investor_report_hero_image.webp'),
                'title_en' => 'Tap into Sustainable Growth',
                'title_id' => 'Memanfaatkan Pertumbuhan Berkelanjutan',
                'content_en' => '<p>Chandra Daya Investasi is a prime investment choice for institutional and retail investors looking to tap into Indonesia’s long-term growth potential</p>',
                'content_id' => '<p>Chandra Daya Investasi merupakan pilihan investasi utama bagi investor institusional dan ritel yang ingin memanfaatkan potensi pertumbuhan jangka panjang Indonesia</p>',
            ],
            'investor_report_overview' => [
                'file' => asset('assets/frontend/images/investor/investor_report_section.webp'),
                'title_en' => 'Transparency, Stability, and a Commitment to Shareholder Value Guide Our Financial Journey',
                'title_id' => 'Transparansi, Stabilitas, dan Komitmen terhadap Nilai Pemegang Saham Memandu Perjalanan Keuangan Kami',
                'content_en' => '<p>Transparency, stability, and a dedication to creating shareholder value are at the forefront of our financial journey. With a proven record of performance and financial achievements, our commitment to excellence and prudent financial management serves as a benchmark for value creation that consistently delivers optimal results.</p>',
                'content_id' => '<p>Transparansi, stabilitas, dan dedikasi untuk menciptakan nilai bagi pemegang saham merupakan hal terpenting dalam perjalanan finansial kami. Dengan catatan kinerja dan pencapaian finansial yang terbukti, komitmen kami terhadap keunggulan dan pengelolaan finansial yang bijaksana menjadi tolok ukur penciptaan nilai yang secara konsisten memberikan hasil optimal.</p>',
            ],
            'investor_report_table' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'investor_financial_banner' => [
                'file' => asset('assets/frontend/images/investor/investor_financial_information_hero_image.webp'),
                'title_en' => 'Financial Information for Investors',
                'title_id' => 'Informasi Keuangan untuk Investor',
                'content_en' => '',
                'content_id' => '',
            ],
            'investor_share_banner' => [
                'file' => asset('assets/frontend/images/investor/investor_shares_information_hero_image.webp'),
                'title_en' => 'Stocks and Bonds',
                'title_id' => 'Saham dan Obligasi',
                'content_en' => '',
                'content_id' => '',
            ],
            'investor_share_shareholders_table' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'investor_share_dividend_table' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'investor_publication_banner' => [
                'file' => asset('assets/frontend/images/investor/investor_publication_for_investors_hero_image.webp'),
                'title_en' => 'Publications for Investors',
                'title_id' => 'Publikasi untuk Investor',
                'content_en' => '',
                'content_id' => '',
            ],
            'governance_banner' => [
                'file' => asset('assets/frontend/images/governance/governance_hero_image.webp'),
                'title_en' => 'Governance',
                'title_id' => 'Tata Kelola',
                'content_en' => '',
                'content_id' => '',
            ],
            'governance_corporate_secretary_team' => [
                'file' => asset('assets/frontend/images/governance/corporate_secretary_jaka.webp'),
                'title_en' => 'Jaka Dibya Ananta Satari',
                'title_id' => 'Jaka Dibya Ananta Satari',
                'content_en' => 'Corporate Secretary',
                'content_id' => 'Sekretaris Perusahaan',
            ],
            'governance_corporate_secretary' => [
                'file' => '',
                'title_en' => 'Corporate Secretary',
                'title_id' => 'Sekretaris Perusahaan',
                'content_en' => '
                    <p>In order to improve transparency, service, and communication to the stakeholders as the implementation of good corporate governance principles, Chandra Asri Group appointed a Corporate Secretary who is responsible directly to the Board of Directors.</p>
                    <p>Corporate Secretary plays an important role in maintaining relationships with all stakeholders in order to communicate Chandra Asri Group’s activities well, especially regarding the disclosure of information. This is in accordance with the provisions set out in the Financial Services Authority Regulation No. 35/ POJK.04 /2014 concerning Corporate Secretary of Issuer or Public Company.</p>
                    <p>Duties and responsibilities of Corporate Secretary are as follows:</p>
                    <ol class="list-decimal">

                        <li>Manage information related to the business environment and conduct correspondence with interested party in the capital markets, including the Financial Services Authority (OJK) and Indonesia Stock Exchange (IDX).</li>
                        <li>Ensure the Company implements GCG principles and comply with applicable laws and regulations on the stock exchange and capital markets, including the Law of Limited Liability Company.</li>
                        <li>Organize GMS, Meeting of the Board of Directors and Board of Commissioners, and Board of Directors Meeting.</li>
                        <li>Organize communication activity between Management with stakeholders in order to build the image of the Company.</li>
                        <li>Organize secretarial activities of Chandra Asri Group’s Management as well as facilitating the relationship of the Company/Management with stakeholders.</li>
                    </ol>
                ',
                'content_id' => '
                    <p>Dalam rangka meningkatkan transparansi, pelayanan, dan komunikasi kepada para pemangku kepentingan sebagai penerapan prinsip-prinsip tata kelola perusahaan yang baik, Chandra Asri Group menunjuk Sekretaris Perusahaan yang bertanggung jawab langsung kepada Direksi.</p>
                    <p>Sekretaris Perusahaan berperan penting dalam menjaga hubungan dengan seluruh pemangku kepentingan untuk mengkomunikasikan kegiatan Chandra Asri Group dengan baik, terutama mengenai keterbukaan informasi. Hal ini sesuai dengan ketentuan yang diatur dalam Peraturan Otoritas Jasa Keuangan No. 35/POJK.04/2014 tentang Sekretaris Perusahaan Emiten atau Perusahaan Publik.</p>
                    <p>Tugas dan tanggung jawab Sekretaris Perusahaan adalah sebagai berikut:</p>
                    <ol class="list-decimal">
                        <li>Mengelola informasi yang berkaitan dengan lingkungan bisnis dan melakukan korespondensi dengan pihak-pihak yang berkepentingan dengan pasar modal, termasuk Otoritas Jasa Keuangan (OJK) dan Bursa Efek Indonesia (BEI).</li>
                        <li>Memastikan Perseroan menerapkan prinsip-prinsip GCG dan mematuhi peraturan perundang-undangan yang berlaku di bursa efek dan pasar modal, termasuk Undang-Undang Perseroan Terbatas.</li>
                        <li>Menyelenggarakan RUPS, Rapat Direksi dan Dewan Komisaris, dan Rapat Direksi.</li>
                        <li>Menyelenggarakan kegiatan komunikasi antara Manajemen dengan para pemangku kepentingan dalam rangka membangun citra Perusahaan.</li>
                        <li>Mengatur kegiatan kesekretariatan Manajemen Chandra Asri Group serta memfasilitasi hubungan Perusahaan/Manajemen dengan para pemangku kepentingan.</li>
                    </ol>
                ',
            ],
            'governance_internal_audit_unit' => [
                'file' => asset('assets/frontend/images/governance/internal_audit_unit_chart.webp'),
                'title_en' => 'Internal Audit Unit',
                'title_id' => 'Satuan Audit Internal',
                'content_en' => '
                    <p>Chandra Asri Group established an Internal Audit Unit to assist Management in preparing and managing a systematic and orderly approach in implementing its monitoring and evaluation duties on internal control, risk management and corporate governance.</p>
                    <p>Structure and position, duties, responsibilities, authority, as well as requirements and the Code of Conduct of Internal Auditor are set forth in the Internal Audit Charter. Internal Audit Charter was approved by the Decree of the Board of Directors as well as Board of Commissioner, and is used.</p>
                ',
                'content_id' => '
                    <p>Chandra Asri Group membentuk Unit Audit Internal untuk membantu Manajemen dalam mempersiapkan dan mengelola suatu pendekatan yang sistematis dan teratur dalam melaksanakan tugas pemantauan dan evaluasi atas pengendalian internal, manajemen risiko dan tata kelola perusahaan.</p>
                    <p>Struktur dan kedudukan, tugas, tanggung jawab, wewenang, serta persyaratan dan Kode Etik Auditor Internal diatur dalam Piagam Audit Internal. Piagam Audit Internal telah disahkan melalui Surat Keputusan Direksi dan Dewan Komisaris dan telah digunakan.</p>
                ',
            ],
            'governance_audit_committe' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '
                    <p>The Audit Committee was established by the Company through the Board of Commissioners Decree No. 013/LGL/BOC RES/VI/2021 to support the implementation of Good Corporate Governance. In performing its duties and responsibilities, the Audit Committee upholds the five principles of GCG and act professionally and independently for the benefit of the Company and its stakeholders.</p>
                    <p>The Audit Committee is responsible directly to the Board of Commissioners and in coordination with the Internal Audit Unit.</p>
                    <p>To support the role of Audit Committee, the Company has developed a guideline namely the Audit Committee Charter which includes:</p>

                    <ul class="list-decimal">
                        <li>Background.</li>
                        <li>Duties, responsibilities and authority.</li>
                        <li>Composition, structure, requirements of Audit Committee members.</li>
                        <li>Implementation and work procedure.</li>
                        <li>Audit Committee meeting.</li>
                        <li>Reporting.</li>
                        <li>Provision on the handling of complaints or reports on suspicion of violation relating to financial report.</li>
                        <li>Terms of service of the Audit Committee.</li>
                    </ul>
                ',
                'content_id' => '
                    <p>Komite Audit dibentuk oleh Perusahaan melalui Keputusan Dewan Komisaris No. 013/LGL/BOC RES/VI/2021 untuk mendukung penerapan Tata Kelola Perusahaan yang Baik (Good Corporate Governance/GCG). Dalam menjalankan tugas dan tanggung jawabnya, Komite Audit menjunjung tinggi lima prinsip GCG serta bertindak secara profesional dan independen demi kepentingan Perusahaan dan para pemangku kepentingan.</p> <p>Komite Audit bertanggung jawab langsung kepada Dewan Komisaris dan berkoordinasi dengan Unit Audit Internal.</p> <p>Untuk mendukung peran Komite Audit, Perusahaan telah menyusun pedoman yang disebut Piagam Komite Audit, yang mencakup:</p> <ul class="list-decimal"> <li>Latar belakang.</li> <li>Tugas, tanggung jawab, dan wewenang.</li> <li>Komposisi, struktur, serta persyaratan anggota Komite Audit.</li> <li>Pelaksanaan dan prosedur kerja.</li> <li>Rapat Komite Audit.</li> <li>Pelaporan.</li> <li>Ketentuan mengenai penanganan pengaduan atau laporan dugaan pelanggaran terkait laporan keuangan.</li> <li>Masa jabatan Komite Audit.</li> </ul>
                ',
            ],
            'governance_audit_committe_member_text' => [
                'file' => '',
                'title_en' => 'Composition of the Audit Committee Members',
                'title_id' => 'Komposisi Anggota Komite Audit',
                'content_en' => 'As from June 16th, 2021, composition of the Audit Committee Members consists of:',
                'content_id' => 'Per 16 Juni 2021, susunan Anggota Komite Audit adalah sebagai berikut:',
            ],
            'governance_sustainability_committe' => [
                'file' => asset('assets/frontend/images/governance/sustainability.webp'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'governance_risk_management' => [
                'file' => asset('assets/frontend/images/governance/risk_management.webp'),
                'title_en' => 'Risk Management',
                'title_id' => 'Manajemen Risiko',
                'content_en' => "<p>Chandra Asri Group has developed an integrated Risk Management System at the corporate level to identify and manage various risks that may affect business performance. This system is regularly updated as part of the Company's long-term strategy to mitigate risks across operational, production, and financial aspects. Chandra Asri Group identifies all risks and manages risk positions in accordance with the Company’s policy and risk appetite.</p>",
                'content_id' => "<p>Chandra Asri Group telah mengembangkan Sistem Manajemen Risiko terpadu di tingkat korporat untuk mengidentifikasi dan mengelola berbagai risiko yang dapat memengaruhi kinerja bisnis. Sistem ini diperbarui secara berkala sebagai bagian dari strategi jangka panjang Perusahaan untuk memitigasi risiko di seluruh aspek operasional, produksi, dan keuangan. Chandra Asri Group mengidentifikasi semua risiko dan mengelola posisi risiko sesuai dengan kebijakan dan selera risiko Perusahaan.</p>",
            ],
            'governance_code_of_conduct' => [
                'file' => '',
                'title_en' => 'Code of Conduct',
                'title_id' => 'Kode Etik',
                'content_en' => '
                    <p>Chandra Asri Group has a Code of Conduct (CoC) as guidance in act and the implementation of Good Corporate Governance. CoC is a written provisions that is used as reference in conducting business activities that must be understood and carried out every day. CoC also regulates corporate behaviour and individual behaviour related to compliance, health and safety, conflicts of interest management, compliance with laws, procurement, security of information and assets, and public information disclosure.</p>
                    <p>CoC applies to all employees and management (Board of Directors and Board of Commissioners) of Chandra Asri Group as well as its subsidiaries and every joint venture company within Chandra Asri Group’s control. It is expected that every Employee; and stakeholder, including but not limited to a business partner, a supplier or vendor, a customer, a contractor, an agent, a consultant and/or any other third party who works with, for or represent Chandra Asri Group must understand and follow this Code of Conduct.</p>
                    <p>Evaluation of CoC implementation is conducted periodically to ensure that all elements of the Company has been running the business rules based on the ethics and high standards that have been set. In addition, a review of CoC is conducted to determine whether it requires changes and/or adjustments of regulations in connection with the development of Chandra Asri Group’s business.</p>
                ',
                'content_id' => '
                    <p>Chandra Asri Group memiliki Kode Etik (Code of Conduct/CoC) sebagai panduan dalam bertindak dan menerapkan Tata Kelola Perusahaan yang Baik (Good Corporate Governance/GCG). CoC merupakan ketentuan tertulis yang digunakan sebagai acuan dalam menjalankan kegiatan bisnis yang harus dipahami dan diterapkan setiap hari. CoC juga mengatur perilaku perusahaan dan individu terkait kepatuhan, kesehatan dan keselamatan, manajemen konflik kepentingan, kepatuhan terhadap hukum, pengadaan, keamanan informasi dan aset, serta keterbukaan informasi publik.</p>
                    <p>CoC berlaku bagi seluruh karyawan dan manajemen (Dewan Direksi dan Dewan Komisaris) Chandra Asri Group serta anak perusahaannya dan setiap perusahaan joint venture yang berada dalam kendali Chandra Asri Group. Diharapkan setiap karyawan dan pemangku kepentingan, termasuk namun tidak terbatas pada mitra bisnis, pemasok atau vendor, pelanggan, kontraktor, agen, konsultan, dan/atau pihak ketiga lainnya yang bekerja dengan, untuk, atau mewakili Chandra Asri Group, memahami dan mematuhi Kode Etik ini.</p>
                    <p>Evaluasi terhadap penerapan CoC dilakukan secara berkala untuk memastikan bahwa seluruh elemen Perusahaan menjalankan aturan bisnis berdasarkan etika dan standar tinggi yang telah ditetapkan. Selain itu, peninjauan terhadap CoC dilakukan untuk menentukan apakah diperlukan perubahan dan/atau penyesuaian regulasi sehubungan dengan perkembangan bisnis Chandra Asri Group.</p>
                ',
            ],
            'governance_she_regulation' => [
                'file' => '',
                'title_en' => 'SHE Regulation',
                'title_id' => 'Peraturan SHE',
                'content_en' => '
                    <p>The below handbook has been developed to socialize SHE regulation information to all Chandra Asri Group and its subsidiaries employee, and contractor staffs who work in the CAP and its subsidiaries premises.</p>
                    <p>This regulation shall apply to all facilities and businesses of the Chandra Asri Group and its subsidiaries, and joint venture companies over which CAP has management control, regardless of type, size and product provided.</p>
                    <p>All Chandra Asri Group and its subsidiaries, and contractor staffs are expected to follow rules and regulation in the below strictly so that all activities can be executed smoothly and orderly, conflicts can be minimized and finally all of us can achieve target in all aspects of safety, schedule, quality and cost.</p>
                    <p>Please download the below rules and regulation (which divided into 4 (four)) download links, should you have any question or difficulties, please contact your superior or CAP staffs who are responsible for your activities.</p>
                ',
                'content_id' => '
                    <p>Buku panduan di bawah ini disusun untuk menyosialisasikan informasi mengenai peraturan SHE kepada seluruh karyawan Chandra Asri Group dan anak perusahaannya, serta staf kontraktor yang bekerja di lingkungan CAP dan anak perusahaannya.</p>
                    <p>Peraturan ini berlaku untuk semua fasilitas dan bisnis Chandra Asri Group serta anak perusahaannya, termasuk perusahaan joint venture yang berada di bawah kendali manajemen CAP, tanpa memandang jenis, ukuran, dan produk yang disediakan.</p>
                    <p>Seluruh karyawan Chandra Asri Group, anak perusahaannya, serta staf kontraktor diharapkan untuk mematuhi aturan dan peraturan di bawah ini secara ketat agar semua aktivitas dapat berjalan dengan lancar dan tertib, konflik dapat diminimalkan, dan pada akhirnya kita semua dapat mencapai target dalam semua aspek, termasuk keselamatan, jadwal, kualitas, dan biaya.</p>
                    <p>Silakan unduh aturan dan peraturan di bawah ini (yang terbagi dalam 4 (empat) tautan unduhan). Jika Anda memiliki pertanyaan atau mengalami kesulitan, silakan hubungi atasan Anda atau staf CAP yang bertanggung jawab atas aktivitas Anda.</p>
                ',
            ],
            'governance_policy' => [
                'file' => '',
                'title_en' => 'Policy',
                'title_id' => 'Kebijakan',
                'content_en' => '
                    <p>Chandra Asri Group is committed to implementing the Chandra Asri Code of Ethics, as well as upholding and complying with relevant provisions that apply both domestically and internationally. This policy is supported by good business practices and ethical corporate governance to fulfil our obligations to shareholders and stakeholders and must be followed to by all Chandra Asri Group employees</p>
                ',
                'content_id' => '
                    <p>Chandra Asri Group berkomitmen untuk melaksanakan Kode Etik Chandra Asri, serta menjunjung tinggi dan mematuhi ketentuan-ketentuan terkait yang berlaku baik di dalam negeri maupun di luar negeri. Kebijakan ini didukung oleh praktik bisnis yang baik dan tata kelola perusahaan yang etis untuk memenuhi kewajiban kepada pemegang saham dan pemangku kepentingan dan harus dipatuhi oleh seluruh karyawan Chandra Asri Group.</p>
                ',
            ],
            'governance_whistleblowing' => [
                'file' => asset('assets/frontend/images/governance/whistleblowing.webp'),
                'title_en' => 'Whistleblowing',
                'title_id' => 'Pengungkapan Pelanggaran',
                'content_en' => '<p>The Whistleblowing Management Policy reflects our dedication to upholding our Code of Conduct. This system is designed as a tool to assist all Chandra Asri Group employees, including those in our subsidiaries and joint ventures and stakeholder including but not limited to business partner, supplier or vendor, customer, contractor, agent, consultant and/or any other third party who works with, for or represents Chandra Asri Group in are also encouraged to consult with or report any suspected violations to Chandra Asri Group management.</p>',
                'content_id' => '<p>Kebijakan Manajemen Pengungkapan Pelanggaran mencerminkan dedikasi kami dalam menegakkan Kode Etik. Sistem ini dirancang sebagai alat untuk membantu semua karyawan Chandra Asri Group, termasuk karyawan di anak perusahaan dan usaha patungan kami, serta pemangku kepentingan termasuk namun tidak terbatas pada mitra bisnis, pemasok atau vendor, pelanggan, kontraktor, agen, konsultan dan/atau pihak ketiga lainnya yang bekerja sama dengan, untuk, atau mewakili Chandra Asri Group. Kami juga didorong untuk berkonsultasi atau melaporkan setiap dugaan pelanggaran kepada manajemen Chandra Asri Group.</p>',
            ],
            'governance_whistleblowing_detail' => [
                'file' => asset('assets/frontend/images/governance/whistleblowing_hero_image.webp'),
                'title_en' => '#Your Growth Partner',
                'title_id' => '#Your Growth Partner',
                'content_en' => '',
                'content_id' => '',
            ],
            'our_business_banner' => [
                'file' => asset('assets/frontend/images/ourbusiness/our_business_what_we_do_hero_image.webp'),
                'title_en' => 'What We Do',
                'title_id' => 'Apa yang Kami Lakukan',
                'content_en' => '<p>PT Chandra Daya Investasi (CDI) is actively engaged in the infrastructure sector, with operations spanning in several business categories of industrial <b>energy, water, port and storage services, and logistics.</b></p>',
                'content_id' => '<p>PT Chandra Daya Investasi (CDI) secara aktif terlibat di sektor infrastruktur, dengan operasi yang mencakup beberapa kategori bisnis <b>energi industri, air, layanan pelabuhan dan penyimpanan, dan logistik.</b></p>',
            ],
            'our_business_overview' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '<p>This strategic business development allows CDI to play a key role in meeting the growing infrastructure demands in Indonesia, positioning us for long-term success across multiple sectors.  Looking ahead, CDI is well-positioned to play a critical role in the continued development of the industrial sector not only in Indonesia but also across Southeast Asia. Through innovation, investment and strategic growth, CDI is becoming a cornerstone of the region’s infrastructure landscape.</p>',
                'content_id' => '<p>Pengembangan bisnis yang strategis ini memungkinkan CDI untuk memainkan peran kunci dalam memenuhi permintaan infrastruktur yang terus meningkat di Indonesia, sehingga memposisikan kami untuk meraih kesuksesan jangka panjang di berbagai sektor. Ke depannya, CDI berada pada posisi yang tepat untuk memainkan peran penting dalam pengembangan sektor industri yang berkelanjutan, tidak hanya di Indonesia, tetapi juga di seluruh Asia Tenggara. Melalui inovasi, investasi, dan pertumbuhan yang strategis, CDI menjadi landasan lanskap infrastruktur di kawasan ini.</p>',
            ],
            'sustainability_overview_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_overview_hero_image.webp'),
                'title_en' => 'How our Sustainability Makes Difference',
                'title_id' => 'Bagaimana Keberlanjutan Kami Membuat Perbedaan',
                'content_en' => '<p>We are committed to positively impacting the world around us, and our businesses have a crucial role in a sustainable future.</p>',
                'content_id' => '<p>Kami berkomitmen untuk memberikan dampak positif bagi dunia di sekitar kita, dan bisnis kami memiliki peran penting dalam masa depan yang berkelanjutan.</p>',
            ],
            'sustainability_overview_content' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_overview_section.webp'),
                'title_en' => 'Overview',
                'title_id' => 'Ringkasan',
                'content_en' => "<p>In today's dynamic business environment, CDI is embarking on a transformative journey toward sustainable growth. This involves expanding business portfolios responsibly and inclusively while aligning with economic viability. Our robust ESG approach demonstrates our commitment to creating long-term stakeholder value and operational resilience. By integrating sustainability at our core, CDI aims to be a reliable growth partner, proactively addressing ESG challenges through impactful initiatives. Our Sustainability Framework guides strategic decisions, paving the way for business success that aligns harmoniously with environmental and social progress.</p>",
                'content_id' => "<p>Dalam lingkungan bisnis yang dinamis saat ini, CDI tengah memulai perjalanan transformatif menuju pertumbuhan berkelanjutan. Hal ini melibatkan perluasan portofolio bisnis secara bertanggung jawab dan inklusif sambil menyelaraskan dengan kelayakan ekonomi. Pendekatan ESG kami yang tangguh menunjukkan komitmen kami untuk menciptakan nilai pemangku kepentingan jangka panjang dan ketahanan operasional. Dengan mengintegrasikan keberlanjutan pada inti kami, CDI bertujuan untuk menjadi mitra pertumbuhan yang andal, secara proaktif mengatasi tantangan ESG melalui inisiatif yang berdampak. Kerangka Keberlanjutan kami memandu keputusan strategis, membuka jalan bagi keberhasilan bisnis yang selaras secara harmonis dengan kemajuan lingkungan dan sosial.</p>",
            ],
            'sustainability_overview_policy_framework' => [
                'file' => '',
                'title_en' => 'Our Sustainability Policy and Framework',
                'title_id' => 'Kebijakan dan Kerangka Kerja Keberlanjutan Kami',
                'content_en' => '<p>Our Sustainability Framework and Policy guide our strategic decisions in across all aspects of our operations, ensuring business success aligns with environmental stewardship, and creates positive impact through responsible practices.</p>',
                'content_id' => '<p>Kerangka Kerja dan Kebijakan Keberlanjutan kami memandu keputusan strategis kami di semua aspek operasi kami, memastikan keberhasilan bisnis selaras dengan pengelolaan lingkungan, dan menciptakan dampak positif melalui praktik yang bertanggung jawab.</p>',
            ],
            'sustainability_overview_policy_framework_file' => [
                'file' => asset('assets/frontend/sample.pdf'),
                'title_en' => 'Download Sustainability Policy',
                'title_id' => 'Unduh Kebijakan Keberlanjutan',
                'content_en' => '',
                'content_id' => '',
            ],
            'sustainability_overview_rating' => [
                'file' => '',
                'title_en' => 'Discover How Chandra Daya Investasi is Evaluated for Sustainable Performance',
                'title_id' => 'Temukan Bagaimana Chandra Daya Investasi Dievaluasi untuk Kinerja Berkelanjutan',
                'content_en' => '<p>ESG ratings assess corporate performance in Environmental, Social, and Governance areas. Our latest ratings reflect our commitment to sustainability, ethical practices, and community impact.</p>',
                'content_id' => '<p>Peringkat ESG menilai kinerja perusahaan dalam bidang Lingkungan, Sosial, dan Tata Kelola. Peringkat terbaru kami mencerminkan komitmen kami terhadap keberlanjutan, praktik etis, dan dampak terhadap masyarakat.</p>',
            ],
            'sustainability_environment_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_environment_hero_image.webp'),
                'title_en' => 'Environment',
                'title_id' => 'Lingkungan',
                'content_en' => '<p>CDI firmly believes that business can have a significant influence on the environment. We have a demonstrated commitment to sustainability ingrained in our operations. By integrating environmental considerations into our business practices, we actively work towards fostering a greener tomorrow.</p>',
                'content_id' => '<p>CDI sangat yakin bahwa bisnis dapat memberikan pengaruh yang signifikan terhadap lingkungan. Kami telah menunjukkan komitmen terhadap keberlanjutan yang tertanam dalam operasi kami. Dengan mengintegrasikan pertimbangan lingkungan ke dalam praktik bisnis kami, kami secara aktif berupaya untuk mewujudkan masa depan yang lebih hijau.</p>',
            ],
            'sustainability_environment_overview' => [
                'file' => '',
                'title_en' => 'Environmental Responsibility',
                'title_id' => 'Tanggung Jawab Lingkungan',
                'content_en' => '
                    <p>CDI is deeply committed to environmental responsibility across its operations. By implementing strategies to reduce carbon footprint and greenhouse gas emissions through renewable energy adoption and energy-efficient technologies, the Company is dedicated to a sustainable future.</p>
                    <p>Prioritizing water conservation, responsible effluent management, and emission and waste reduction initiatives, CDI aims to protect water resources, ecosystems, and biodiversity. Embracing the principles of the circular economy, the group focuses on waste minimization, recycling, and resource optimization to drive positive environmental stewardship and sustainable practices within and beyond the industry.</p>
                ',
                'content_id' => '
                    <p>CDI memiliki komitmen yang kuat terhadap tanggung jawab lingkungan dalam seluruh operasionalnya. Dengan menerapkan strategi untuk mengurangi jejak karbon dan emisi gas rumah kaca melalui penggunaan energi terbarukan serta teknologi hemat energi, Perusahaan bertekad mewujudkan masa depan yang berkelanjutan.</p>
                    <p>Dengan memprioritaskan konservasi air, pengelolaan limbah cair yang bertanggung jawab, serta inisiatif pengurangan emisi dan limbah, CDI bertujuan melindungi sumber daya air, ekosistem, dan keanekaragaman hayati. Mengadopsi prinsip ekonomi sirkular, grup ini berfokus pada minimisasi limbah, daur ulang, dan optimalisasi sumber daya guna mendorong pengelolaan lingkungan yang positif serta praktik berkelanjutan di dalam maupun di luar industri.</p>
                ',
            ],
            'sustainability_social_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_social_hero_image.webp'),
                'title_en' => 'Creating Meaningful Impact',
                'title_id' => 'Menciptakan Dampak yang Berarti',
                'content_en' => '<p>As part of our Sustainability Framework, our approach to Social initiatives focuses on creating a positive impact on the communities where we operate, nurturing an inclusive workplace, and championing social causes that contribute to the well-being of society. We foster innovation programs which bring broad benefits for society while also reinforcing our foundation for human rights ratification.</p>',
                'content_id' => '<p>Sebagai bagian dari Kerangka Keberlanjutan kami, pendekatan kami terhadap inisiatif Sosial berfokus pada penciptaan dampak positif pada masyarakat tempat kami beroperasi, memelihara tempat kerja yang inklusif, dan memperjuangkan tujuan sosial yang berkontribusi pada kesejahteraan masyarakat. Kami mendorong program inovasi yang memberikan manfaat luas bagi masyarakat sekaligus memperkuat landasan kami untuk ratifikasi hak asasi manusia.</p>',
            ],
            'sustainability_social_overview' => [
                'file' => '',
                'title_en' => 'Empowering Communities',
                'title_id' => 'Memberdayakan Komunitas',
                'content_en' => 'PT Chandra Daya Investasi Tbk (CDI)’s Corporate Social Responsibility (CSR) programs are designed to uplift communities and create long-term positive impacts.',
                'content_id' => 'Program Tanggung Jawab Sosial Perusahaan (CSR) PT Chandra Daya Investasi Tbk (CDI) dirancang untuk mengangkat masyarakat dan menciptakan dampak positif jangka panjang.',
            ],
            'sustainability_governance_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_governance_hero_image.webp'),
                'title_en' => 'Governance',
                'title_id' => 'Tata Kelola',
                'content_en' => '<p>Governance is a pivotal dimension in CDI Sustainability Framework, guided by the principles of environmental consciousness, social responsibility, and economic sustainability. Our approach to governance extends across various critical areas, including sustainable supply chain management, IT and security protocols, comprehensive business risk management strategies, anti-corruption measures, and effective grievance resolution mechanisms. </p>',
                'content_id' => '<p>Tata kelola merupakan dimensi penting dalam Kerangka Keberlanjutan CDI, yang dipandu oleh prinsip-prinsip kesadaran lingkungan, tanggung jawab sosial, dan keberlanjutan ekonomi. Pendekatan kami terhadap tata kelola mencakup berbagai bidang penting, termasuk manajemen rantai pasokan yang berkelanjutan, protokol TI dan keamanan, strategi manajemen risiko bisnis yang komprehensif, langkah-langkah antikorupsi, dan mekanisme penyelesaian keluhan yang efektif.</p>',
            ],
            'sustainability_governance_overview' => [
                'file' => '',
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'sustainability_report_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_report_pub_hero_image.webp'),
                'title_en' => 'Sustainability Reports and Publications',
                'title_id' => 'Laporan dan Publikasi Keberlanjutan',
                'content_en' => '<p>Gain insight into our sustainable initiatives and achievements as we transparently share our progress in creating a positive impact on the planet and society.</p>',
                'content_id' => '<p>Dapatkan wawasan tentang inisiatif dan pencapaian berkelanjutan kami saat kami secara transparan berbagi kemajuan kami dalam menciptakan dampak positif pada planet dan masyarakat.</p>',
            ],
            'sustainability_action_banner' => [
                'file' => asset('assets/frontend/images/sustainability/sustainability_in_action_hero_image.webp'),
                'title_en' => 'Discover how we drive positive change for the environment and communities',
                'title_id' => 'Temukan bagaimana kami mendorong perubahan positif bagi lingkungan dan masyarakat',
                'content_en' => '',
                'content_id' => '',
            ],
            'contact_us_main' => [
                'file' => asset('assets/frontend/images/contactpage/contact_hero_image.webp'),
                'title_en' => 'Thank you for your interest in CDI',
                'title_id' => 'Terima kasih atas minat Anda pada CDI',
                'content_en' => '#Your Growth Partner',
                'content_id' => '#Mitra Pertumbuhan Anda',
            ],
            'terms_and_conditions' => [
                'file' => '',
                'title_en' => 'Terms of Use',
                'title_id' => 'Ketentuan Penggunaan',
                'content_en' => '',
                'content_id' => '',
            ],
            'media_main' => [
                'file' => asset('assets/frontend/images/media/media_hero_image.webp'),
                'title_en' => '',
                'title_id' => '',
                'content_en' => '',
                'content_id' => '',
            ],
            'privacy_policy' => [
                'file' => '',
                'title_en' => 'Privacy Policy',
                'title_id' => 'Kebijakan Privasi',
                'content_en' => '',
                'content_id' => '',
            ],
            'cookies_consent' => [
                'file' => '',
                'title_en' => 'Cookies Notice',
                'title_id' => 'Pemberitahuan Cookie',
                'content_en' => '',
                'content_id' => '',
            ],
            'disclaimer' => [
                'file' => '',
                'title_en' => 'Disclaimer',
                'title_id' => 'Penafian',
                'content_en' => '',
                'content_id' => '',
            ],
        ];


        foreach ($data as $key => $value) {
            $type = constant(PreferenceKey::class . "::$key")?->type();
            $imageFields = ['file'];

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

            // Simpan ke database
            Preference::updateOrCreate(['key' => $key], [
                ...$value,
                'type' => $type,
            ]);
            sleep(.5);
        }


        $cacheKeys = [
            Helper::getPreferenceCacheKey(PreferenceKey::getAllHomeKey()),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllAboutUsKey('who-we-are')),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllAboutUsKey('management')),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllAboutUsKey('award')),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllInvestorKey()),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllGovernanceKey()),
            Helper::getPreferenceCacheKey(PreferenceKey::getAllOurBusinessKey()),
            Helper::getPreferenceCacheKey(PreferenceKey::getSustainabilityKey('overview')),
            Helper::getPreferenceCacheKey(PreferenceKey::getSustainabilityKey('environment')),
            Helper::getPreferenceCacheKey(PreferenceKey::getSustainabilityKey('social')),
            Helper::getPreferenceCacheKey(PreferenceKey::getSustainabilityKey('governance')),
            Helper::getPreferenceCacheKey(PreferenceKey::getSustainabilityKey('report')),
            Helper::getPreferenceCacheKey(PreferenceKey::getOtherKeys())
        ];

        foreach ($cacheKeys as $key) {
            Optimize::delete($key);
        }
    }
}
