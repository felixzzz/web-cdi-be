<?php

namespace Database\Seeders;

use App\Models\Sustainability\Responsible;
use Illuminate\Database\Seeder;

class ResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'R',
                'rotate' => 5,
                'title_en' => 'Resource Circularity and Environment Management',
                'title_id' => 'Siklus Sumber Daya dan Pengelolaan Lingkungan',
                'description_en' => '<p>Promoting circular economy and “beyond compliance” on environmental aspects.</p>',
                'description_id' => '<p>Mempromosikan ekonomi sirkular dan kepatuhan lebih dari standar dalam aspek lingkungan.</p>',
                'list_en' => ['Environmental Management', 'Circular Economy'],
                'list_id' => ['Pengelolaan Lingkungan', 'Ekonomi Sirkular'],
            ],
            [
                'key' => 'E',
                'rotate' => -27,
                'title_en' => 'Energy Transition and Low Carbon Solution',
                'title_id' => 'Transisi Energi dan Solusi Rendah Karbon',
                'description_en' => '<p>Supporting the Indonesian government\'s commitment to global climate action.</p>',
                'description_id' => '<p>Mendukung komitmen pemerintah Indonesia terhadap aksi iklim global.</p>',
                'list_en' => ['Climate Resilience'],
                'list_id' => ['Ketahanan Iklim'],
            ],
            [
                'key' => 'S',
                'rotate' => -62,
                'title_en' => 'Social and Community Engagement',
                'title_id' => 'Keterlibatan Sosial dan Masyarakat',
                'description_en' => '<p>Supporting the Indonesian government\'s commitment to global climate action.</p>',
                'description_id' => '<p>Mendukung komitmen pemerintah Indonesia terhadap aksi iklim global.</p>',
                'list_en' => ['Climate Resilience'],
                'list_id' => ['Ketahanan Iklim'],
            ],
            [
                'key' => 'P',
                'rotate' => -94,
                'title_en' => 'Product and Chemical Stewardship',
                'title_id' => 'Pengawasan Produk dan Kimia',
                'description_en' => '<p>Producing products according to standards to increase consumer and public trust.</p>',
                'description_id' => '<p>Memproduksi produk sesuai standar untuk meningkatkan kepercayaan konsumen dan masyarakat.</p>',
                'list_en' => ['Product and Chemical Stewardship'],
                'list_id' => ['Pengawasan Produk dan Kimia'],
            ],
            [
                'key' => 'O',
                'rotate' => -130,
                'title_en' => 'OHS and Human Rights',
                'title_id' => 'K3 dan Hak Asasi Manusia',
                'description_en' => '<p>Running a business that complies with human rights and work safety standards.</p>',
                'description_id' => '<p>Menjalankan bisnis yang sesuai dengan standar hak asasi manusia dan keselamatan kerja.</p>',
                'list_en' => ['Health and Safety', 'Labor and Human Rights'],
                'list_id' => ['Kesehatan dan Keselamatan', 'Tenaga Kerja dan Hak Asasi Manusia'],
            ],
            [
                'key' => 'N',
                'rotate' => -162,
                'title_en' => 'Nurture of Human Capital',
                'title_id' => 'Pengembangan Sumber Daya Manusia',
                'description_en' => '<p>Effective competency development for high productivity and performance.</p>',
                'description_id' => '<p>Pengembangan kompetensi yang efektif untuk produktivitas dan kinerja tinggi.</p>',
                'list_en' => ['Human Capital Development'],
                'list_id' => ['Pengembangan Sumber Daya Manusia'],
            ],
            [
                'key' => 'S',
                'rotate' => -195,
                'title_en' => 'Sustainable Supply Chain',
                'title_id' => 'Rantai Pasokan Berkelanjutan',
                'description_en' => '<p>Establish supplier standards of environmental and social expectations for business sustainability.</p>',
                'description_id' => '<p>Menetapkan standar pemasok untuk ekspektasi lingkungan dan sosial demi keberlanjutan bisnis.</p>',
                'list_en' => ['Sustainable Procurement and Supply Chain'],
                'list_id' => ['Pengadaan dan Rantai Pasokan Berkelanjutan'],
            ],
            [
                'key' => 'I',
                'rotate' => -230,
                'title_en' => 'IT and Security Management',
                'title_id' => 'Manajemen TI dan Keamanan',
                'description_en' => '<p>Improving operational efficiency and security through digitalization, data management, and collaboration.</p>',
                'description_id' => '<p>Meningkatkan efisiensi operasional dan keamanan melalui digitalisasi, manajemen data, dan kolaborasi.</p>',
                'list_en' => ['Digital Transformation', 'Labor and Human Rights'],
                'list_id' => ['Transformasi Digital', 'Tenaga Kerja dan Hak Asasi Manusia'],
            ],
            [
                'key' => 'B',
                'rotate' => -260,
                'title_en' => 'Business Risk Management',
                'title_id' => 'Manajemen Risiko Bisnis',
                'description_en' => '<p>Preparing comprehensive risk management for increased access to investment opportunities.</p>',
                'description_id' => '<p>Mempersiapkan manajemen risiko yang komprehensif untuk meningkatkan akses ke peluang investasi.</p>',
                'list_en' => ['Corporate Governance', 'Climate Resilience', 'Health and Safety'],
                'list_id' => ['Tata Kelola Perusahaan', 'Ketahanan Iklim', 'Kesehatan dan Keselamatan'],
            ],
            [
                'key' => 'L',
                'rotate' => -292,
                'title_en' => 'Liability on Corporate Governance',
                'title_id' => 'Tanggung Jawab Tata Kelola Perusahaan',
                'description_en' => '<p>Implementing good governance to prevent noncompliance, violations and regulatory sanctions.</p>',
                'description_id' => '<p>Menerapkan tata kelola yang baik untuk mencegah ketidakpatuhan, pelanggaran, dan sanksi peraturan.</p>',
                'list_en' => ['Corporate Governance', 'Business Ethics'],
                'list_id' => ['Tata Kelola Perusahaan', 'Etika Bisnis'],
            ],
            [
                'key' => 'E',
                'rotate' => -323,
                'title_en' => 'ESG Communication and Stakeholder Engagement',
                'title_id' => 'Komunikasi ESG dan Keterlibatan Pemangku Kepentingan',
                'description_en' => '<p>Communication and disclosure of environmental, social, and governance (ESG) management information to build stakeholder trust.</p>',
                'description_id' => '<p>Komunikasi dan pengungkapan informasi pengelolaan lingkungan, sosial, dan tata kelola (ESG) untuk membangun kepercayaan pemangku kepentingan.</p>',
                'list_en' => ['All Materialities', 'Business Ethics'],
                'list_id' => ['Semua Materialitas', 'Etika Bisnis'],
            ],
        ];

        $i = 1;
        foreach ($data as $value) {
            Responsible::create([
                ...$value,
                'sort' => $i,
            ]);
            $i++;
        }
    }
}
