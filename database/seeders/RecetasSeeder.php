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
        for ($i = 0; $i < 15; $i++) {
            DB::table('recetas')->insert([
                'titulo' => 'Receta de Eduar ' . ($i + 1),
                'ingredientes' => 'ingredientes',
                'preparacion' => 'preparacion',
                'imagen' => 'upload-recetas/imagen.jpg',
                'user_id' => 1,
                'categoria_id' => 1, // Aquí puedes cambiar la categoría si es necesario
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('recetas')->insert([
                'titulo' => 'Receta de Pablo ' . ($i + 1),
                'ingredientes' => 'ingredientes',
                'preparacion' => 'preparacion',
                'imagen' => 'upload-recetas/imagen.jpg',
                'user_id' => 2,
                'categoria_id' => 1, // Aquí puedes cambiar la categoría si es necesario
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        
    }
}
