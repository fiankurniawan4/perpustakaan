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
        Schema::create('t_bukus', function(Blueprint $table) {
            $table->id('f_id');
            $table->string('f_judul', 100);
            $table->string('f_pengarang', 100);
            $table->string('f_penerbit', 100);
            $table->string('f_deskripsi', 512);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('buku');
        // $path = public_path('uploads/cover');
        // if (file_exists($path)) {
        //     $files = glob($path . '/*');
        //     foreach ($files as $file) {
        //         if (is_file($file)) {
        //             unlink($file);
        //         }
        //     }
        //     rmdir($path);
        // }
    }
};
