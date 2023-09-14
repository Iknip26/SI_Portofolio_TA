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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->foreignId('id_user');
            $table->index('id_user');
            $table->timestamps();
            $table->string('name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('specialization');
            $table->foreign('id_user')->references('id_user')->on('user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
        
    }
};
