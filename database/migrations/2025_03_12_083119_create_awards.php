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
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->date("date");
            $table->string("name_en")->default('');
            $table->string("name_id")->default('');
            $table->text("content_en")->default('');
            $table->text("content_id")->default('');
            $table->string("awarder_en", 500)->default('');
            $table->string("awarder_id", 500)->default('');
            $table->text("file")->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
