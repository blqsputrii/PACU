<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prospect_activities', function (Blueprint $table) {
            $table->id('id_aktivitas');
            $table->boolean('is_merespon')->default(false);
            $table->boolean('is_survey')->default(false);
            $table->boolean('is_deal')->default(false);
            $table->integer('poin_sementara')->default(0);
            $table->foreignId('id_prospek')->unique()->constrained('prospect', 'id_prospek')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect_activities');
    }
};
