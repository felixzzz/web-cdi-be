<?php

use App\Enums\PreferenceKey;
use App\Models\Utility\Preference;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $defaults = [
            PreferenceKey::meta_home->value => [
                'title_en' => 'Chandra Daya Investasi | Infrastructure in Southeast Asia',
                'title_id' => 'Chandra Daya Investasi | Investasi & Solusi Infrastruktur',
                'content_en' => 'Chandra Daya Investasi (CDI Group) delivers integrated infrastructure solutions across energy, water, ports & storage, and logistics in Indonesia.',
                'content_id' => 'Chandra Daya Investasi (CDI Group) menyediakan solusi infrastruktur untuk industri di sektor energi, air, kepelabuhanan & penyimpanan, serta logistik di Indonesia.',
            ],
            PreferenceKey::meta_about_us->value => [
                'title_en' => 'About Us | Chandra Daya Investasi (CDI Group)',
                'title_id' => 'Siapa Kami | Profil Perusahaan Chandra Daya Investasi',
                'content_en' => 'Learn about Chandra Daya Investasi (CDI Group), a leading infrastructure investment company serving energy, water, ports, and logistics in Indonesia.',
                'content_id' => 'Profil perusahaan PT Chandra Daya Investasi Tbk (CDI Group) perusahaan investasi infrastruktur di Indonesia terkemuka hingga kancah Asia Tenggara.',
            ],
            PreferenceKey::meta_about_us_management->value => [
                'title_en' => 'Management & Organization | Chandra Daya Investasi',
                'title_id' => 'Manajemen & Dewan Komisaris | Chandra Daya Investasi',
                'content_en' => "Meet the management team and organizational structure behind CDI Group's integrated infrastructure solutions in Indonesia and the region.",
                'content_id' => 'Mengenal tim manajemen dan struktur organisasi CDI Group untuk solusi infrastruktur terintegrasi di Indonesia hingga internasional.',
            ],
            PreferenceKey::meta_about_us_awards->value => [
                'title_en' => 'Awards & Certifications | Chandra Daya Investasi',
                'title_id' => 'Penghargaan & Sertifikasi | Chandra Daya Investasi',
                'content_en' => "Awards and certifications reflecting CDI Group's credibility as an infrastructure investment company in Indonesia and Southeast Asia.",
                'content_id' => 'Kredibilitas dan komitmen CDI Group sebagai perusahaan infrastruktur di Indonesia dibuktikan lewat berbagai penghargaan dan sertifikasi industri.',
            ],
            PreferenceKey::meta_contact_us->value => [
                'title_en' => 'Contact Us | Chandra Daya Investasi (CDI Group)',
                'title_id' => 'Hubungi Kami | Chandra Daya Investasi',
                'content_en' => 'Get in touch with Chandra Daya Investasi (CDI Group) for inquiries on infrastructure solutions in energy, water, ports & storage, and logistics.',
                'content_id' => 'Hubungi Chandra Daya Investasi (CDI Group) untuk informasi solusi infrastruktur energi, air, kepelabuhanan & penyimpanan, dan logistik di Indonesia.',
            ],
            PreferenceKey::meta_governance->value => [
                'title_en' => 'Corporate Governance (GCG) | Chandra Daya Investasi',
                'title_id' => 'Tata Kelola Perusahaan (GCG) | Chandra Daya Investasi',
                'content_en' => "CDI Group's good corporate governance (GCG) principles underpin transparency, accountability, and sustainable infrastructure business in Indonesia.",
                'content_id' => 'Prinsip tata kelola perusahaan yang baik (GCG) CDI Group sebagai dasar transparansi, akuntabilitas, dan keberlanjutan bisnis infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_governance_policy->value => [
                'title_en' => 'Governance Policies | Chandra Daya Investasi',
                'title_id' => 'Kebijakan Tata Kelola | Chandra Daya Investasi',
                'content_en' => "Corporate governance policies and guidelines shaping CDI Group's compliance, ethics, and GCG practices across its infrastructure businesses.",
                'content_id' => 'Kebijakan dan pedoman tata kelola perusahaan CDI Group yang menjadi landasan praktik GCG, kepatuhan, dan etika bisnis di seluruh lini usaha.',
            ],
            PreferenceKey::meta_governance_whistleblowing->value => [
                'title_en' => 'Whistleblowing System (WBS) | Chandra Daya Investasi',
                'title_id' => 'Sistem Pelaporan Pelanggaran (WBS) | CDI Group',
                'content_en' => 'Report ethical concerns, fraud, or policy violations securely and confidentially through the CDI Group Whistleblowing System (WBS).',
                'content_id' => 'Saluran pelaporan pelanggaran etika, kecurangan, atau ketidakpatuhan secara aman, independen, dan rahasia melalui Whistleblowing System CDI Group.',
            ],
            PreferenceKey::meta_investor_financial->value => [
                'title_en' => 'Financial Information | CDI Group Investor Relations',
                'title_id' => 'Informasi Keuangan | Investor Chandra Daya Investasi',
                'content_en' => 'Access CDI Group (CDIA) financial information and reports covering the performance and position of its infrastructure business in Indonesia.',
                'content_id' => 'Akses informasi dan laporan keuangan CDI Group (CDIA) untuk investor, mencakup kinerja keuangan dan posisi usaha infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_investor_publications->value => [
                'title_en' => 'Investor Publications | Chandra Daya Investasi',
                'title_id' => 'Publikasi Investor | Chandra Daya Investasi',
                'content_en' => 'Publications, prospectuses, and investor materials from CDI Group (CDIA) on the performance and outlook of its infrastructure business.',
                'content_id' => 'Kumpulan publikasi, prospek bisnis, dan materi untuk investor CDI Group (CDIA) seputar kinerja dan prospek bisnis infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_investor_report->value => [
                'title_en' => 'Investor Reports | Chandra Daya Investasi (CDIA)',
                'title_id' => 'Laporan Perusahaan | Investor Chandra Daya Investasi',
                'content_en' => 'Download CDI Group (CDIA) financial, annual, and corporate reports to support investment decisions in its Indonesian infrastructure business.',
                'content_id' => 'Unduh laporan keuangan, tahunan, dan publikasi CDI Group (CDIA) untuk mendukung keputusan investasi pada bisnis infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_investor_shares->value => [
                'title_en' => 'Shares Information (CDIA) | Chandra Daya Investasi',
                'title_id' => 'Informasi Saham (CDIA) | Chandra Daya Investasi',
                'content_en' => 'CDI Group (CDIA) shares information: ownership structure, corporate actions, and share data for investors in its infrastructure business.',
                'content_id' => 'Informasi terkait saham CDI Group (CDIA) berisikan struktur kepemilikan, aksi korporasi, dan data saham bagi investor perusahaan infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_media_news->value => [
                'title_en' => 'News & Articles | Chandra Daya Investasi (CDI Group)',
                'title_id' => 'Berita Terkini & Siaran Pers | Chandra Daya Investasi',
                'content_en' => 'Latest news, articles, and announcements from CDI Group on infrastructure projects, insights, and developments across Indonesia and the region.',
                'content_id' => 'Update berita, artikel & pengumuman CDI Group tentang insight, proyek dan solusi infrastruktur terdepan di Indonesia.',
            ],
            PreferenceKey::meta_our_business->value => [
                'title_en' => 'Our Business | Chandra Daya Investasi (CDI Group)',
                'title_id' => 'Bisnis Kami | Chandra Daya Investasi',
                'content_en' => "Explore CDI Group's business lines across energy, water, logistics, and ports & storage - integrated infrastructure for sustainable growth.",
                'content_id' => 'CDI Group menyediakan solusi infrastruktur di sektor energi, air, logistik, serta kepelabuhanan & penyimpanan untuk pertumbuhan yang berkelanjutan.',
            ],
            PreferenceKey::meta_our_business_energy->value => [
                'title_en' => 'Energy Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Energi | Chandra Daya Investasi',
                'content_en' => "CDI Group's energy infrastructure through KCE delivers power supply, electricity services, and renewable energy for industry and the public.",
                'content_id' => 'Solusi infrastruktur energi CDI Group melalui KCE menghadirkan penyediaan listrik, layanan kelistrikan, dan energi terbarukan untuk industri & publik.',
            ],
            PreferenceKey::meta_our_business_logistics->value => [
                'title_en' => 'Logistics Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Logistik Maritim & Darat | Chandra Daya Investasi',
                'content_en' => "CDI Group's sea and land logistics solutions cover LPG and chemical shipping, cold chain, and an integrated fleet for reliable distribution.",
                'content_id' => 'Solusi infrastruktur logistik laut dan darat CDI Group menyediakan pelayaran LPG dan kimia, cold chain, serta armada kapal terintegrasi.',
            ],
            PreferenceKey::meta_our_business_ports->value => [
                'title_en' => 'Ports & Storage Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Pelabuhan dan Penyimpanan | Chandra Daya Investasi',
                'content_en' => "CDI Group's international-standard port and storage solutions support logistics, chemical imports, and petrochemical distribution in the region.",
                'content_id' => 'Solusi pelabuhan dan penyimpanan CDI Group berstandar internasional mendukung kelancaran logistik, impor bahan kimia, dan distribusi petrokimia.',
            ],
            PreferenceKey::meta_our_business_water->value => [
                'title_en' => 'Water Solutions | Chandra Daya Investasi',
                'title_id' => 'Solusi Air | Chandra Daya Investasi',
                'content_en' => "CDI Group's water infrastructure through KTI provides clean water, demineralized water, and wastewater treatment for integrated industrial use.",
                'content_id' => 'Solusi infrastruktur air CDI melalui KTI menyediakan air bersih, air demin, dan pengolahan air limbah untuk industri secara terpadu & berkelanjutan.',
            ],
            PreferenceKey::meta_sustainability->value => [
                'title_en' => 'Sustainability (ESG) | Chandra Daya Investasi',
                'title_id' => 'Keberlanjutan (ESG) | Chandra Daya Investasi',
                'content_en' => "CDI Group's sustainability commitment spans environmental, social, and governance (ESG) aspects for responsible infrastructure development.",
                'content_id' => 'Komitmen keberlanjutan CDI Group mencakup aspek lingkungan, sosial, dan tata kelola (ESG) untuk pembangunan infrastruktur yang bertanggung jawab.',
            ],
            PreferenceKey::meta_sustainability_environment->value => [
                'title_en' => 'Environment | Chandra Daya Investasi',
                'title_id' => 'Keberlanjutan Lingkungan | Chandra Daya Investasi',
                'content_en' => "CDI Group's environmental initiatives including energy efficiency, water and waste management, and reducing the operational impact of its infrastructure.",
                'content_id' => 'Merupakan Inisiatif lingkungan CDI Group dalam efisiensi energi, pengelolaan air dan limbah, serta upaya menekan dampak operasional infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_sustainability_governance->value => [
                'title_en' => 'Sustainability Governance | Chandra Daya Investasi',
                'title_id' => 'Tata Kelola Keberlanjutan | Chandra Daya Investasi',
                'content_en' => "CDI Group's sustainability governance approach integrates ESG principles into the strategy and operations of its infrastructure business.",
                'content_id' => 'Pendekatan tata kelola keberlanjutan CDI Group yang mengintegrasikan prinsip ESG ke dalam strategi dan operasi bisnis infrastruktur.',
            ],
            PreferenceKey::meta_sustainability_social->value => [
                'title_en' => 'Social Responsibility | Chandra Daya Investasi',
                'title_id' => 'Keberlanjutan Sosial | Chandra Daya Investasi',
                'content_en' => "CDI Group's social and community empowerment programs as part of its sustainability commitment in the infrastructure business in Indonesia.",
                'content_id' => 'Program sosial dan pemberdayaan masyarakat CDI Group sebagai bagian dari komitmen keberlanjutan bisnis infrastruktur di Indonesia.',
            ],
            PreferenceKey::meta_terms->value => [
                'title_en' => 'Terms and Conditions | PT Chandra Daya Investasi Tbk',
                'title_id' => 'Syarat dan Ketentuan | PT Chandra Daya Investasi Tbk',
                'content_en' => 'Read the official terms and conditions governing the use of the PT Chandra Daya Investasi Tbk corporate website and digital services.',
                'content_id' => 'Pelajari syarat dan ketentuan penggunaan situs web dan layanan digital resmi PT Chandra Daya Investasi Tbk (CDI Group).',
            ],
            PreferenceKey::meta_privacy->value => [
                'title_en' => 'Privacy Policy | PT Chandra Daya Investasi Tbk',
                'title_id' => 'Kebijakan Privasi | PT Chandra Daya Investasi Tbk',
                'content_en' => 'Learn how PT Chandra Daya Investasi Tbk collects, uses, and safeguards your personal data in accordance with applicable privacy regulations.',
                'content_id' => 'Informasi tentang bagaimana PT Chandra Daya Investasi Tbk mengumpulkan, memproses, dan melindungi data pribadi Anda sesuai regulasi yang berlaku.',
            ],
            PreferenceKey::meta_cookies->value => [
                'title_en' => 'Cookie Policy & Tracking Notice | CDI Group',
                'title_id' => 'Kebijakan Cookie | PT Chandra Daya Investasi Tbk',
                'content_en' => 'Understand how CDI Group uses cookies and tracking technologies to ensure site performance, security, and an enhanced browsing experience.',
                'content_id' => 'Penjelasan mengenai penggunaan cookie dan teknologi pelacakan di situs web CDI Group untuk mengoptimalkan pengalaman browsing Anda.',
            ],
            PreferenceKey::meta_disclaimer->value => [
                'title_en' => 'Legal Disclaimer | PT Chandra Daya Investasi Tbk',
                'title_id' => 'Penyangkalan Hukum (Disclaimer) | CDI Group',
                'content_en' => 'Important legal disclaimers regarding website content accuracy, forward-looking statements, and investment risks at CDI Group.',
                'content_id' => 'Pernyataan sanggahan resmi mengenai keakuratan informasi, pernyataan prospektif, dan risiko investasi di situs web CDI Group.',
            ],
        ];

        foreach ($defaults as $key => $values) {
            $enumCase = PreferenceKey::tryFrom($key);
            if ($enumCase) {
                Preference::updateOrCreate(['key' => $key], [
                    'type' => $enumCase->type(),
                    'title_en' => $values['title_en'],
                    'title_id' => $values['title_id'],
                    'content_en' => $values['content_en'],
                    'content_id' => $values['content_id'],
                ]);
            }
        }
    }

    public function down(): void
    {
        Preference::whereIn('key', PreferenceKey::getSeoMetaKeys())->delete();
    }
};
