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
        Schema::create('sustainability_tabs', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->enum("category", ["environment", "social", "governance"]);
            $table->string("title_en");
            $table->string("title_id");
            $table->integer("sort")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sustainability_tabs');
    }
};
