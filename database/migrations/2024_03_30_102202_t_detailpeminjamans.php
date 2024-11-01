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
        Schema::create('t_detailpeminjamans', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idpeminjaman');
            $table->unsignedBigInteger('f_iddetailbuku');
            $table->timestamp('f_tanggalkembali')->nullable();
            $table->foreign('f_idpeminjaman')->references('f_id')->on('t_peminjamans')->onDelete('cascade');
            $table->foreign('f_iddetailbuku')->references('f_id')->on('t_detailbukus')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
