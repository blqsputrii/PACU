<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('point_ledger', function (Blueprint $table) {
            $table->id('idledger');
            $table->foreignId('iduser')->constrained('user', 'iduser')->onDelete('cascade');
            $table->foreignId('idrule')->nullable()->constrained('point_rules', 'idrule')->onDelete('set null');
            $table->integer('poin');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('point_ledger');
    }
};
