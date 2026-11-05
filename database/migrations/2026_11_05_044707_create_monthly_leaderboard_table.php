<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('monthly_leaderboard', function (Blueprint $table) {
            $table->id('idleaderboard');
            $table->foreignId('iduser')->constrained('user', 'iduser')->onDelete('cascade');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('total_poin')->default(0);
            $table->integer('peringkat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monthly_leaderboard');
    }
};
