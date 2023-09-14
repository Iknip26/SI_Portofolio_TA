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
        Schema::create('tags', function (Blueprint $table) {
            $table->id('id_tag');
            $table->foreignId('id_content');
            $table->index('id_content');
            $table->enum('tag', ['Software Engineering', 'Data Science', 'IOT', 'Internet and Network', 'Game']);
            $table->foreign('id_content')->references('id_content')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
