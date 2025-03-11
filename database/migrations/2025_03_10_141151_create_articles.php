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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->text("thumbnail");
            $table->unsignedBigInteger('article_category_id')->nullable();
            $table->string("category")->index()->comment("news, blog");
            $table->string("slug")->index()->default('');
            $table->string("title_en")->default('');
            $table->string("title_id")->default('');
            $table->longText("content_en")->default('');
            $table->longText("content_id")->default('');
            $table->json("tags")->nullable();
            $table->json("meta_tag")->nullable();
            $table->tinyInteger("status")->index()->default(0);
            $table->timestamps();

            $table->foreign('article_category_id')->references('id')->on('article_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
