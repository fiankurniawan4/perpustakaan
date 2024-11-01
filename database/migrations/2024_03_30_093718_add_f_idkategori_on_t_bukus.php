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
        Schema::table('t_bukus', function(Blueprint $table) {
            $table->unsignedBigInteger('f_idkategori');
            $table->foreign('f_idkategori')->references('f_id')->on('t_kategoris')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign(['f_idkategori']);
            $table->dropColumn('f_idkategori');
        });
    }
};
