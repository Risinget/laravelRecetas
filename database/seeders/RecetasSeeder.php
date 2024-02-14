<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recetas')->insert([
            'titulo' => 'Prueba',
            'ingredientes' => 'ingredientes',
            'preparacion' => 'preparacion',
            'imagen' => 'http://127.0.0.1:8000',
            'user_id' =>1,
            'categoria_id' => 1,
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);

        DB::table('recetas')->insert([
            'titulo' => 'Prueba',
            'ingredientes' => 'ingredientes',
            'preparacion' => 'preparacion',
            'imagen' => 'http://127.0.0.1:8000',
            'user_id' => 2,
            'categoria_id' => 2,
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
    }
}
