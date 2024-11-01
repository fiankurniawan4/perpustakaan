<?php

namespace Database\Seeders;

use App\Models\Admin as ModelsAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function admin(): void
    {
        ModelsAdmin::create([
            'f_nama' => 'Fian Kurniawan',
            'f_username' => 'fian',
            'f_password' => Hash::make('123'),
            'f_level' => 'Admin'
        ]);
    }
}
