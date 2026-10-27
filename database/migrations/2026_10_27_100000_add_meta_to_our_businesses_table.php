<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            $table->string('meta_title_en')->nullable()->after('json_ld_id');
            $table->string('meta_title_id')->nullable()->after('meta_title_en');
            $table->text('meta_description_en')->nullable()->after('meta_title_id');
            $table->text('meta_description_id')->nullable()->after('meta_description_en');
        });

        // Seed initial values from preferences table or defaults
        $businessMeta = [
            'energy' => [
                'meta_title_en' => 'Power Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Daya | Chandra Daya Investasi',
                'meta_description_en' => "CDI Group's energy infrastructure through KCE delivers power supply, electricity services, and renewable energy for industry and the public.",
                'meta_description_id' => "Solusi infrastruktur energi CDI Group melalui KCE menghadirkan penyediaan listrik, layanan kelistrikan, dan energi terbarukan untuk industri & publik.",
            ],
            'water' => [
                'meta_title_en' => 'Water Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Air | Chandra Daya Investasi',
                'meta_description_en' => "CDI Group's water infrastructure through KTI provides clean water, demineralized water, and wastewater treatment for integrated industrial use.",
                'meta_description_id' => "Solusi infrastruktur air CDI melalui KTI menyediakan air bersih, air demin, dan pengolahan air limbah untuk industri secara terpadu & berkelanjutan.",
            ],
            'port_storage' => [
                'meta_title_en' => 'Ports & Storage Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Pelabuhan dan Penyimpanan | Chandra Daya Investasi',
                'meta_description_en' => "CDI Group's international-standard port and storage solutions support logistics, chemical imports, and petrochemical distribution in the region.",
                'meta_description_id' => "Solusi pelabuhan dan penyimpanan CDI Group berstandar internasional mendukung kelancaran logistik, impor bahan kimia, dan distribusi petrokimia.",
            ],
            'logistic' => [
                'meta_title_en' => 'Logistics Solutions | Chandra Daya Investasi',
                'meta_title_id' => 'Solusi Logistik Maritim & Darat | Chandra Daya Investasi',
                'meta_description_en' => "CDI Group's sea and land logistics solutions cover LPG and chemical shipping, cold chain, and an integrated fleet for reliable distribution.",
                'meta_description_id' => "Solusi infrastruktur logistik laut dan darat CDI Group menyediakan pelayaran LPG dan kimia, cold chain, serta armada kapal terintegrasi.",
            ],
        ];

        foreach ($businessMeta as $type => $meta) {
            DB::table('our_businesses')
                ->where('type', $type)
                ->update($meta);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            $table->dropColumn(['meta_title_en', 'meta_title_id', 'meta_description_en', 'meta_description_id']);
        });
    }
};
