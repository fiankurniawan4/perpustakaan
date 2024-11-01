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
        Schema::create('t_detailbukus', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idbuku');
            $table->enum('f_status', ['Tersedia', 'Tidak Tersedia']);
            $table->foreign('f_idbuku')->references('f_id')->on('t_bukus')->onDelete('cascade');
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
