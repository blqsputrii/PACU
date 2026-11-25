<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prospect', function (Blueprint $table) {
            $table->id('id_prospek');
            $table->date('tanggal_prospek');
            $table->string('domisili', 100);
            $table->string('nama_agen', 100);
            $table->string('no_telp_agen', 20);
            $table->string('no_telp_kantor', 20);
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->foreignId('id_kategori')->constrained('property_categories', 'id_kategori');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect');
    }
};
