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
        Schema::create('content_images', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_content');
            $table->index('id_content');
            $table->string('image_url');
            $table->foreign('id_content')->references('id')->on('contents')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_images');
    }
};