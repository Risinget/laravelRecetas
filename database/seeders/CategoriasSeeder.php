<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_recetas')->insert([
            'nombre' =>'Comida Mexicana',
            'created_at'=>date('Y-m-h H:i:s'),
            'updated_at'=>date('Y-m-h H:i:s'),

        ]);

        DB::table('categoria_recetas')->insert([
            'nombre' => 'Comida Italiana',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
        DB::table('categoria_recetas')->insert([
            'nombre' => 'Comida Argentina',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
        DB::table('categoria_recetas')->insert([
            'nombre' => 'Postres',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
        DB::table('categoria_recetas')->insert([
            'nombre' => 'Cortes',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
        DB::table('categoria_recetas')->insert([
            'nombre' => 'Ensaladas',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);
        DB::table('categoria_recetas')->insert([
            'nombre' => 'Desayuno',
            'created_at' => date('Y-m-h H:i:s'),
            'updated_at' => date('Y-m-h H:i:s'),

        ]);

    }
}
