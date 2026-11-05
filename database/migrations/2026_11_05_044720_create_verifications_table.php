<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id('idverification');
            $table->foreignId('idactivity')->constrained('prospect_activities', 'idactivity')->onDelete('cascade');
            $table->foreignId('iduser')->constrained('user', 'iduser')->onDelete('cascade');
            $table->string('status_verifikasi', 50);
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
