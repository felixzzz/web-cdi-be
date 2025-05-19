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
            $table->string("unique_key")->nullable()->after("ulid");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('additional_files', function (Blueprint $table) {
            $table->dropColumn("unique_key");
        });
    }
};
