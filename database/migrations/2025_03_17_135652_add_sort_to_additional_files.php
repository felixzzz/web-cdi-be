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
        Schema::table('additional_files', function (Blueprint $table) {
            $table->integer("sort");
            $table->tinyInteger("show_on_governance")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('additional_files', function (Blueprint $table) {
            $table->dropColumn("sort");
            $table->dropColumn("show_on_governance");
        });
    }
};
