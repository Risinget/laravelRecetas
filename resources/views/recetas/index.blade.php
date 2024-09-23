@extends('layouts.app')


@section('botones')

    @include('ui.navegacion')
    {{-- <a href="{{ route('perfiles.edit',['perfil'=>$usuario->id]) }}" class="btn btn-success mr-2 m-2 text-white">Editar perfil</a> --}}

@endsection


@section('content')
    

<h2 class="text-center mb-5">Administra tus Recetas</h2>


<div class="col-md-10 mx-auto bg-white p-3">

<div
    class="table-responsive"
>
    <table
        class="table"
    >
        <thead class="bg-primary text-light">
            <tr>
                <th scope="col" class="bg-red-app text-light">Titulo</th>
                <th scope="col" class="bg-red-app text-light">Categoria</th>
                <th scope="col" class="bg-red-app text-light">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recetas as $receta)

            <tr class="" id="{{ $receta->id.'-tr' }}">
                <td scope="row">{{ $receta->titulo }}</td>
                <td scope="row">{{ $receta->categoria->nombre }}</td>

                <td>

                    {{-- <form method="POST" action="{{ route('recetas.destroy', ['receta'=>$receta->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger d-block w-100 mb-2" value="">Eliminar &times;</button>
                    </form> --}}

                    <eliminar-receta receta-id={{ $receta->id }}>
                            {{-- @csrf --}}


                    </eliminar-receta>

                    <a href="{{ route('recetas.edit',['receta' => $receta->id]) }}" class="btn btn-dark d-block mb-2"  target="_blank">Editar</a>
                    <a href="{{ route('recetas.show',['receta' => $receta->id]) }}" class="btn btn-success d-block mb-2"  target="_blank">Ver</a>
                </td>
            </tr>

             @endforeach
            
        </tbody>

    </table>

    <div class="col-12 mt-4 justify-content d-flex">
        {{ $recetas->links() }}
    </div>
</div>

    <h2 class="text-center my-5">Recetas que te gustan</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        @if (count($usuario->meGusta) >0)
            <ul class="list-group">
            @foreach ($usuario->meGusta as $receta)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <p>{{ $receta->titulo }}</p>
                    <a class="btn btn-outline-success text-uppercase " href="{{ route('recetas.show',['receta'=>$receta->id]) }}">Ver</a>
                </li>
            @endforeach
            </ul>
        @else
            <p class="text-center">Aún no tienes recetas Guardadas <small>Dale me gusta a las recetas y aparecerán aquí</small></p>
        @endif
    </div>
</div>

@endsection