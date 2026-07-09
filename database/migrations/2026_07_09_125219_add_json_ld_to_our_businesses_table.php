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
            $table->text('json_ld_en')->nullable()->after('heading_tab_title_id');
            $table->text('json_ld_id')->nullable()->after('json_ld_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            $table->dropColumn(['json_ld_en', 'json_ld_id']);
        });
    }
};
