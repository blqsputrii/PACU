<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('prospect', function (Blueprint $table) {
            $table->id('idprospect');
            $table->foreignId('iduser')->constrained('user', 'iduser')->onDelete('cascade');
            $table->foreignId('idcategory')->constrained('property_categories', 'idcategory')->onDelete('cascade');
            $table->string('nama_prospek', 100);
            $table->string('nomor_telepon', 20);
            $table->text('alamat')->nullable();
            $table->string('status', 50)->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect');
    }
};
