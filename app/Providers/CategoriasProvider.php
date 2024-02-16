<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CategoriaReceta;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $categorias = CategoriaReceta::all();

        // Compartir categorías con todas las vistas
        view()->share('categorias', $categorias);
    }

}
