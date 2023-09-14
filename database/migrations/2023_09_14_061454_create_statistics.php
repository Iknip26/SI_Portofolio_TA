<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id('id_statistic');
            $table->foreignId('id_user');
            $table->index('id_user');
            $table->string('page_visited');
            $table->timestamp('visit_date');
            $table->foreign('id_user')->references('id_user')->on('user_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
