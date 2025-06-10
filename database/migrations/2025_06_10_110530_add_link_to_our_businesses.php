<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            $table->string("link_title_id")->nullable()->after("heading_tab_title_id");
            $table->string("link_title_en")->nullable()->after("heading_tab_title_id");
            $table->string("link_url")->nullable()->after("heading_tab_title_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            $table->dropColumn("link_title_id");
            $table->dropColumn("link_title_en");
            $table->dropColumn("link_url");
        });
    }
};
