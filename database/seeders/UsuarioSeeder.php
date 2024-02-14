<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'eduar',
            'email' => 'eduar@gmail.com',
            'password' => Hash::make('eduar'),
            'url' => 'http://127.0.0.1:8000',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);

        DB::table('users')->insert([
            'name' => 'pablo',
            'email' => 'pablo@gmail.com',
            'password' => Hash::make('pablo'),
            'url' => 'http://127.0.0.1:8000',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
    }
}
