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
        Schema::create('t_admins', function (Blueprint $table) {
            $table->id('f_id');
            $table->string('f_nama', 100);
            $table->string('f_username', 100);
            $table->string('f_password', 100);
            $table->enum('f_level', ['Admin', 'Pustakawan']);
            $table->rememberToken();
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
