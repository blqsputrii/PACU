<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id('id_verifikasi');
            $table->string('status', 20)->default('Pending');
            $table->text('catatan')->nullable();
            $table->timestamp('waktu_verifikasi')->nullable();
            $table->foreignId('id_prospek')->unique()->constrained('prospect', 'id_prospek')->cascadeOnDelete();
            $table->foreignId('id_user')->nullable()->constrained('users', 'id_user');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
