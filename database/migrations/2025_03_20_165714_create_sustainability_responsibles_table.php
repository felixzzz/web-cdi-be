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
        Schema::create('sustainability_responsibles', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("key");
            $table->integer("rotate")->default(0);
            $table->string("title_en")->nullable();
            $table->string("title_id")->nullable();
            $table->longText("description_en")->nullable();
            $table->longText("description_id")->nullable();
            $table->json("list_en")->nullable();
            $table->json("list_id")->nullable();
            $table->integer("sort")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sustainability_responsibles');
    }
};
