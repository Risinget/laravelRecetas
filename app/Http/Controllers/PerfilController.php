<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfil)
    {
        //Obtener recetas con paginacion
        
        // $usuario = auth()->user()->id;
        $usuario = $perfil->usuario->id;
        $recetas = Receta::where('user_id',$usuario)->paginate(6);
        return view('perfiles.show', compact('perfil', 'recetas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);

        return view('perfiles.edit',compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfil $perfil)
    {

        $this->authorize('update',$perfil);
        // Validar
        $data = request()->validate([
            'nombre'=>'required',
            'url'=>'required',
            'biografia'=>'required|string',

        ]);
        // Si el usuario sube una imagen
        if ( $request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');
            $array_imagen = ['imagen'=>$ruta_imagen];
        }
        

        //Asignar nombre y URL
        $user = Auth::user();
        $user->url = $data['url'];
        $user->name = $data['nombre'];
        $user->save();

        //Guardar informacion
        // Eliminar url y nombre de data
        unset($data['url']);
        unset($data['nombre']);
        //Asignar nombre y URL
        auth()->user()->perfil()->update(array_merge($data, $array_imagen ?? []));
        

        //Redireccionar
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
