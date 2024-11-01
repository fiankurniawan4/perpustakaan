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
        Schema::create('t_peminjamans', function(Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idanggota');
            $table->timestamp('f_tanggalpeminjaman');
            $table->foreign('f_idanggota')->references('f_id')->on('t_anggotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
