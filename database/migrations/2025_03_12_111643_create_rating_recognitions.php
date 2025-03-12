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
        Schema::create('rating_recognitions', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("type")->index()->comment("rating, recognition");
            $table->string("name_en");
            $table->string("name_id");
            $table->text("content_en")->nullable();
            $table->text("content_id")->nullable();
            $table->text("image")->default('');
            $table->integer("sort")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_recognitions');
    }
};
