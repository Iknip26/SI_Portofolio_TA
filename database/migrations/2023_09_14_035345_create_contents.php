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
        Schema::create('contents', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_dosen');
            $table->index("id_dosen");
            $table->string('thumbnail_image_url');
            $table->string('tittle');
            $table->enum('tipe_konten', ['jurnal', 'tugas_akhir']);
            $table->String("content_url")->nullable(true);
            $table->String("video_url")->nullable(true);
            $table->String("video_tittle")->nullable(true);
            $table->String("github_url")->nullable(true);
            $table->text('description');
            $table->string('owner');
            $table->string('owner_contact');
            $table->timestamps();
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};