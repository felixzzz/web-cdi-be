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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("name");
            $table->string("sub_title_en")->nullable();
            $table->string("sub_title_id")->nullable();
            $table->json("main")->nullable()->comment("json name_en, name_id, address, phone, fax");
            $table->json("branchs")->nullable();
            $table->tinyInteger("is_main")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
