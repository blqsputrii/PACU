<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monthly_leaderboard', function (Blueprint $table) {
            $table->id('id_leaderboard');
            $table->unsignedTinyInteger('bulan');
            $table->unsignedSmallInteger('tahun');
            $table->integer('total_poin')->default(0);
            $table->unsignedInteger('peringkat')->nullable();
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->unique(['id_user', 'bulan', 'tahun']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monthly_leaderboard');
    }
};
