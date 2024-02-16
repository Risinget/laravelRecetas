<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\User;
class LikesController extends Controller
{
    

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        return auth()->user()->meGusta()->toggle($receta);

    }

    
}
