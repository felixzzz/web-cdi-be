<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\AboutUs\Milestone;
use App\Models\AboutUs\OurHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $milestones = [
            [
                'year' => 2023,
                'content_en' => '
                    <ol>
                        <li>PT Chandra Daya Investasi was established as an investment holding company for industrial water infrastructure, energy, port and storage, as well as electricity, water, and port logistics businesses.</li>
                        <li>An investment of US$194 million from Electric Generating Public Company Limited or EGCO Group (EGCO) for a 30% stake in CDI.</li>
                        <li>Acquired 70% of PT Krakatau Chandra Energi (KCE) and 49% of PT Krakatau Tirta Industri (KTI) in 2023, marking the beginning of the energy and water business pillars.</li>
                        <li>Expanded energy sector acquisitions by purchasing a 45% stake in PT Krakatau Posco Energy (KPE) with an investment of up to US$200 million through PT Krakatau Chandra Energi</li>
                    </ol>
                ',
                'content_id' => '
                    <ol>
                        <li>PT Chandra Daya Investasi didirikan sebagai perusahaan induk investasi untuk infrastruktur air industri, energi, pelabuhan dan penyimpanan, serta bisnis logistik listrik, air, dan pelabuhan.</li>
                        <li>Investasi sebesar USD 194 juta dari Electric Generating Public Company Limited atau EGCO Group (EGCO) untuk kepemilikan 30% saham di CDI.</li>
                        <li>Mengakuisisi 70% saham PT Krakatau Chandra Energi (KCE) dan 49% saham PT Krakatau Tirta Industri (KTI) pada tahun 2023, menandai awal dari pilar bisnis energi dan air.</li>
                        <li>Memperluas akuisisi di sektor energi dengan membeli 45% saham PT Krakatau Posco Energy (KPE) dengan investasi hingga USD 200 juta melalui PT Krakatau Chandra Energi.</li>
                    </ol>
                '
            ],
            [
                'year' => 2024,
                'content_en' => '
                    <ol>
                        <li>Commenced solar panel business outside Cilegon.</li>
                        <li>Commenced Port and Storage business.</li>
                        <li>Started the operation of a desalination plant to support copper and gold companies in Sumbawa.</li>
                        <li>Established PT Chandra Shipping International (CSI) and acquired PT Marina Indah Maritim (MIM) as subsidiaries in the logistics pillar, operating chemical and gas carrier ships</li>
                        <li>Established PT Chandra Cold Chain (CCC) in the logistics pillar, operating cold storage and warehousing facilities.</li>
                    </ol>
                ',
                'content_id' => '
                    <ol>
                        <li>Memulai bisnis panel surya di luar Cilegon.</li>
                        <li>Memulai bisnis Pelabuhan dan Penyimpanan.</li>
                        <li>Memulai operasional pabrik desalinasi untuk mendukung perusahaan tembaga dan emas di Sumbawa.</li>
                        <li>Mendirikan PT Chandra Shipping International (CSI) dan mengakuisisi PT Marina Indah Maritim (MIM) sebagai anak perusahaan dalam pilar logistik, yang mengoperasikan kapal pengangkut bahan kimia dan gas.</li>
                        <li>Mendirikan PT Chandra Cold Chain (CCC) dalam pilar logistik, yang mengoperasikan fasilitas penyimpanan dingin dan pergudangan.</li>
                    </ol>
                '
            ]
        ];

        foreach ($milestones as $key => $value) {
            Milestone::create($value);
        }

        $ourHistories = [
            [
                'image' => asset('assets/frontend/images/about/our_history_1.webp'),
                'title_en' => 'Cilegon as an Industrial Hub',
                'title_id' => 'Cilegon sebagai Pusat Industri',
                'content_en' => '
                    <p>Located in Banten Province on the southern coast of Java Island, Cilegon offers strategic access to international ports and is ideally situated near Jakarta, making it prime location for industrial activities. Its geographic advantage ensures efficient logistics and the seamless distribution good, establishing Cilegon as a key player in Indonesia’s industrial landscape. Since the 1970’s, Cilegon has undergone continues transformation info a major industrial hub, driven by the development of advanced industrial facilities and robust infrastructure.  Today, it stands as one of the most important centers of industry in Indonesia, home to a diverse range of sectors including chemical, steel and energy.   </p>
                    <p>The Indonesian government strongly supports the growth of Cilegon with policies designed to foster the development of industrial sector. This includes ongoing infrastructure upgrades, investment incentives, and regulatory support, all of which have attracted numerous large domestic and international companies to establish operations in the area. </p>
                ',
                'content_id' => '
                    <p>Terletak di Provinsi Banten di pesisir selatan Pulau Jawa, Cilegon menawarkan akses strategis ke pelabuhan internasional dan berada dekat dengan Jakarta, menjadikannya lokasi utama untuk aktivitas industri. Keunggulan geografisnya memastikan logistik yang efisien dan distribusi barang yang lancar, menjadikan Cilegon sebagai pemain kunci dalam lanskap industri Indonesia. Sejak tahun 1970-an, Cilegon telah mengalami transformasi berkelanjutan menjadi pusat industri utama, didorong oleh perkembangan fasilitas industri yang maju dan infrastruktur yang kuat. Saat ini, Cilegon berdiri sebagai salah satu pusat industri terpenting di Indonesia, yang menaungi berbagai sektor termasuk kimia, baja, dan energi.</p>
                    <p>Pemerintah Indonesia mendukung pertumbuhan Cilegon dengan kebijakan yang dirancang untuk mendorong pengembangan sektor industri. Hal ini mencakup peningkatan infrastruktur yang berkelanjutan, insentif investasi, dan dukungan regulasi, yang telah menarik banyak perusahaan besar domestik maupun internasional untuk mendirikan operasinya di wilayah ini.</p>
                '
            ],
            [
                'image' => asset('assets/frontend/images/about/our_history_2.webp'),
                'title_en' => 'Expanding Business Horizons in Infrastructure Development',
                'title_id' => 'Memperluas Cakrawala Bisnis dalam Pengembangan Infrastruktur',
                'content_en' => '
                    <p>CDI recognizes significant opportunities to develop infrastructure across Java/Indonesia, where the demand for robust and sustainable infrastructure is rapidly growing. Leveraging Cilegon’s strategic position as an industrial hub and the broader potential of the region, CDI is poised to expand its influence and contribute to the nation’s development </p>
                    <p>With diversified portfolio spanning industrial water, energy, port and storage services, and logistics, CDI is building a strong presence in key infrastructure. </p>
                ',
                'content_id' => '
                    <p>CDI menyadari adanya peluang besar untuk mengembangkan infrastruktur di seluruh Jawa dan Indonesia, di mana permintaan akan infrastruktur yang kuat dan berkelanjutan terus meningkat pesat. Dengan memanfaatkan posisi strategis Cilegon sebagai pusat industri serta potensi wilayah yang lebih luas, CDI siap memperluas pengaruhnya dan berkontribusi pada pembangunan nasional.</p>
                    <p>Dengan portofolio yang terdiversifikasi mencakup air industri, energi, layanan pelabuhan dan penyimpanan, serta logistik, CDI membangun kehadiran yang kuat di sektor infrastruktur utama.</p>
                '
            ]
        ];

        foreach ($ourHistories as $key => $value) {
            $imageFields = ['image'];

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

            OurHistory::create([
                ...$value,
                'tagline_en' => 'Our History',
                'tagline_id' => 'Sejarah Kami'
            ]);
        }

    }
}
