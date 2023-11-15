<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user');
            $table->index('id_user');
            $table->foreignId('id_content');
            $table->index('id_content');
            $table->text('notification_message');
            $table->dateTime('notification_date');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_content')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};