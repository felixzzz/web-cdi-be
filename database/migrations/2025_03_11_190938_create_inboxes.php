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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique()->index();
            $table->string("type")->index()->default("contact_us")->comment("whistleblowing, contact_us");
            $table->string("first_name");
            $table->string("last_name")->default('');
            $table->string("email");
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->text("message");
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('topic_id')->references('id')->on('topics')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};
