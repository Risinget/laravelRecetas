@extends('layouts.app')


@section('botones')
    

    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>

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
                            @csrf


                    </eliminar-receta>

                    <a href="{{ route('recetas.edit',['receta' => $receta->id]) }}" class="btn btn-dark d-block mb-2"  target="_blank">Editar</a>
                    <a href="{{ route('recetas.show',['receta' => $receta->id]) }}" class="btn btn-success d-block mb-2"  target="_blank">Ver</a>
                </td>
            </tr>

             @endforeach
            
        </tbody>
    </table>
</div>



 
</div>

@endsection