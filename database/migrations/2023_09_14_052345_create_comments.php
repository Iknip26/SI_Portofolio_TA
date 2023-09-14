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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comment');
            $table->foreignId('id_content');
            $table->index('id_content');
            $table->foreignId('id_user');
            $table->index('id_user');
            $table->text('comment');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('user_accounts')->onDelete('cascade');
            $table->foreign('id_content')->references('id_content')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
