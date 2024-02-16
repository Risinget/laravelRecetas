<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManager;
use App\Models\CategoriaReceta;
use Illuminate\Queue\Jobs\RedisJob;
use PhpParser\Node\Stmt\Return_;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show', 'show']);
    }


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $usuario = auth()->user();
        $recetas = Receta::where('user_id', $usuario->id)->paginate(4);
        // $usuario = auth()->user();
  

        // return view('recetas.index')->with('recetas',$recetas)->with('usuario',$usuario);
         return view('recetas.index')->with('recetas',$recetas)
                                     ->with('usuario',$usuario);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Sin Model
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id', 'created_at');
        
        // Con model
        $categorias = CategoriaReceta::all(['id','nombre']);


        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                
        $data = request()->validate([
            'titulo'=> 'required|min:6|unique:recetas,titulo',
            'preparacion'=>'required',
            'ingredientes'=>'required',
            'imagen'=>'required|image|max:1000000',
            'categoria' => 'required',

        ]);


        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');


        // // create new image instance
        // $image = ImageManager::gd()->read(public_path("storage/{$ruta_imagen}"));

        // // resize to 300 x 200 pixel
        // $image->resize(300, 200);

        // // resize only image height to 200 pixel
        // $image->resize(height: 200);
        // $image->save();


        // DB::table('recetas')->insert([
        
        //     'titulo' => $data['titulo'],
        //     'ingredientes'=>$data['ingredientes'], 
        //     'preparacion'=>$data['preparacion'],
        //     'imagen'=> $ruta_imagen,
        //     'user_id'=>Auth::id(),
        //     'categoria_id'=>$data['categoria'],

        // ]);

        //Almacenar en la base de datos con Modelo
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes'=>$data['ingredientes'], 
            'preparacion'=>$data['preparacion'],
            'imagen'=> $ruta_imagen,
            'categoria_id'=>$data['categoria'],
        ]);



        return redirect()->action([RecetaController::class, 'index']);
    
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Receta $receta)
    {
        $like = ( auth()->user()) ? auth()->user()->meGusta->contains($receta->id) : false;
        $likes = $receta->likes->count();
        return view('recetas.show', compact('like', 'likes'))->with('receta',$receta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        $this->authorize('view', $receta);

        $categorias = CategoriaReceta::all('id','nombre');

        return view('recetas.edit',compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {   

        $this->authorize('update', $receta);

        $data = request()->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',

        ]);

        $receta->titulo = $data['titulo'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->categoria_id = $data['categoria'];

        if (request('imagen')) {
            $imagen = $request['imagen']->store('upload-recetas', 'public');
            $receta->imagen = $imagen;
        }
        
        $receta->save();

        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {

        $this->authorize('delete', $receta);

        $receta->delete();

        return redirect()->action([RecetaController::class, 'index']);
    }

    public function search(Request $request){

        $busqueda = $request['buscar'];
        $recetas = Receta::where('titulo', 'like', '%' . $busqueda . '%')->paginate(1);
        $recetas->appends(['buscar'=>$busqueda]);
        return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}
