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
        Schema::create('our_businesses', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("type")->comment("energy, water, port_storage, logistic");
            $table->string("title_en");
            $table->string("title_id");
            $table->longText("description_en")->nullable();
            $table->longText("description_id")->nullable();
            $table->string("image", 500)->nullable();
            $table->string("banner_title_en")->nullable();
            $table->string("banner_title_id")->nullable();
            $table->longText("banner_description_en")->nullable();
            $table->longText("banner_description_id")->nullable();
            $table->string("banner_image", 500)->nullable();
            $table->string("overview_title_en")->nullable();
            $table->string("overview_title_id")->nullable();
            $table->longText("overview_description_en")->nullable();
            $table->longText("overview_description_id")->nullable();
            $table->string("overview_image", 500)->nullable();
            $table->string("heading_tab_title_en")->nullable();
            $table->string("heading_tab_title_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_businesses');
    }
};
