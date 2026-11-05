<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('prospect_activities', function (Blueprint $table) {
            $table->id('idactivity');
            $table->foreignId('idprospect')->constrained('prospect', 'idprospect')->onDelete('cascade');
            $table->foreignId('iduser')->constrained('user', 'iduser')->onDelete('cascade');
            $table->string('jenis_aktivitas', 100);
            $table->text('catatan')->nullable();
            $table->timestamp('tanggal_aktivitas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect_activities');
    }
};
