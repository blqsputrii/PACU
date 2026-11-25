<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('points_ledger', function (Blueprint $table) {
            $table->id('id_poin');
            $table->integer('poin_diperoleh');
            $table->string('keterangan')->nullable();
            $table->timestamp('waktu_diperoleh')->useCurrent();
            $table->foreignId('id_user')->constrained('users', 'id_user');
            $table->foreignId('id_prospek')->nullable()->unique()->constrained('prospect', 'id_prospek');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('points_ledger');
    }
};
