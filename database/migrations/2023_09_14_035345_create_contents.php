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
            $table->id('id_content');
            $table->foreignId('id_dosen');
            $table->index("id_dosen");
            $table->enum('content_type', ['Proposal/Jurnal', 'Tugas akhir']);
            $table->string('tittle');
            $table->text('description');
            $table->timestamps();
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
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
