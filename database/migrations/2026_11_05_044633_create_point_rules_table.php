<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('point_rules', function (Blueprint $table) {
            $table->id('id_aturan');
            $table->string('kunci_aktivitas', 50);
            $table->string('label_aktivitas', 100);
            $table->integer('nilai_poin');
            $table->foreignId('id_kategori')->nullable()->constrained('property_categories', 'id_kategori');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('point_rules');
    }
};
