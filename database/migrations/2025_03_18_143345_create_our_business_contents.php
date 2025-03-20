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
        Schema::create('our_business_contents', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("name")->nullable();
            $table->unsignedBigInteger('our_business_id')->nullable();
            $table->unsignedBigInteger('our_business_tab_id')->nullable();
            $table->string("heading_en")->nullable();
            $table->string("heading_id")->nullable();
            $table->string("heading_position")->nullable();
            $table->string("tagline_en")->nullable();
            $table->string("tagline_id")->nullable();
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("description_en")->nullable();
            $table->longText("description_id")->nullable();
            $table->string("align")->default('left');
            $table->string("image", 500)->default('');
            $table->integer("sort")->default(0);
            $table->timestamps();

            $table->foreign('our_business_id')->references('id')->on('our_businesses')->nullOnDelete();
            $table->foreign('our_business_tab_id')->references('id')->on('our_business_tabs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_business_contents');
    }
};
