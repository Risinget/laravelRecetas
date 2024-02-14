@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endsection

@section('botones')
    

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>

@endsection


@section('content')

    <h2 class="text-center mb-5">Editar Receta: {{ $receta->titulo }}</h2>

    <div class="row justify-content-center mt-5">

        <div class="col-md-8">
            
            <form method="POST" action="{{ route('recetas.update',['receta'=>$receta->id]) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Título Receta</label>

                    <input type="text" name="titulo" class="form-control  @error('titulo')
                        is-invalid
                    @enderror" id="titulo" placeholder="Título Receta" value="{{ $receta->titulo }}">
                
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>

                    <select name="categoria" class="form-control @error('categoria')
                        is-invalid
                    @enderror" id="categoria" >
                        <option value="">--Selecione--</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}> {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" id="preparacion" name="preparacion" value="{{ $receta->preparacion }}">
                    <trix-editor input='preparacion' class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" id="ingredientes" name="ingredientes" value="{{ $receta->ingredientes }}">
                    <trix-editor input='ingredientes' class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="imagen">Imagen</label>
                    <input type="file" id="imagen" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                
                    <div class="mt-4">

                        <p>Imagen Actual:</p>
                        <img src="/storage/{{ $receta->imagen }}" alt="" style="width: 300px">
                    </div>


                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3">Agregar Receta</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@show