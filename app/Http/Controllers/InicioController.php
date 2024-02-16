<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\CategoriaReceta;

class InicioController extends Controller
{
    
    public function index(){


        $votadas = Receta::withCount('likes')->orderBy('likes_count','DESC')->take(3)->get();

        $nuevas = Receta::latest()->take(5)->get();

        // Recetas por categoria
        $categorias = CategoriaReceta::all();

        $recetas = [];
        foreach ($categorias as $categoria) {
            $recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
