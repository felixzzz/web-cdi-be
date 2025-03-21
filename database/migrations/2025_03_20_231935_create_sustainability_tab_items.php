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
        Schema::create('sustainability_tab_items', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("name")->nullable();
            $table->unsignedBigInteger('sustainability_tab_id')->nullable();
            $table->string("heading_en")->nullable();
            $table->string("heading_id")->nullable();
            $table->string("heading_position")->nullable();
            $table->string("tagline_en")->nullable();
            $table->string("tagline_id")->nullable();
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("content_en")->nullable();
            $table->longText("content_id")->nullable();
            $table->string("align")->default('left');
            $table->string("image", 500)->default('');
            $table->integer("sort")->default(0);
            $table->timestamps();

            $table->foreign('sustainability_tab_id')->references('id')->on('sustainability_tabs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sustainability_tab_items');
    }
};
