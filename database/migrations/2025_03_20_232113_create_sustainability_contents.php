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
        Schema::create('sustainability_contents', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->enum("category", ["environment", "social", "governance"]);
            $table->string("name")->nullable();
            $table->string("type")->default("content")->comment("content, grid, simple_text_information, file_information, list_information, swiper");
            $table->string("grid_type")->nullable()->comment("icon_content_card, icon_list_card, box_icon_card, image_content_card");
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("content_en")->nullable();
            $table->longText("content_id")->nullable();
            $table->json("content_json_en")->nullable();
            $table->json("content_json_id")->nullable();
            $table->string("image", 500)->default('');
            $table->json("file_information")->nullable();
            $table->string("background")->default("normal")->comment("normal or darkest");
            $table->string("grid_direction")->default("row")->comment("row or col");
            $table->string("grid_pattern")->default("normal")->comment("normal or zigzag");
            $table->integer("sort")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sustainability_contents');
    }
};
