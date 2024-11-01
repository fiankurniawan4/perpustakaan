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
        Schema::table('t_peminjamans', function(Blueprint $table) {
            $table->unsignedBigInteger('f_idadmin');
            $table->foreign('f_idadmin')->references('f_id')->on('t_admins')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign(['f_idadmin']);
            $table->dropColumn('f_idadmin');
        });
    }
};
