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
        Schema::create('progress_agens', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->date('tanggal');
            $table->string('kategori_agen');
            $table->string('domisili');
            $table->string('nama_agen');
            $table->string('no_telp_agen');
            $table->string('no_telp_kantor');
            $table->boolean('agen_merespon')->default(false);
            $table->boolean('agen_survey')->default(false);
            $table->boolean('agen_deal')->default(false);
            $table->boolean('bukti_foto')->nullabel();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_agens');
    }
};
