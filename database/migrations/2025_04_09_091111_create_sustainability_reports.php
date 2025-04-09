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
        Schema::create('sustainability_reports', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("type");
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("description_en")->nullable();
            $table->longText("description_id")->nullable();
            $table->string("author", 500)->nullable();
            $table->string("publisher")->nullable();
            $table->year("release_year")->nullable();
            $table->integer("pages")->nullable();
            $table->string("format")->nullable();
            $table->string("image")->nullable();
            $table->json("file")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sustainability_reports');
    }
};
