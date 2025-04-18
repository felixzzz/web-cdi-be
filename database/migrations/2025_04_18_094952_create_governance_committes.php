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
        Schema::create('governance_committes', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("tab_title_en");
            $table->string("tab_title_id");
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("content_en")->nullable();
            $table->longText("content_id")->nullable();
            $table->string("image")->nullable();
            $table->json("file")->nullable();
            $table->string("file_name")->nullable();
            $table->integer("sort");
            $table->tinyInteger("is_show")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governance_committes');
    }
};
