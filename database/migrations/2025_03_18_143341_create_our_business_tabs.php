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
        Schema::create('our_business_tabs', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->unsignedBigInteger('our_business_id')->nullable();
            $table->string("title_en");
            $table->string("title_id");
            $table->string("sub_title_en")->nullable();
            $table->string("sub_title_id")->nullable();
            $table->longText("description_en")->nullable();
            $table->longText("description_id")->nullable();
            $table->string("image", 500)->nullable();
            $table->integer("sort")->default(0);
            $table->timestamps();

            $table->foreign('our_business_id')->references('id')->on('our_businesses')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_business_tabs');
    }
};
