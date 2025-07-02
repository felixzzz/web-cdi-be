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
        Schema::table('sustainability_contents', function (Blueprint $table) {
            $table->json("file_information_en")->nullable()->after("image");
            $table->renameColumn('file_information', 'file_information_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sustainability_contents', function (Blueprint $table) {
            $table->dropColumn("file_information_en");
            $table->renameColumn('file_information_id', 'file_information');
        });
    }
};
